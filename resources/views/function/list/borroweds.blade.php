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
                <th>Borrowed Book</th>
                <th>request</th>
                <th>Date Request</th>
                <th>Date Taken</th>
            </tr>
            </thead>
            <tbody>

                @if(count($borroweds) >= 0)
                    @foreach($borroweds as $borrowed)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$borrowed->book->title}}</td>
                            <td>{{$borrowed->request}}</td>
                            <td>{{$borrowed->created_at}}</td>
                            <td>
                                @php
                                if($borrowed->created_at == $borrowed->updated_at){
                                    echo 'ew';
                                } else {
                                   echo $borrowed->updated_at;
                                }

                                @endphp
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
