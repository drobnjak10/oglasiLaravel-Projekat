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
                <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                    <tbody>
                        @foreach ($messages as $message)
                            
                        
                        <!-- row -->
                        <tr>
                            <!-- label -->
                            <td class="pl-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cst1" />
                                    <label class="custom-control-label" for="cst1">&nbsp;</label>
                                </div>
                            </td>
                            <!-- star -->
                            <td><i class="fa fa-star text-warning"></i></td>
                            <td>
                                <span class="mb-0 text-muted">{{$user->name}}</span>
                            </td>
                            <!-- Message -->
                            <td>
                                <a class="link" href="javascript: void(0)">
                                    <span class="badge badge-pill text-white font-medium badge-danger mr-2">Work</span>
                                    <span class="text-dark">{{$message->title}}-</span>
                                </a>
                            </td>
                            <!-- Attachment -->
                            <td><i class="fa fa-paperclip text-muted"></i></td>
                            <!-- Time -->
                            <td class="text-muted">{{$message->created_at}}</td>
                        </tr>
                        <!-- row -->
                        <tr>
                            @endforeach
               </div>
            </div>
        </div>
    </div>
</div>
@endsection