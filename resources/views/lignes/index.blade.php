@inject('ligneController', 'App\Http\Controllers\LigneController')
@extends('layouts.master')
@section('content')
@if (session()->has('deleted'))
    <h3 style="color:red">
    {{session()->get('deleted')}}
    </h3>
    <br>
@endif
@if (session()->has('updated'))
    <h3 style="color:blue">
    {{session()->get('updated')}}
    </h3>
    <br>
@endif
@if (session()->has('added'))
    <h3 style="color:green">
    {{session()->get('added')}}
    </h3>
    <br>
@endif
<div>
  @guest
  <h2>Nombre des articles :{{$ligneController->countCartWithCookies()}}</h2>
  @else
  <h2>Nombre des articles :{{App\Ligne::count()}}</h2>
  @endguest
</div>
{{-- {{dd($_COOKIE['commande'])}} --}}
<table class="table">
    <thead>
      <tr>
        <th scope="col">ARTICLE</th>
        <th scope="col">QUANTITÉ</th>
        <th scope="col">PRIX UNITAIRE</th>
        <th scope="col">SOUS-TOTAL</th>
        <th scope="col">Supprimer</th>
      </tr>
    </thead>
    <tbody>
        @guest
        @foreach ($ligneController->cookieToArray() as $ligne)
        <?php $article = App\Article::find($ligne->article_id) ?>
        <tr>
        <th scope="row">Article {{$ligne->article_id}}</th>
        <td>
          <form action="{{route('updateElement')}}" method="POST">
            @csrf
            <input type="hidden" name="articleId" value="{{$ligne->article_id}}">
            <select name="articleQuantity" required="required" onchange="this.form.submit()">
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
        <td>{{$article->prix}} Dhs</td>
        <td>{{$ligne->quantity*$article->prix}} Dhs</td>
        @endif
        <td>
        <form method="GET" action="{{route('deleteElement')}}">
                @csrf
                <input type="hidden" name="articleId" value="{{$ligne->article_id}}">
                <button type="submit"><i class="fas fa-trash"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
        
        @else

        @foreach ($lignes as $ligne)
        <tr>
        <th scope="row">Article {{$ligneController->getLigneWithArticle($ligne->id)->id}}</th>
        <td>{{$ligne->quantite}}</td>
        <td>{{$ligne->prix_unit}}</td>
        <td>{{$ligne->quantite*$ligne->prix_unit}}</td>
        <td>
            <form method="POST" action="{{route('lignes.destroy',['ligne'=>$ligne->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit"><i class="fas fa-trash"></i></button>
            </form>
        </td>
        </tr>
        @endforeach
        @endguest
    </tbody>
  </table>
  <div>
    @guest
      <h6>Total TTC : {{$ligneController->getTotalTTCWithCookies()}} Dhs</h6>
    @else
      <h6>Total TTC : {{$ligneController->getTotalTTC()}} Dhs</h6>
    @endguest
      <br>
      <p>Frais de livraison non inclus pour le moment</p>
  </div>
  <div>
    <a href="{{route('articles.index')}}">Poursuivre vos achats</a>
    <br>
    <a href="{{}}">Finaliser votre commande</a>
  </div>
@endsection