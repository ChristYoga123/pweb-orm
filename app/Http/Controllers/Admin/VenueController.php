<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Models\VenueGallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.admin.venue.index")->with([
            "venues" => Venue::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.venue.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:venues,name",
            "category" => "required|in:House,Hotel,Apartment",
            "price_per_night" => "required|integer|min:0",
            "location" => "required",
            "description" => "required",
            "hero_image" => "required|image|mimes:png,jpg,jpeg",
            "gallery_venue" => "required|array",
            "gallery_venue.*" => "image|mimes:png",
        ]);

        DB::beginTransaction();
        try {
            $hero_image = $request->file("hero_image")->store("venue-hero-image", "public");
            // insert venue data
            $venue = Venue::create([
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "category" => $request->category,
                "location" => $request->location,
                "price_per_night" => $request->price_per_night,
                "hero_image" => $hero_image,
                "description" => $request->description
            ]);

            // insert venue gallery
            foreach ($request->gallery_venue as $item) {
                $gallery = $item->store("venue-gallery", "public");
                VenueGallery::create([
                    "venue_id" => $venue->id,
                    "venue_gallery" => $gallery
                ]);
            }
            DB::commit();
            return redirect()->route("admin.venue.index")->with("success", "Data berhasil ditambah");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        return view("pages.admin.venue.edit")->with([
            "venue" => $venue
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {
        $request->validate([
            "name" => "required|unique:venues,name," . $venue->id,
            "category" => "required|in:House,Hotel,Apartment",
            "price_per_night" => "required|integer|min:0",
            "location" => "required",
            "description" => "required",
            "hero_image" => "image|mimes:png,jpg,jpeg",
            "gallery_venue" => "array",
            "gallery_venue.*" => "image|mimes:png",
        ]);

        DB::beginTransaction();
        try {
            // delete hero image
            if ($request->hasFile("hero_image")) {
                Storage::delete("public/" . $request->old_image);
                $new_hero_image = $request->file("hero_image")->store("venue-hero-image", "public");
            } else {
                $new_hero_image = $request->old_image;
            }

            $venue->update([
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "category" => $request->category,
                "location" => $request->location,
                "price_per_night" => $request->price_per_night,
                "hero_image" => $new_hero_image,
                "description" => $request->description
            ]);

            if ($request->gallery_venue) {
                // select all gallery file and delete the real file
                $venue_galleries = VenueGallery::whereVenueId($venue->id)->get();
                foreach ($venue_galleries as $gallery) {
                    Storage::delete("public/" . $gallery->venue_gallery);
                }
                // delete venue gallery from db
                VenueGallery::whereVenueId($venue->id)->delete();
                // insert venue gallery
                foreach ($request->gallery_venue as $item) {
                    $gallery = $item->store("venue-gallery", "public");
                    VenueGallery::create([
                        "venue_id" => $venue->id,
                        "venue_gallery" => $gallery
                    ]);
                }
            }
            DB::commit();
            return redirect()->route("admin.venue.index")->with("success", "Data berhasil diubah");
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        // select all gallery file and delete the real file
        $venue_galleries = VenueGallery::whereVenueId($venue->id)->get();
        foreach ($venue_galleries as $gallery) {
            Storage::delete("public/" . $gallery->venue_gallery);
        }
        // select hero image and delete the real file
        Storage::delete("public/" . $venue->hero_image);
        // delete row in db
        VenueGallery::whereVenueId($venue->id)->delete();
        $venue->delete();
        return redirect()->route("admin.venue.index")->with("success", "Data berhasil dihapus");
    }
}
