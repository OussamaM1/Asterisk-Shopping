<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    public static function createCommande()
    {
        $commande = new Commande();
        $commande->client_id = Auth::user()->id;
        $commande->date = '1970-01-01';
        $commande->save();
        return $commande->id;
    }
}
