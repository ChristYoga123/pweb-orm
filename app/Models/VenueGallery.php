<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueGallery extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function Venue()
    {
        return $this->belongsTo(Venue::class);
    }
}
