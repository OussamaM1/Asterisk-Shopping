@extends('layouts.master')
@section('content')
<div>
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-success">{{$article->titre}}</strong>
        <div class="mb-1 text-muted">{{$article->created_at->format('d/m/y')}}</div>
        <strong>{{ number_format($article->prix,2, ', ',' ') . " £" }}</strong>
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
        <img src="{{$article->design}}" class="img-fluid rounded" width="200" alt="{{$article->id}}">
      </div>
    </div>
  </div>
@endsection