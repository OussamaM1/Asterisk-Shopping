@extends('layouts.master')
@section('content')
@if(!isset($message))
        <div>
          <p> Les resultats de la recherche de <b> {{ $query }} </b> sont :</p>
          <br>
        <form action="{{route('search',['articles'=>$articles->sort(function($a,$b){if($a['prix'] == $b['prix']) {return 0;} return ($a['prix'] < $b['prix']) ? -1 : 1;})])}}" method="POST" onchange="this.form.submit()">
            <label for="trie">Trier par : </label>
            <select name="trie" id="trie">
              <option value="Marque">Marque</option>
              <option value="Prix">Prix</option>
            </select>
          </form>
        </div>
@foreach ($articles as $article)
<div class="col-md-6">
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-success">{{$article->titre}}</strong>
      <div class="mb-1 text-muted">{{$article->created_at->format('d/m/y')}}</div>
      <strong>{{ number_format($article->prix,2, ', ',' ') . " Dhs" }}</strong>
      <a href="{{route('articles.show',$article)}}">Voir l'article</a>
      <form action="{{route('lignes.store')}}" method="POST">
        @csrf
        <label for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" value="1">
        @guest
        @else
        <input type="hidden" name="client" value="{{Illuminate\Support\Facades\Auth::user()->id}}">
        @endguest
        <input type="hidden" name="article" value="{{$article->id}}">
        <button type="submit" class="btn btn-dark">Ajouter au panier</button>
      </form>
    </div>
    <div class="col-auto d-none d-lg-block">
      <img src="{{$article->design}}" alt="{{$article->id}}">
    </div>
  </div>
</div>
@endforeach
@else
<div>
  <p> {{$message}} <b> {{$query}} </b></p>
  <br>
</div>
@endif
@endsection