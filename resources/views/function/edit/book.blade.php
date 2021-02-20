@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create Book</h1>
    <hr>
    {!! Form::open(['action' => ['BooksController@update', $book->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-12 form-group">
            {{Form::label('cover', 'Cover Image')}}
            <div class="custom-file">
                <input type="file" name="cover_image" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('title', 'Title')}}
            <input type="text" name="title" id="title" class="form-control @error('title')is-invalid @enderror" placeholder="Title" value="{{$book->title}}">
            @error("title")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('author', 'Author')}}
            <input type="text" name="author" id="title" class="form-control @error('author')is-invalid @enderror" placeholder="Author" value="{{$book->author}}">
            @error("author")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('quantity', 'Quantity')}}
            {{Form::text('quantity', $book->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
        </div>

        <div class="col-md-12 form-group">
            {{Form::label('published', 'Published Date')}}
            <select name="published" class="form-control" id="">
                <option value="{{$book->published}}">{{$book->published}}</option>
                @foreach(range(2021, 1800) as $year)
                    <option value="{{$year}}">{{$year}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('Genre', 'Genre')}}
            <select class="form-control" name="genre">
                <option value="{{$book->genre_id}}">{{$book->genre->name}}</option>
                <option value="Other" style="font-weight: bold">Other</option>
                @foreach($genre as $genres)
                <option value="{{$genres->id}}">{{$genres->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    {{Form::hidden('_method','PUT')}}
    <div class="float-right">
        <a href="{{route('admin.books.index')}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Back"><i class="fas fa-chevron-left"></i></a>
        {{Form::submit('Update', ['class'=>'btn btn-primary btn-sm'])}}
    </div>

    {!! Form::close() !!}
</div>


@endsection

