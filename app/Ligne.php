<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligne extends Model
{
    protected $fillable = ['commande_id','article_id','quantite','prix_unit'];
    public function commandes()
    {
        return $this->belongsTo('App\Commande','commande_id');
    }
    public function article()
    {
        return $this->belongsTo('App\Article','article_id');
    }
}
