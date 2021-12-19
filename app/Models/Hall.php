<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Hall extends Model
{
    //use HasFactory;
    use HasTranslations;

    public $translatable = ['title','name', 'description'];
    protected $table = "halls";
    protected $guarded = [];
    public $timestamps = false;

    public function widget()
    {
        return $this->hasOne(widgetsTable::class, 'id', 'widget_fk_id');
    }
}
