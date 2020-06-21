<?php

namespace App\Http\Controllers;

use App\Ligne;
use Illuminate\Http\Request;
use App\Article;
use App\Client;

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
        return view('lignes.index')->with('lignes',$lignes);
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
        foreach($lignes as $ligne)
        {
            $totalTTC = $totalTTC + $ligne->quantite*$ligne->prix_unit;
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
        if(!isset($request->client))
        {
            if(isset($_COOKIE['commande']))
            {
                $cookie_data = stripslashes($_COOKIE['commande']);
                $cart_data = json_decode($cookie_data, true);
            }
            else
            {
                $cart_data = array();
            }
            $cookie = $_COOKIE['commande'];
            $array = json_decode($cookie,true);
            $var = false ;
            $oldQuantity = 0 ;
            foreach($array as $key => $element)
            {
                if($element['article_id'] == $request->article)
                {
                    $var = true;
                    $oldQuantity = $element['quantity'];
                }
            }
            if($var)
            {
                $this->updateCookieElement($request->article,$oldQuantity+$request->quantite);
            }
            else
            {
            $cart_items = array(
                'article_id' => $request->article,
                'quantity' => $request->quantite
            );
            $cart_data[] = $cart_items;
            $json = json_encode($cart_data,true);
            setcookie("commande", $json,time() + (86400 * 30),'/');
            }
        }
        else
        {
            $client = Client::find($request->client->id);
            $commande_id = $client->commande()->id;
            $data=[
                'commande_id' =>$commande_id,
                'article_id' =>$article->id,
                'quantite' =>$request->quantite,
                'prix_unit' =>$request->prix,
            ];
            Ligne::create($data);
        }
        $request->session()->flash('added','Article was added to cart');
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
        $array = json_decode($cookie,true);
        $var = null ;
        foreach($array as $key => $element)
        {
            if($element['article_id'] == $id)
            {
                $var = $key;
                break;
            }
        }
        unset($array[$var]);
        $json = json_encode($array,true);
        setcookie("commande", $json, time() + (86400 * 30),'/');
        session()->flash('deleted','Article was deleted from cart');
        return redirect('/lignes');
    }
    public function updateCookieElement($id,$newQuantity)
    {
        if($newQuantity>10) $newQuantity =10;
        if($newQuantity<=0) $newQuantity =1;
        $cookie = $_COOKIE['commande'];
        $array = json_decode($cookie,true);
        $var = null ;
        foreach($array as $key => $element)
        {
            if($element['article_id'] == $id)
            {
                $var = $key;
                break;
            }
        }
        $cart_item = array(
            'article_id' => $array[$var]['article_id'],
            'quantity' => $newQuantity
        );
        $array[$var]=$cart_item;
        $json = json_encode($array,true);
        setcookie("commande", $json, time() + (86400 * 30),'/');
        session()->flash('updated','Line was updated');
        return redirect('/lignes');
    }
    public function countCartWithCookies()
    {
        $cookie = $_COOKIE['commande'];
        $array = json_decode($cookie,true);
        $number = 0;
        foreach($array as $key => $element)
        {
            $number += $element['quantity'];
        }
        return $number;
    }
    public function countCart()
    {

    }
    public function getTotalTTCWithCookies()
    {
        $cookie = $_COOKIE['commande'];
        $array = json_decode($cookie,true);
        $total = 0;
        foreach($array as $key => $element)
        {
            $article = Article::find($element['article_id']);
            $total += $article->prix*$element['quantity'];
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
    public function edit(Ligne $ligne)
    {
        //
    }

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
        session()->flash('deleted','Post was deleted');
        return redirect('/lignes');
    }
}
