<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class EventUser extends Model
{
    //use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $table = "event_user_details";
    protected $guarded = [];
    public $timestamps = false;
}
