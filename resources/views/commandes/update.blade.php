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
    <form action="{{route('commandes.edit',['commande'=>end($commandesArray)['id']])}}" class="form-group">
        <div class="row py-5 p-4 bg-white rounded shadow p-3 mb-5">
            <div class="col-lg-12">
              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Adresse de livraison</div>
            </div>
            <div class="col-lg-12">
            <div class="p-4">
                <p class="font-italic mb-4">
                    Si vos coordonnés changent, Merci de nous indiquer l'adresse de livraison de votre commande.  
                </p>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" value="{{Auth::user()->nom}}" name="nom" class="form-control" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" value="{{Auth::user()->prenom}}" name="prenom" class="form-control" placeholder="prenom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" value="{{Auth::user()->adresse}}" name="adresse" class="form-control" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" id="ville" value="{{Auth::user()->ville}}" name="ville" class="form-control" placeholder="Agadir,...">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">PAIEMENT</div>
              </div>
              <div class="col-lg-12">
                <div class="p-4">
                  <p class="font-italic mb-3">
                    Les frais d'expédition et supplémentaires sont calculés en fonction des articles commandés.  
                  </p>
        
                  <ul class="list-unstyled mb-5">
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Nombre des articles de la commande</strong><strong> {{$ligneController->countCart()}}</strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total TTC</strong><strong>{{$ligneController->getTotalTTC()}} Dhs</strong></li>
                  </ul> 
                  <label for="card" class="mb-3"><strong>Numéro de votre carte bancaire : </strong></label>
                  <div class="form-inline mb-4">
                    <div class="input-group-append mr-5">
                    <input type="text" id="card" class="form-control col-12" placeholder="0000 0000 0000 0000">
                    <span class="input-group-text py-2 mr-3">
                        <i class="far fa-credit-card"></i>
                    </span>
                    </div>
                    <img src="/images/V-M-C.png" alt="paiement">
                  </div>
                  <button class="btn btn-success col-6" type="submit"onsubmit="return luhn_validate();"><i class="fas fa-shopping-cart"></i> Confirmer la commande</button>    
                </div>
              </div>
    </div>
    </form>
</div>
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