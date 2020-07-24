<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Admin Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    <script src="https://kit.fontawesome.com/b6d6c66951.js" crossorigin="anonymous"></script>
   <style>
      body {
        background-color: #f5f5f5;
        margin-top:20px; 
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
      }
    </style>
  </head>
<body>
    <div class="col-12 mb-4">
    @if (session()->has('wrong'))
      <div class="alert alert-danger" role="alert">
          {{session()->get('wrong')}}
      </div>
    @elseif(session()->has('first'))
      <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-triangle"></i> {{session()->get('first')}}
      </div>
    @endif
    </div>
    <div class="mt-4">
    <form class="form-signin mt-5" method="POST" action="{{route('checkLogin')}}">
        @csrf
        <h4 class="mb-4 font-weight-normal text-center mt-5"><i class="fas fa-user-shield"></i> Espace Admin</h4>
        <label for="inputEmail" class="sr-only">Adresse Email</label>
        <input name="email" type="email" id="inputEmail" class="form-control mb-2" placeholder="Adresse Email" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
        <div class="checkbox mb-3 text-center">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; Créé par l'équipe Asterisk 2020</p>
    </form>
    </div>
</body>
</html>
