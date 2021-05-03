@extends('layouts.master')

@section('main')
<div class="container-fluid  text-dark m-3">
    <div class="row">
        <div class="col-4 mt-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Vlasnik oglasa: {{ $ad->user->name}} </h5>
                  <p class="card-text">Email: {{$ad->user->email}}</p>
                  <a href="" class="btn btn-info">Oglas postavljen: {{$ad->created_at->format('d/m/Y')}}</a>
                </div>
            </div>
            <div class="row">
                <div class="card m-3">
                    <div class="card-body">
                        <span class="btn btn-warning mb-3">Poruka</span>
                        <form action="{{route('sendMessage', ['id' => $ad->id])}}" method="POST">
                            @csrf
                            <input type="text" name="title" class="form-control" placeholder="Naslov poruke"><br>
                            <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Napisite vasu poruku..."></textarea>
                            <button class="btn btn-primary mt-3" type="submit">Posalji poruku</button>
                        </form>
                    </div>
                </div>
            </div>
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
                </div>
            </div>

        </div>
    </div>
    
</div>
@endsection
