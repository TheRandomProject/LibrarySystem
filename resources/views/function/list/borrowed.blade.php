@extends('layouts.app')

@section('content')
<div class="container">
<h1>Borrowed List</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Borrowed Book</th>
                <th>Email</th>
                <th>Contact</th>
                <th>request</th>
                <th>Date Request</th>
                <th>Date Taken</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @if(count($borroweds) > 0)
                    @foreach($borroweds as $borrowed)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$borrowed->student->firstname}}, {{$borrowed->student->lastname}}</td>
                        <td>{{$borrowed->book->title}}</td>
                        <td>{{$borrowed->student->email}}</td>
                        <td>{{$borrowed->student->contact}}</td>
                        <td>{{$borrowed->request}}</td>
                        <td>{{$borrowed->created_at}}</td>
                        <td>
                            {{$borrowed->updated_at}}
                        </td>
                        <td>
                            <button href="/admin/librarians/{{$borrowed->id}}/edit" class="btn btn-primary btn-sm" title="approve"><i class="fas fa-check"></i></button>
                                {!!Form::open(['route' => ['admin.borroweds.destroy', $borrowed->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    <button type="submit" class="btn btn-danger btn-sm" title="reject"><i class="fas fa-times"></i></button>
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
