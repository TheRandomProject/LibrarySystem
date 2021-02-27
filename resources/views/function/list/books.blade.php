@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-4 text-center">
                <a href="/books/{{$book->id}}">
                    <div class="card shadow-book " style="width:300px">
                        <img class="card-img-top" src="/storage/cover_images/{{$book->cover_image}}" alt="Card image" style="height:340px">
                        <div class="card-body">
                            <h4 class="card-title">{{$book->title}}</h4>
                            <p>{{$book->author}}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{$books->links()}}
</div>
@endsection
