<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SpecialEvents extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $table = "special_events";
    protected $guarded = [];
    public $timestamps = false;
}
