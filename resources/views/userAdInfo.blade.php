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
            @include('flashMsg')
        </div>
        <div class="col-8 mt-3">
            <h3>Moji oglasi</h3>
            <div class="row">
                @if (isset($ad->image1))
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/ad_images/{{$ad->image1}}">
                        </div>
                    </div>
                </div>
                @endif
                @if (isset($ad->image2))
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/ad_images/{{$ad->image2}}">
                        </div>
                    </div>
                </div>
                @endif
                @if (isset($ad->image3))
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/ad_images/{{$ad->image3}}">
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <h3 class="m-3">{{$ad->title}}</h3>
                    <span class="btn btn-warning">{{$ad->category->name}}</span>
                    <p class="m-3">{{$ad->body}}</p>
                    <a href="#" class="btn btn-primary">{{$ad->price}} RSD</a>
                    <a href="{{route('user.deleteAd', ['id' => $ad->id])}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection