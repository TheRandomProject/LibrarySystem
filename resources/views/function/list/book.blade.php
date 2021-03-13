@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Books List</h1>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('admin.books.create')}}" class="btn btn-primary float-right">Create</a><br><br>
        </div>

        <form class="card-body" action="{{route('admin.books.search')}}" method="GET" role="search">
            <input type="text" class="form-control" placeholder="Search Book" name="query">
        </form>

        <div class="col-md-12">

            <table class="table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Genre</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($books) > 0)
                        @foreach($books as $book)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->quantity}}</td>
                            <td>{{$book->genre->name}}</td>
                            <td>{{$book->published}}</td>
                            <td class="text-center">
                                {!!Form::open(['action' => ['BooksController@destroy', $book->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    <a href="/admin/books/{{$book->id}}/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-pencil"></i></a>
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
{{ $books->links() }}

</div>
@endsection
