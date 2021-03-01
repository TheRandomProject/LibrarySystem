@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="/storage/cover_images/{{$books->cover_image}}" alt="" width="320" height="500">
        </div>
        <div class="col-md-6">
            <h1>
                {{$books->title}}
            </h1>
            <p>
                 Author: {{$books->author}}<br>
                 Genre: {{$books->genre->name}}
            </p>
        </div>
    </div>
    <hr>
    <div class="float-right">
        @if (count($borrow) >= $books->quantity)
            <a href="/books" class="btn btn-primary">Back</a>
            <button type="button" class="btn btn-primary" disabled>Borrow</button>
        @else
        {!! Form::open(['action' => 'BorrowedsController@store', 'method' => 'POST', 'enctype' => 'mutipart/form-data']) !!}
            <a href="/books" class="btn btn-primary">Back</a>
            {!! Form::hidden('book_id', $books->id) !!}
            {!! Form::submit('Borrow', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        @endif

    </div>
</div>
@endsection
