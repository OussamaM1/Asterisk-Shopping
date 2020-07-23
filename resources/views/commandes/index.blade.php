@extends('layouts.master')
@section('content')
@if (session()->has('added'))
    <div class="alert alert-success" role="alert">
        {{session()->get('added')}}
    </div>
@endif
<div class="col-11 mb-4">
    @php
        $commandes = App\Commande::where('client_id',Auth::user()->id)->get();
    @endphp
    <h4 class="mb-3">Liste de Commandes :</h4>
    @foreach ($commandes as $commande)
    <div class="jumbotron jumbotron-fluid bg-light shadow-sm mb-3 px-4 py-3 font-weight-normal">
        <div class="container">
            <span>Date de commande : <strong class="text-info">{{$commande->date}}</strong> </span><br>
            <span>Numéro de commande : {{$commande->id}} </span>
        </div>
    </div>
    @endforeach
</div>
@endsection