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
                </div>
            </div>
        </div>
        <div class="col-4 mt-3">
            <h3 class="text-center mb-3">Dodaj deposit</h3>
                <form action="{{route('user.addDeposit')}}" method="POST">
                    @csrf
                    <input type="text" name="deposit" class="form-control" placeholder="Dodaj deposit"><br>
                    <button class="btn btn-info form-control" type="submit">Potvrdi</button>
                </form>
                @error('deposit')
                    <div class="alert alert-warning">{{$errors->first('deposit')}}</div>
                @enderror
        </div>
    </div>
</div>
@endsection