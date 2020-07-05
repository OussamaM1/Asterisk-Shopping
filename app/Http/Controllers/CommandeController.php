<?php

namespace App\Http\Controllers;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Commande;
use App\Client;
use App\Ligne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('commandes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('commandes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }
    public static function getLastCommande()
    {
        $client = Auth::user();
        // $commande = Commande::where('client_id',$client->id)->where('date','==','1970-01-01')->orderBy('date', 'desc')->first();
        $commandesArray = Commande::get()->where('client_id',21)->where('date','==','1970-01-01')->toArray();
        $commande = end($commandesArray);
        return $commande;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        $commande->date = date("Y-m-d");
        $commande->save();
        $client = Client::find($commande->client_id);
        $client->nom = $_GET['nom'];
        $client->prenom = $_GET['prenom'];
        $client->adresse = $_GET['adresse'];
        $client->ville = $_GET['ville'];
        $client->save();
        Mail::to($client->email)->send(new OrderShipped());
        Ligne::truncate();
        return Redirect::route('commandes.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {

        return view('commandes.update');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
