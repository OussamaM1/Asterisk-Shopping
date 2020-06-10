<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['date'];
    public function client()
    {
        return $this->belongsTo('App\Client','client_id');
    }
    public function lignes()
    {
        return $this->hasMany('App\Ligne','commande_id','ligne_id');
    }
}
