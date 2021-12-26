<?php

namespace App\Http\Controllers;

class LanguageSit
{
    private $lang;

    public function __construct()
    {
        $this->lang = config('app.locale');
    }

    public function getLang()
    {
        return $this->lang;
    }
}
