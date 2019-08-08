<?php


namespace App\Http\Controllers\Website;


use App\languagelist;
use App\setting;

trait general
{
    function  getsetting(){
        return setting::where('lang',1)->first();
    }
    public function getlang(){
        return languagelist::get();
    }
}
