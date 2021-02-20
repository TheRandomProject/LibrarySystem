@extends('layouts.app')

@section('content')
<div class="container">
<h1>Student List</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @if(count($librarians) > 0)
                    @foreach($librarians as $librarian)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$librarian->firstname}}</td>
                        <td>{{$librarian->lastname}}</td>
                        <td>{{$librarian->email}}</td>
                        <td>{{$librarian->contact}}</td>
                        <td>{{$librarian->username}}</td>
                        <td class="text-center">
                            {!!Form::open(['route' => ['admin.librarians.destroy', $librarian->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <a href="/admin/librarians/{{$librarian->id}}/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pencil"></i></a>
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            {!!Form::close()!!}
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="7" class="text-center bg-danger text-white"> No Result </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
