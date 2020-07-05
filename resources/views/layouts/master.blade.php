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
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      /* stylelint-disable selector-list-comma-newline-after */

.blog-header {
  line-height: 1;
  border-bottom: 1px solid #e5e5e5;
}

.blog-header-logo {
  font-family: "Playfair Display", Georgia, "Times New Roman", serif;
  font-size: 2.25rem;
}

.blog-header-logo:hover {
  text-decoration: none;
}

h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display", Georgia, "Times New Roman", serif;
}

.display-4 {
  font-size: 2.5rem;
}
@media (min-width: 768px) {
  .display-4 {
    font-size: 3rem;
  }
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: nowrap;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-scroller .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
}

.card-img-right {
  height: 100%;
  border-radius: 0 3px 3px 0;
}

.flex-auto {
  -ms-flex: 0 0 auto;
  flex: 0 0 auto;
}

.h-250 { height: 250px; }
@media (min-width: 768px) {
  .h-md-250 { height: 250px; }
}

/* Pagination */
.blog-pagination {
  margin-bottom: 4rem;
}
.blog-pagination > .btn {
  border-radius: 2rem;
}

/*
 * Blog posts
 */
.blog-post {
  margin-bottom: 4rem;
}
.blog-post-title {
  margin-bottom: .25rem;
  font-size: 2.5rem;
}
.blog-post-meta {
  margin-bottom: 1.25rem;
  color: #999;
}

/*
 * Footer
 */
.blog-footer {
  padding: 2.5rem 0;
  color: #999;
  text-align: center;
  background-color: #f9f9f9;
  border-top: .05rem solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}
.li{
  list-style-type: none;
}
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
      @guest
      <a class="text-muted" href="{{route('lignes.index')}}">Panier <span style="color:black;font-weight:bold">{{$ligneController->countCartWithCookies()}}</span></a>
      @else
      <a class="text-muted" href="{{route('lignes.index')}}">Panier <span style="color:black;font-weight:bold">{{$ligneController->countCart()}}</span></a>
      @endguest
      </div>
      <div class="col-4 text-center">
      <a class="blog-header-logo text-dark" href="{{route('welcome')}}">Asterisk Shopping</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        @guest
        <a class="btn btn-sm btn-outline-secondary" href="{{route('login')}}">Se connecter</a>
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
                  {{ __('Logout') }}
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
    <form action="{{route('search')}}" class="form-inline" method="POST">
      @csrf
      <div class="form-group mx-sm-3 mb-2">
      <input type="text" placeholder="Chercher un produit" class="form-control" name="q">
      <button type="submit" class="btn btn-info mb-2">Rechercher</button>
      </div>
    </form>
  </div>
  <div class="row mb-2">
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
