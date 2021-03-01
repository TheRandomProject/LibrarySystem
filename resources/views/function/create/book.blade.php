@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Create Book</h1>
    <hr>
    {!! Form::open(['route' => 'admin.books.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
            <input type="text" name="title" id="title" class="form-control @error('title')is-invalid @enderror" placeholder="Title">
            @error("title")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('author', 'Author')}}
            <input type="text" name="author" id="title" class="form-control @error('author')is-invalid @enderror" placeholder="Author">
            @error("author")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('quantity', 'Quantity')}}
            {{Form::number('quantity', '', ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('published', 'Published Date')}}
            {{Form::selectRange('published', 2021, 1800, '',['class'=>'form-control'])}}
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('Genre', 'Genre')}}
            <select class="form-control" name="genre">
                <option value="">Select Genre</option>
                <option value="Other" style="font-weight: bold">Other</option
                @foreach($genre as $genres)
                <option value="{{$genres->id}}">{{$genres->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <hr>
    <div class="float-right">
        <a href="{{route('admin.books.index')}}" class="btn btn-success btn-sm"><i class="fas fa-chevron-left"></i></a>
        {!! Form::submit('Create', ['class'=>'btn btn-primary btn-sm']) !!}
    </div>

    {!! Form::close() !!}
</div>


@endsection

