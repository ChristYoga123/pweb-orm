<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.user.home.index")->with([
            "houses" => DB::table("venues")->where("category", "House")->get(),
            "hotels" => DB::table("venues")->where("category", "Hotel")->get(),
            "apartments" => DB::table("venues")->where("category", "Apartment")->get(),
        ]);
    }

    public function show(Venue $venue)
    {
        return view("pages.user.home.show")->with([
            "venue" => $venue
        ]);
    }

    public function success()
    {
        return view("pages.user.home.success");
    }

    public function show_api($id)
    {
        $venue = DB::table("venues")->where("id", $id)->first();
        return response()->json($venue);
    }
}
