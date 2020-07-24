@php
$articles = App\Article::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Espace d'administration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <button class="btn btn-primary">Ajouter un article</button>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Prix</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($articles as $article)
          <tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->titre}}</td>
            <td>{{$article->categorie}}</td>
            <td>{{$article->prix}}</td>
            <td>
                <form method="POST" action=" {{route('delete',['article'=>$article->id])}} ">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-block btn-sm btn-outline-light"><i class="fas fa-trash" style="color:rgb(238, 54, 54)">DELETE</i></button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>