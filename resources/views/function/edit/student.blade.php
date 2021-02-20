@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Student Book</h1>
    <hr>
    {!! Form::open(['route' => ['admin.students.update', $student->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-12 form-group">
            {{Form::label('cover', 'Cover Image')}}
            <div class="custom-file">
                <input type="file" name="cover_image" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('username', 'username')}}
            <input type="text" name="username" id="username" class="form-control @error('username')is-invalid @enderror" placeholder="Title" value="{{$student->username}}">
            @error("username")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('firstname', 'firstname')}}
            <input type="text" name="firstname" id="firstname" class="form-control @error('username')is-invalid @enderror" placeholder="Title" value="{{$student->firstname}}">
            @error("firstname")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('lastname', 'lastname')}}
            <input type="text" name="lastname" id="lastname" class="form-control @error('username')is-invalid @enderror" placeholder="Title" value="{{$student->lastname}}">
            @error("username")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('contact', 'contact number')}}
            <input type="number" name="contact" id="contact" class="form-control @error('contact')is-invalid @enderror" placeholder="Title" value="{{$student->contact}}">
            @error("username")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-12 form-group">
            {{Form::label('email', 'email address')}}
            <input type="email" name="email" id="email" class="form-control @error('email')is-invalid @enderror" placeholder="Title" value="{{$student->email}}">
            @error("username")
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <hr>
    {{Form::hidden('_method','PUT')}}
    <div class="float-right">
        <a href="{{route('admin.students.index')}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Back"><i class="fas fa-chevron-left"></i></a>
        {{Form::submit('Update', ['class'=>'btn btn-primary btn-sm'])}}
    </div>

    {!! Form::close() !!}
</div>


@endsection
