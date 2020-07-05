@extends('layouts.master')
@section('content')
<div>
    @php
        $commandes = App\Commande::where('client_id',Auth::user()->id)->get();
    @endphp
    @foreach ($commandes as $commande)
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h6>Date de commande : {{$commande->date}} </h6>
            <h6>Numéro de commande : {{$commande->id}} </h6>
        </div>
      </div>
    @endforeach
</div>
@endsection