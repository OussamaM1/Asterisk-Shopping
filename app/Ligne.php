<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    protected $fillable = ['quantite','prix_unit'];
    public function commande()
    {
        return $this->belongsTo('App\Commande','commande_id');
    }
    public function article()
    {
        return $this->belongsTo('App\Article','article_id');
    }
}
