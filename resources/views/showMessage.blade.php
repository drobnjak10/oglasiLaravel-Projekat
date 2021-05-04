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
                <div class="card">
                    <div class="card-body">
                               <span class="media-meta float-right">{{$message->created_at->format('d/M/Y')}}</span>
                               <h4 class="text-primary m-0">{{$sender->name}}</h4>
                               <small class="text-muted">From : {{$sender->email}}</small>
                               <h6>Naslov: {{$message->title}}</h6>
                               <p>{{$message->text}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('user.showMessage', ['id' => $message->id])}}" method="POST">
                                @csrf
                                <input type="text" name="title" class="form-control" placeholder="Title"><br>
                                <textarea name="text" placeholder="Vas odgovor..." cols="30" rows="10" class="form-control"></textarea>
                                <input type="hidden" name="sender_id" value="{{Auth::user()->id}}" class="form-control"><br>
                                <input type="hidden" name="receiver_id" value="{{$sender->id}}" class="form-control"><br>
                                <input type="hidden" name="ad_id" value="{{$message->ad_id}}" class="form-control"><br>
                                <button class="btn btn-info" type="submit">Odgovori</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection