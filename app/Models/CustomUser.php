<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
/*{{--//TODO:: MOO*MEN S. ALDA*HDOUH 12/15/2021--}}*/
class CustomUser extends Model
{
    //use HasFactory;
    use HasTranslations;

    public $translatable = ['name', 'country'];
    protected $table = "custom_users";
    protected $guarded = [];
    public $timestamps = false;
}
