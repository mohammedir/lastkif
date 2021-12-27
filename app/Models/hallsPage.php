<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class hallsPage extends Model
{

    protected $table = "admin_menu_items";
    protected $guarded = [];
    public $timestamps = false;
}
