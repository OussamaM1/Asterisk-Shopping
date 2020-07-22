@inject('ligneController', 'App\Http\Controllers\LigneController')
@extends('layouts.master')
@section('content')
@if(Auth::user() == null)
{
    @php
        redirect('register');
    @endphp
}

@else
    @php
        while(!($commandesArray = App\Commande::get()->where('client_id',Auth::user()->id)->where('date','==','1970-01-01')->toArray()))
        {
            App\Commande::createCommande();
        }
    @endphp
    <form action="{{route('commandes.edit',['commande'=>end($commandesArray)['id']])}}">
        <div class="container">
            <h1>ADRESSE</h1>
            <label for="nom">Nom :</label>
        <input type="text" id="nom" value="{{Auth::user()->nom}}" name="nom">
            <br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" value="{{Auth::user()->prenom}}" name="prenom">
            <br>
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" value="{{Auth::user()->adresse}}" name="adresse">
            <br>
            <label for="ville">Ville :</label>
            <input type="text" id="ville" value="{{Auth::user()->ville}}" name="ville">
            <br>
        </div>
        <div class="container">
            <h1>PAIEMENT</h1>
            <br>
            <img src="/V-M-C.png" alt="">
                <label for="card">Numéro de carte : </label>
                <input type="text" id="card">
                <br>
                <input type="submit" onsubmit="return luhn_validate();" value="Confirmer la commande">
        </div>
    </form>
    <h6>Total TTC : {{$ligneController->getTotalTTC()}} Dhs</h6>
    <script>
        function luhn_checksum(code) {
            var len = code.length;
            var parity = len % 2;
            var sum = 0;
            for (var i = len-1; i >= 0; i--) {
                var d = parseInt(code.charAt(i))
                if (i % 2 == parity) { d *= 2 }
                if (d > 9) { d -= 9 }
                sum += d;
            }
            return sum % 10;
        }
        function luhn_validate(fullcode) {
            return luhn_checksum(fullcode) == 0;
        }
    </script>
@endif
@endsection