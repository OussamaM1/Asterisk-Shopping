@php
$cookie_name = "commande";
$cookie_value = "[]";
if(!isset($_COOKIE['commande']))
{
  setcookie($cookie_name, $cookie_value, time() + (86400 * 30),'/'); // 86400 = 1 day
}
// dd($_COOKIE['commande'])
@endphp
@inject('ligneController', 'App\Http\Controllers\LigneController')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Yassine Elhilali, Oussama Makhlouk">
    <title>Asterisk Shopping</title>
    <!-- Bootstrap core CSS -->
{{-- <link href="../../../public/css/app.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> --}}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b6d6c66951.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3 mb-4">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      @guest
      <a class="text-muted" href="{{route('lignes.index')}}">Panier <span class="badge badge-pill badge-warning">{{$ligneController->countCartWithCookies()}}</span></a>
      @else
      <a class="text-muted" href="{{route('lignes.index')}}">Panier <span class="badge badge-pill badge-warning">{{$ligneController->countCart()}}</span></a>
      @endguest
      </div>
      <div class="col-4 text-center">
      <a class="blog-header-logo text-dark" href="{{route('welcome')}}">Asterisk Shopping</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        @guest
        <a class="btn btn-sm btn-primary mr-2" href="{{route('login')}}">Se connecter</a>
        <a class="btn btn-sm btn-outline-secondary" href="{{route('register')}}">Créer un compte</a>
        @else
        <li class="nav-item dropdown li">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->nom . " " . Auth::user()->prenom }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('logout')}}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Se déconnecter') }}
              </a>
              <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
        </li>
        @endguest
      </div>
    </div>
  </header>
  <div>
    @yield('content')
  </div>
</div>
<footer class="blog-footer">
  <p>Crée par l'équipe Asterisk <span id="yearSpan"></span></p>
  <p>Toutes les droits sont réservés</p>
  <script>
    let date = new Date();
    let year = date.getFullYear();
    document.getElementById("yearSpan").innerHTML = year;
  </script>
</footer>
</body>
</html>
