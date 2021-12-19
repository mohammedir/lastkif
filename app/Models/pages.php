<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;


class pages extends Model
{

    use HasTranslations;
    public $translatable = ['Pagetitle','Metatitle','Metadescription'];
    use HasFactory;
    protected $fillable = [
        'Pagetitle'
    ];
}
