@inject('ligneController', 'App\Http\Controllers\LigneController')
@extends('layouts.master')
@section('content')
@if (session()->has('deleted'))
    <div class="alert alert-danger" role="alert">
        {{session()->get('deleted')}}
    </div>
@elseif (session()->has('updated'))
    <div class="alert alert-primary" role="alert">
    {{session()->get('updated')}}
    </div>
@elseif (session()->has('added'))
    <div class="alert alert-success" role="alert">  
    {{session()->get('added')}}
    </div>
@endif


<div class="px-4 px-lg-0">
  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow p-3 mb-5">
{{-- {{dd($_COOKIE['commande'])}} --}}
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="border-0 bg-light">
        <div class="p-2 px-3 text-uppercase">Article</div>
      </th>
      <th scope="col" class="border-0 bg-light">
        <div class="py-2 text-uppercase">Quantité</div>
      </th>
      <th scope="col" class="border-0 bg-light">
        <div class="py-2 text-uppercase">Prix Unitaire</div>
      </th>
      <th scope="col" class="border-0 bg-light">
        <div class="py-2 text-uppercase">Sous-Total</div>
      </th>
      <th scope="col" class="border-0 bg-light">
        <div class="py-2 text-uppercase">Supprimer</div>
      </th>
    </tr>
  </thead>
    <tbody>
        @guest
        @foreach ($ligneController->cookieToArray() as $ligne)
        <?php $article = App\Article::find($ligne->article_id) ?>
        <tr>
          <th scope="row" class="border-0">
          <div class="p-2">
            <img src="{{$article->design}}" alt="{{$article->id}}" width="70" class="img-fluid rounded shadow-sm">
            <div class="ml-3 d-inline-block align-middle">
              <h5 class="mb-0"> <a href="{{route('articles.show',$article)}}" class="text-dark d-inline-block align-middle">{{$article->titre}}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Categorie: {{$article->categorie}}</span>
            </div>
          </div>
          </th>
        <td class="border-0 align-middle">
          <form action="{{route('updateElement')}}" method="POST">
            @csrf
            <input type="hidden" name="articleId" value="{{$ligne->article_id}}">
            <select class="custom-select" name="articleQuantity" required="required" onchange="this.form.submit()">
            @for ($i = 1; $i <= 10; $i++)
            @if ($i == $ligne->quantity)
              <option value="{{$i}}" selected="selected">{{$i}}</option>
            @else
              <option value="{{$i}}">{{$i}}</option>
            @endif
            @endfor
          </select>
          </form>
        </td>
        @if(gettype($article) == "object")
        <td class="border-0 align-middle"><strong>{{$article->prix}} Dhs</strong></td>
        <td class="border-0 align-middle"><strong>{{$ligne->quantity*$article->prix}} Dhs</strong></td>
        @endif
        <td class="border-0 align-middle">
        <form method="GET" action="{{route('deleteElement')}}">
                @csrf
                <input type="hidden" name="articleId" value="{{$ligne->article_id}}">
                <button type="submit" class="btn btn-block btn-sm btn-outline-light"><i class="fas fa-trash" style="color:rgb(238, 54, 54)"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
        
        @else

        @foreach ($lignes as $ligne)
        <tr>
        {{-- <th scope="row">Article {{$ligneController->getLigneWithArticle($ligne->id)->id}}</th> --}}
        <?php $article = App\Article::find($ligne->article_id) ?>
        <th scope="row" class="border-0">
          <div class="p-2">
            <img src="{{$article->design}}" alt="{{$article->id}}" width="70" class="img-fluid rounded shadow-sm">
            <div class="ml-3 d-inline-block align-middle">
              <h5 class="mb-0"> <a href="{{route('articles.show',$article)}}" class="text-dark d-inline-block align-middle">{{$article->titre}}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Categorie: {{$article->categorie}}</span>
            </div>
          </div>
          </th>
        <td class="border-0 align-middle">
          <form action="{{route('lignes.edit',['ligne'=>$ligne])}}" method="GET">
            @csrf
            <input type="hidden" name="articleId" value="{{$ligne->article_id}}">
            <select class="custom-select" name="articleQuantity" required="required" onchange="this.form.submit()">
            @for ($i = 1; $i <= 10; $i++)
            @if ($i == $ligne->quantite)
              <option value="{{$i}}" selected="selected">{{$i}}</option>
            @else
              <option value="{{$i}}">{{$i}}</option>
            @endif
            @endfor
          </select>
          </form>
        </td>
        <td class="border-0 align-middle"><strong>{{$ligne->prix_unit}}</strong></td>
        <td class="border-0 align-middle"><strong>{{$ligne->quantite*$ligne->prix_unit}}</strong></td>
        <td class="border-0 align-middle">
            <form method="POST" action="{{route('lignes.destroy',['ligne'=>$ligne->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-block btn-sm btn-outline-light"><i class="fas fa-trash" style="color:rgb(238, 54, 54)"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
        @endguest
    </tbody>
  </table>
</div>
        </div>
      </div>

<div class="row py-5 p-4 bg-white rounded shadow p-3">
  <div class="col-lg-12">
    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Récapitulatif de la commande</div>
  </div>
  <div class="col-lg-12">
    <div class="p-4">
      <p class="font-italic mb-3">
        Les frais d'expédition et supplémentaires sont calculés en fonction des articles commandés.  
      </p>
      @guest
      <ul class="list-unstyled mb-4">
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Nombre des articles de la commande</strong><strong> {{$ligneController->countCartWithCookies()}}</strong></li>
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total TTC</strong><strong>{{$ligneController->getTotalTTCWithCookies()}} Dhs</strong></li>
      </ul>
      <div class="alert alert-warning" role="alert">
        Pour finaliser la commande, il faut <a href="{{route('login')}}" class="text-info"> s'authentifier</a>
      </div>
      <a href="{{route('articles.index')}}" class="btn btn-outline-danger float-right py-2 px-2  col-lg-6">Poursuivre vos achats <i class="fas fa-arrow-circle-right"></i></a>
      @else
      <ul class="list-unstyled mb-4">
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Nombre des articles de la commande</strong><strong> {{$ligneController->countCart()}}</strong></li>
        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total TTC</strong><strong>{{$ligneController->getTotalTTC()}} Dhs</strong></li>
      </ul>
      @if($ligneController->countCart() != 0)
      <form action="{{route('commandes.update',['commande'=>$ligneController->getIdCommandeFromLigne($lignes)])}}" method="POST">
        @csrf
        @method('PUT')
        {{-- <input type="hidden" name="commandeId" value="{{$ligneController->getIdCommandeFromLigne($lignes)}}"> --}}
          <button type="submit" class="btn btn-outline-success py-2 px-2 float-right col-lg-6">Finaliser votre commande <i class="fas fa-shopping-cart"></i></button>
        </form>
      @endif
      <a href="{{route('articles.index')}}" class="text-danger">Poursuivre vos achats</a><br>
      <a href="{{route('commandes.index')}}">Consulter la liste de vos commandes</a>
      @endguest
    </div>
  </div>

</div>
</div>
</div>
</div>
@endsection

