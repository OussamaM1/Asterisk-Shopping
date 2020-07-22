@extends('layouts.master')
@php
@endphp
@section('content')
<form action="{{route('search')}}" method="POST" class="form-inline d-flex justify-content-center col-lg-12 mb-2">
    @csrf
    <div class="form-group mb-2 mr-1 col-lg-8">
      <input type="text" class="form-control col-lg-12 px-3 py-2" placeholder="Chercher un produit" name="q">
    </div>
    <button type="submit" class="btn btn-outline-primary px-3 py-2 mb-2">Rechercher <i class="fas fa-search"></i></button>
</form>


<div class="row mb-2">
<div class="jumbotron p-4 p-md-5 text-white rounded shadow"  style="background-image:  url({{ asset('images/img.jpg') }}); background-size: 1100px;">
  <div class="col-md-12 px-0">
  <h1 class="display-4 font-italic">Les services de la nouvelle génération : Asterisk</h1>
  <p class="lead my-3">Asterisk est une entreprise marocaine basée sur Agadir pour délivrer des solution informatique aux clients de la région.</p>
  <p class="lead mb-0"><a href="{{route('articles.index')}}" class="btn btn-outline-light col-lg-12">Nos articles</a></p>
  </div>
</div>
  @foreach ($articles as $article)
<div class="col-md-6">
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
      <div class="mb-2 text-muted">{{$article->categorie}}</div>
      <strong class="d-inline-block mb-2 text-success">{{$article->titre}} </strong>
      <div class="mb-auto text-dark">{{$article->created_at->format('d/m/y')}}</div>
      <strong class="mb-auto " style="font-size: 30px">{{ number_format($article->prix,2, ', ',' ') . " Dhs" }}</strong>
      <a href="{{route('articles.show',$article)}}" class="btn btn-outline-primary">Voir l'article</a>
    </div>
    <div class="col-auto d-none d-lg-block">
      <img src="{{$article->design}}" class="img-fluid rounded" width="200" alt="{{$article->id}}">
    </div>
  </div>
</div>
@endforeach
<div class="col-lg-12 d-flex justify-content-center">
    <form action="{{route('articles.index')}}">
      <button type="submit" class="btn btn-light px-5">Plus d'articles</button>
    </form>
</div>
</div>
@endsection
