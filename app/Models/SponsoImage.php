<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsoImage extends Model
{
    //use HasFactory;
    protected $table = "sponsor_images";
    protected $guarded = [];
    public $timestamps = false;
}
