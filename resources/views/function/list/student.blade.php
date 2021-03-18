@extends('layouts.app')

@section('content')
<div class="container">
<h1>Student List</h1>
<hr>

<div class="row">
    <div class="col-md-12">
        <form class="card-body" action="{{route('admin.students.search')}}" method="GET" role="search">
            <input type="text" class="form-control" placeholder="Search Student" name="query" value="@isset($search) {{$search}} @endisset">
        </form>
    </div>
    <div class="col-md-12">
        <table class="table table-bordered table-responsive-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>firstname</th>
                <th>lastname</th>
                <th>email</th>
                <th>number</th>
                <th>username</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @if(count($students) > 0)
                    @foreach($students as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->firstname}}</td>
                        <td>{{$student->lastname}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->contact}}</td>
                        <td>{{$student->username}}</td>
                        <td class="text-center">
                            {!!Form::open(['route' => ['admin.students.destroy', $student->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                <a href="/admin/students/{{$student->id}}/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pencil"></i></a>
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
{{$students->links()}}
</div>
@endsection
