@extends('layouts.app')

@section('content')

<div class="container">
@include('layouts.messages')
<form class="card-body" action="{{route('student.books.search')}}" method="GET" role="search">
    <input type="text" class="form-control" placeholder="Search Book" name="query" value="@isset($search) {{$search}} @endisset">
</form>
    <div class="row">
        @if(count($books) > 0)
            @foreach ($books as $book)
                <div class="col-md-4 text-center mb-4">
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
        @else
           <div class="col-md-12">

            <div class="alert alert-danger" role="alert">
               No Result Found!
              </div>
           </div>
        @endif
    </div>
    {{$books->links()}}
</div>
@endsection
