<?php

namespace App\Listeners;

use App\Events\ClientAuthenticated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use App\Ligne;
use App\Article;
use App\Commande;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\json_decode;

class UpdateCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {

        $client = Auth::user();
        if ($client) {
            $commande = new Commande();
            $commande->client_id = $client->id;
            $commande->date = date("Y-m-d");
            $commande->save();
            $cookie = $_COOKIE['commande'];
            $array = json_decode($cookie, true);
            foreach ($array as $key => $element) {
                $ligne = new Ligne();
                $ligne->quantite = $element['quantity'];
                $article = Article::find($element['article_id']);
                $ligne->prix_unit = $article->prix;
                $ligne->commande_id = $commande->id;
                $ligne->article_id = $article->id;
                $ligne->save();
            }
        }
    }
}
