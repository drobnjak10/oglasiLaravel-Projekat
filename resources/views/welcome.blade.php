@extends('layouts.master')

@section('main')
<div class="container-fluid  text-dark">
    <h1 class="mt-3 text-center">Dobrodosli nas nas veb sajt</h1>
    <div class="row">
        <div class="col-4 mt-3 text-info">
            <ul class="navbar-nav">
                <span class="btn btn-danger">Kategorije</span>
                @foreach ($categories as $category)
                <li class="nav-item mt-3 text-center"><a href="?category={{$category->name}}" class="display-6">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-8 mt-3">
            <h3>Oglasi</h3>
            
            <div class="row">
                @foreach ($ads as $ad)
                <div class="card m-3 bg-light text-dark" style="width: 18rem;" >
                    <img class="card-img-top img-responsive" src="/ad_images/{{$ad->image1}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$ad->title}}</h5>
                      <a href="#" class="btn btn-primary">Cena: {{$ad->price}}</a>
                      <a href="{{route('singleAd', ['id' => $ad->id])}}" class="btn btn-primary float-right">Info</a>
                    </div>
                  </div>
                @endforeach
            </div>
    </div>  
</div>
@endsection


