@extends('layouts.master')
@php
@endphp
@section('content')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Les services de la nouvelle génération : Asterisk</h1>
      <p class="lead my-3">Asterisk est une entreprise marocaine basée sur Agadir pour délivrer des solution informatique aux clients de la région</p>
      <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
  </div>
  @foreach ($articles as $article)
<div class="col-md-6">
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
      <strong class="d-inline-block mb-2 text-success">Article {{$article->id}} </strong>
      <div class="mb-1 text-muted">{{$article->created_at->format('d/m/y')}}</div>
      <strong>{{ number_format($article->prix,2, ', ',' ') . " £" }}</strong>
      <a href="{{route('articles.show',$article)}}" class="stretched-link">Voir l'article</a>
    </div>
    <div class="col-auto d-none d-lg-block">
      <img src="{{$article->design}}" alt="{{$article->id}}">
    </div>
  </div>
</div>
@endforeach
<div>
    <form action="{{route('articles.index')}}">
      <button type="submit" class="btn btn-dark">Voir tous</button>
    </form>
</div>
@endsection