<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articlegroup extends Model
{
    protected $table='articlegroup';
    protected $primaryKey='id';
    function toArticle(){
        return $this->belongsToMany('App\articles','attr_article_group','group','article')->orderBy('ordered', 'desc');
    }
    function toLang(){
        return $this->hasOne('App\languagelist','id','lang');
    }
}
