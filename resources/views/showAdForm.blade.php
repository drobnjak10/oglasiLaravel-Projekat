@extends('layouts.master')

@section('main')
<div class="container-fluid text-center text-light">
    <h1 class="mt-3">Dodaj oglas!</h1>
    <div class="col-4 mx-auto">
        <form action="{{route('newAd')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Title" class="form-control"><br>
            <input type="text" name="body" placeholder="Body" class="form-control"><br>
            <input type="number" name="price" placeholder="Price" class="form-control"><br>
            <input type="file" name="image1" class="form-control"><br>
            <input type="file" name="image2" class="form-control"><br>
            <input type="file" name="image3" class="form-control"><br>
            <select name="category" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select><br>
            <button class="btn btn-primary form-control" type="submit">Dodaj oglas</button>
        </form>
    </div>
    
</div>
@endsection
