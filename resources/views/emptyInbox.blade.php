@extends('layouts.master')

@section('main')
<div class="container-fluid  text-dark m-3">
    <div class="row">
        <div class="col-4 mt-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Korisnik: {{ Auth::user()->name}} </h5>
                  <p class="card-text">Email: {{Auth::user()->email}}</p>
                  <a href="#" class="btn btn-info">Deposit: {{Auth::user()->deposit}} </a>
                  <a href="{{route('user.addDeposit')}}" class="btn btn-primary">Add Deposit </a>
                  <a href="{{route('user.inbox')}}" class="btn btn-warning mt-2">Moje poruke</a>
                </div>
            </div>
            @include('flashMsg')
        </div>
        <div class="col-8 mt-3">
            <h3>Prijemno sanduce</h3>
            <div class="row">
               <div class="col-8">
                    Vas inbox je prazan            
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
