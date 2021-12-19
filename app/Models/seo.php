<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class seo extends Model
{
    use HasTranslations;
    public $translatable = ['namePage'];
    protected $fillable = [
        'namePage'
    ];
    use HasFactory;
}
