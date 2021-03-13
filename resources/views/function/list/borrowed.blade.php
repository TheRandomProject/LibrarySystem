@extends('layouts.app')

@section('content')
<div class="container">
<h1>Borrowed List</h1>
<hr>
<div class="row">
    <form class="card-body" action="{{route('admin.borroweds.search')}}" method="GET" role="search">
        <input type="text" class="form-control" placeholder="Search Borrowed" name="query">
    </form>

    <div class="col-md-12">
        <table class="table table-bordered table-responsive-sm">
            <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Borrowed Book</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Date Request</th>
                <th>Date Taken</th>
                <th>Request</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @if(count($borroweds) > 0)
                    @foreach($borroweds as $borrowed)
                        @if ($borrowed->created_at == $borrowed->updated_at)
                            <tr class="bg-danger text-white">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$borrowed->student->firstname}}, {{$borrowed->student->lastname}}</td>
                                <td>{{$borrowed->book->title}}</td>
                                <td>{{$borrowed->student->email}}</td>
                                <td>{{$borrowed->student->contact}}</td>
                                <td>{{$borrowed->created_at}}</td>
                                <td> </td>
                                <td>{{$borrowed->request}}</td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        {!! Form::open(['route' => ['admin.borroweds.update', $borrowed->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        <input type="hidden" name="request" value="Taken">
                                        {{Form::hidden('_method','PUT')}}
                                        <button type="submit" class="btn btn-primary btn-sm mr-1" title="approve"><i class="fas fa-check"></i> Take</button>
                                    {!!Form::close()!!}

                                    {!! Form::open(['route' => ['admin.borroweds.destroy', $borrowed->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        <button type="submit" class="btn btn-secondary btn-sm" title="reject"><i class="fas fa-times"></i>Reject</button>
                                    {!! Form::close() !!}
                                    </div>

                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$borrowed->student->firstname}}, {{$borrowed->student->lastname}}</td>
                                <td>{{$borrowed->book->title}}</td>
                                <td>{{$borrowed->student->email}}</td>
                                <td>{{$borrowed->student->contact}}</td>
                                <td>{{$borrowed->created_at}}</td>
                                <td>{{$borrowed->updated_at}}</td>
                                <td>{{$borrowed->request}}</td>
                                <td class="text-center">
                                    {!! Form::open(['route' => ['admin.borroweds.destroy', $borrowed->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        <button type="submit" class="btn btn-success btn-sm" title="return"><i class="fas fa-undo-alt"></i> Return</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <th colspan="9" class="text-center bg-danger text-white"> No Result </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
