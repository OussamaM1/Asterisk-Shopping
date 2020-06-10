@extends('layouts.master')
@section('content')
@foreach ($articles as $article)
<div class="col-md-6">
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-success">Article {{$article->id}} </strong>
      <div class="mb-1 text-muted">{{$article->created_at->format('d/m/y')}}</div>
      <strong>{{ number_format($article->prix,2, ', ',' ') . " £" }}</strong>
      <a href="{{route('articles.show',$article)}}" class="stretched-link">Voir l'article</a>
      <form action="#" method="POST">
        <button type="submit" class="btn btn-dark">Ajouter au panier</button>
      </form>
    </div>
    <div class="col-auto d-none d-lg-block">
      <img src="{{$article->design}}" alt="{{$article->id}}">
    </div>
  </div>
</div>
@endforeach
@endsection