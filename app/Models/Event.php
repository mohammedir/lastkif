<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    /*{{--//TODO:: *MOOM*EN S*. ALDAH*DOUH 12/15/2021--}}*/
    //use HasFactory;
    // use HasTranslations;

    //public $translatable = ['title', 'description'];
    protected $table = "events";
    protected $guarded = [];
    public $timestamps = false;

    public function event_user()
    {
        return $this->hasMany(EventUser::class, 'event_fk_id', 'id');
    }
}
