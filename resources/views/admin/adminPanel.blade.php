@php
$articles = App\Article::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Espace d'administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b6d6c66951.js" crossorigin="anonymous"></script>
    <style>
      .blog-header {
        line-height: 1;
        border-bottom: 1px solid #e5e5e5;
      }
      h1, h2, h3, h4, h5, h6 {
       font-family: "Playfair Display", Georgia, "Times New Roman", serif;
      }
    </style>
  </head>
<body>
  <div class="container">
    <header class="blog-header py-3 mb-4">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-12 text-center">
        <h2 class="blog-header-logo text-dark">Espace d'administration</h2>
        </div>
      </div>
    </header>
  </div>
  <div class="container col-11 mt-4 mb-0">
  @if (session()->has('deleted'))
  <div class="alert alert-danger col-12" role="alert">
    {{session()->get('deleted')}}
  </div>
  @endif
  </div>
  <div class="px-4 px-lg-0 mt-4">
    <div class="pb-4">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-4 bg-white rounded shadow mb-5">
            <button class="btn btn-success shadow-sm mb-3 col-4"><i class="fas fa-plus"></i> Ajouter un article</button>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="border-0 bg-light">
            <div class="p-2 px-3 text-uppercase">ID</div>
          </th>
          <th scope="col" class="border-0 bg-light">
            <div class="py-2 text-uppercase">Titre</div>
          </th>
          <th scope="col" class="border-0 bg-light">
            <div class="py-2 text-uppercase">Catégorie</div>
          </th>
          <th scope="col" class="border-0 bg-light">
            <div class="py-2 text-uppercase">Prix</div>
          </th>
          <th scope="col" class="border-0 bg-light">
            <div class="py-2 text-uppercase">Supprimer</div>
          </th>
        </tr>
      </thead>
        <tbody>
          @foreach ($articles as $article)
          <tr>
            <td class="border-0 align-middle">{{$article->id}}</td>
            <th scope="row" class="border-0">
              <div class="p-2">
                <img src="{{$article->design}}" alt="{{$article->id}}" width="70" class="img-fluid rounded shadow-sm">
                <div class="ml-3 d-inline-block align-middle">
                  <h5 class="text-dark d-inline-block align-middle mb-0">{{$article->titre}}</h5>
                  <span class="text-muted font-weight-normal font-italic d-block">Categorie: {{$article->categorie}}</span>
                </div>
              </div>
            </th>
            <td class="border-0 align-middle">{{$article->categorie}}</td>
            <td class="border-0 align-middle">{{$article->prix}} Dhs</td>
            <td class="border-0 align-middle">
                <form method="POST" action=" {{route('delete',['article'=>$article->id])}} ">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-block btn-sm btn-outline-light"><i class="fas fa-trash" style="color:rgb(238, 54, 54)"></i></button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>