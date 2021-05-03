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
            <h3>Moji oglasi</h3>
            <div class="row">
                @foreach ($ads as $ad)
                <div class="card m-3 bg-light text-dark" style="width: 18rem;" >
                    <img class="card-img-top img-responsive" src="/ad_images/{{$ad->image1}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$ad->title}}</h5>
                      <a href="#" class="btn btn-primary">{{$ad->price}} RSD</a>
                      <a href="{{route('user.adInfo', ['id' => $ad->id])}}" class="btn btn-primary float-right">Info</a>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
