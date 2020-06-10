<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['design','prix','categorie'];
    public function lignes()
    {
        return $this->hasMany('App\Ligne','article_id','ligne_id');
    }
}
