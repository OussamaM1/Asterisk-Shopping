@extends('layouts.master')
@section('content')
<form action="{{route('search')}}" method="POST" class="form-inline d-flex justify-content-center col-lg-12 mb-2">
  @csrf
  <div class="form-group mb-2 mr-1 col-lg-8">
    <input type="text" class="form-control col-lg-12" placeholder="Chercher un produit" name="q">
  </div>
  <button type="submit" class="btn btn-outline-primary px-3 py-2 mb-2">Rechercher <i class="fas fa-search"></i></button>
</form>
<div>
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-300 position-relative">
      <div class="col p-5 d-flex flex-column position-static">
        <div class="mt-0 text-muted">{{$article->categorie}}</div>
        <strong class="d-inline-block mb-2 text-success">{{$article->titre}}</strong>
        <div class="mb-auto text-dark">{{$article->created_at->format('d/m/y')}}</div>
        <strong style="font-size: 40px" class="mb-4">{{ number_format($article->prix,2, ', ',' ') . " Dhs" }}</strong>
        
        <form action="{{route('lignes.store')}}" method="POST" class="form">
          @csrf
          <label for="quantite" class="mb-2 justify-content-center">Quantité :</label>
          <input type="number" id="quantite" name="quantite" value="1" class="form-control col-5 mb-3">
          @guest
          @else
          <input type="hidden" name="client" value="{{Illuminate\Support\Facades\Auth::user()->id}}">
          @endguest
          <input type="hidden" name="article" value="{{$article->id}}">
          <button type="submit" class="btn btn-outline-success mr-1 col-lg-5"><i class="fas fa-shopping-basket"></i> Ajouter au panier</button>
        </form>
      </div>
      <div class="col-auto d-none d-lg-block">
        <img src="{{$article->design}}" class="img-fluid rounded" width="350" alt="{{$article->id}}">
      </div>
    </div>
  </div>
@endsection