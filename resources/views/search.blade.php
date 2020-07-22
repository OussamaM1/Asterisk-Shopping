@extends('layouts.master')
@section('content')
@if(!isset($message))
        <div>
          <p> Les résultats de la recherche de <b> {{ $query }} </b> sont :</p>
          <br>
        {{-- <form action="{{route('search',['articles'=>$articles->sort(function($a,$b){if($a['prix'] == $b['prix']) {return 0;} return ($a['prix'] < $b['prix']) ? -1 : 1;})])}}" method="POST"> --}}
        <form action="{{route('search')}}" method="POST">
            @csrf
            <label for="trie">Trier par : </label>
            <select name="trie" id="trie" onchange="this.form.submit()">
              <option selected="selected"></option>
              <option value="marque">Marque</option>
              <option value="prix">Prix</option>
            </select>
          </form>
        </div>
<div class="row mb-2">
  @foreach ($articles as $article)
  <div class="col-md-6">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <div class="mt-0 text-muted">{{$article->categorie}}</div>
        <strong class="d-inline-block mb-2 text-success">{{$article->titre}}</strong>
  
        <strong style="font-size: 20px" class="mb-2">{{ number_format($article->prix,2, ', ',' ') . " Dhs" }}</strong>
        
        <form action="{{route('lignes.store')}}" method="POST" class="form-inline">
          @csrf
          <label for="quantite" class="mb-3 mr-2 justify-content-center">Quantité :</label>
          <input type="number" id="quantite" name="quantite" value="1" class="form-control col-5 mb-3">
          @guest
          @else
          <input type="hidden" name="client" value="{{Illuminate\Support\Facades\Auth::user()->id}}">
          @endguest
          <input type="hidden" name="article" value="{{$article->id}}">
          <button type="submit" class="btn btn-success mr-1">Ajouter au panier</button>
          <a href="{{route('articles.show',$article)}}" class="btn btn-outline-primary">Voir l'article</a>
        </form>
      </div>
      <div class="col-auto d-none d-lg-block">
        <img src="{{$article->design}}" class="img-fluid rounded" width="200" alt="{{$article->id}}">
      </div>
    </div>
  </div>
  @endforeach
@else
<div class="container-fluid mt-100 py-1 mb-lg-4">
  <div class="row">
      <div class="col-md-12 px-6 py-4 mb-lg-4">
          <div class="card py-4 shadow">
              <div class="card-body cart">
                  <div class="col-sm-12 empty-cart-cls text-center">
                      <i class="fas fa-times"></i>
                      <strong>{{$message}} <b> {{$query}}.</strong><br>
                      <a href="{{route('articles.index')}}" class="btn btn-primary cart-btn-transform m-3">
                        Continuer vos achats
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<div>
  <p> </b></p>
  <br>
</div>
@endif
@endsection
</div>