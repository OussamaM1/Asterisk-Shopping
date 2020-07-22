<?php

namespace App\Http\Controllers;

use App\Ligne;
use Illuminate\Http\Request;
use App\Article;
use App\Client;
use App\Commande;
use Illuminate\Support\Facades\Auth;

class LigneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lignes = Ligne::all();
        return view('lignes.index')->with('lignes', $lignes);
    }
    public function getLigneWithArticle($ligneId)
    {
        $ligneWithArticle = Ligne::with('article')->find($ligneId);
        return $ligneWithArticle;
    }
    public function getTotalTTC()
    {
        $lignes = Ligne::all();
        $totalTTC = 0;
        foreach ($lignes as $ligne) {
            $totalTTC += $ligne->quantite * $ligne->prix_unit;
        }
        return $totalTTC;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::find($request->article);
        if (!isset($request->client)) {
            if (isset($_COOKIE['commande'])) {
                $cookie_data = stripslashes($_COOKIE['commande']);
                $cart_data = json_decode($cookie_data, true);
            } else {
                $cart_data = array();
            }
            $cookie = $_COOKIE['commande'];
            $array = json_decode($cookie, true);
            $var = false;
            $oldQuantity = 0;
            foreach ($array as $key => $element) {
                if ($element['article_id'] == $request->article) {
                    $var = true;
                    $oldQuantity = $element['quantity'];
                }
            }
            if ($var) {
                $this->updateCookieElement($request->article, $oldQuantity + $request->quantite);
            } else {
                $cart_items = array(
                    'article_id' => $request->article,
                    'quantity' => $request->quantite
                );
                $cart_data[] = $cart_items;
                $json = json_encode($cart_data, true);
                setcookie("commande", $json, time() + (86400 * 30), '/');
            }
        } else {
            // $client = Client::find($request->client);
            // $commande_id = Commande::with('client')->get()->last()->id;
            if ($this->countCart() <= 0) {
                $commande_id = Commande::createCommande();
            } else {
                $commande_id = $this->getLastCommande()['id'];
            }
            $data = [
                'commande_id' => $commande_id,
                'article_id' => $article->id,
                'quantite' => intval($request->quantite),
                'prix_unit' => intval($article->prix),
            ];
            $lignes = Ligne::all();
            $exists = false;
            $ligne = null;
            foreach ($lignes as $_ligne) {
                if ($_ligne->article_id == $article->id) {
                    $exists = true;
                    $ligne = Ligne::find($_ligne->id);
                }
            }
            if ($exists) {
                // $this->edit($ligne->id);
                // dd($ligne->quantite);
                $oldQ = intval($_POST['quantite']);
                return redirect()->action('LigneController@edit', ['ligne' => $ligne, 'articleQuantity' => $ligne->quantite + $oldQ]);
            } else {
                Ligne::create($data);
            }
        }
        $request->session()->flash('added', 'L\'article a bien été ajouté.');
        return redirect('/lignes');
    }
    public function getIdCommandeFromLigne($lignes)
    {
        return $lignes[0]->commande_id;
    }
    public function getLastCommande()
    {
        if (!($commandesArray = Commande::get()->where('client_id', Auth::user()->id)->where('date', '==', '1970-01-01')->toArray())) {
            $commande = Commande::createCommande();
        } else {
            $commande = end($commandesArray);
        }
        return $commande;
    }
    public function edit(Ligne $ligne)
    {
        $newQ = $_GET['articleQuantity'];
        if ($_GET['articleQuantity'] > 10) $newQ = 10;
        if ($_GET['articleQuantity'] <= 0) $newQ = 1;
        $ligne = Ligne::find($ligne->id);
        $ligne->quantite = $newQ;
        $ligne->save();
        session()->flash('updated', 'La ligne a été modifiée dans le panier.');
        return redirect('/lignes');
    }
    public function cookieToArray()
    {
        $cookie = $_COOKIE['commande'];
        $json = json_decode($cookie);
        return $json;
    }
    public function deleteCookieElement($id)
    {
        $cookie = $_COOKIE['commande'];
        $array = json_decode($cookie, true);
        $var = null;
        foreach ($array as $key => $element) {
            if ($element['article_id'] == $id) {
                $var = $key;
                break;
            }
        }
        unset($array[$var]);
        $json = json_encode($array, true);
        setcookie("commande", $json, time() + (86400 * 30), '/');
        session()->flash('deleted', 'L\'article a été supprimé.');
        return redirect('/lignes');
    }
    public function updateCookieElement($id, $newQuantity)
    {
        if ($newQuantity > 10) $newQuantity = 10;
        if ($newQuantity <= 0) $newQuantity = 1;
        $cookie = $_COOKIE['commande'];
        $array = json_decode($cookie, true);
        $var = null;
        foreach ($array as $key => $element) {
            if ($element['article_id'] == $id) {
                $var = $key;
                break;
            }
        }
        $cart_item = array(
            'article_id' => $array[$var]['article_id'],
            'quantity' => $newQuantity
        );
        $array[$var] = $cart_item;
        $json = json_encode($array, true);
        setcookie("commande", $json, time() + (86400 * 30), '/');
        session()->flash('updated', 'La ligne a été modifiée.');
        return redirect('/lignes');
    }
    public function countCartWithCookies()
    {
        $cookie = "[]";
        if (isset($_COOKIE['commande'])) {
            // setcookie('commande', '[]', time() + (86400 * 30),'/'); // 86400 = 1 day
            $cookie = $_COOKIE['commande'];
        }
        $array = json_decode($cookie, true);
        $number = 0;
        foreach ($array as $key => $element) {
            $number += $element['quantity'];
        }
        return $number;
    }
    public function countCart()
    {
        $lignes = Ligne::all();
        $number = 0;
        foreach ($lignes as $ligne) {
            $number += $ligne->quantite;
        }
        return $number;
    }
    public function getTotalTTCWithCookies()
    {
        $cookie = $_COOKIE['commande'];
        $array = json_decode($cookie, true);
        $total = 0;
        foreach ($array as $key => $element) {
            $article = Article::find($element['article_id']);
            $total += $article->prix * $element['quantity'];
        }
        return $total;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function show(Ligne $ligne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ligne $ligne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ligne  $ligne
     * @return \Illuminate\Http\Response
     */
    public function destroy($ligne)
    {
        Ligne::destroy($ligne);
        session()->flash('deleted', 'L\'article a été supprimé.');
        return redirect('/lignes');
    }
}
