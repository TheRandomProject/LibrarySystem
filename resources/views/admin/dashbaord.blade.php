@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-4 col-sm-1 mb-3">
            <div class="card admin-dashboard shadow bg-info text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 col-md-4">
                            <div class="card-icon">
                                <i class="fal fa-journal-whills"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <p class="card-number">{{count($countbooks)}}</p>
                            <p class="card-title">Book</p>
                        </div>
                    </div>
                    <hr>
                    <a href="{{route('admin.books.index')}}">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-1 mb-3">
            <div class="card admin-dashboard shadow bg-secondary text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 col-md-4">
                            <div class="card-icon">
                                <i class="fal fa-reply"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <p class="card-number">{{count($countborroweds)}}</p>
                            <p class="card-title">Borrowed</p>
                        </div>
                    </div>
                    <hr>
                    <a href="{{route('admin.borroweds.index')}}">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-1 mb-3">
            <div class="card admin-dashboard shadow bg-success text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 col-md-4">
                            <div class="card-icon">
                                <i class="fal fa-users-class"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <p class="card-number">{{count($countstudents)}}</p>
                            <p class="card-title">Student</p>
                        </div>
                    </div>
                    <hr>
                    <a href="{{route('admin.students.index')}}">View</a>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <h4>Book List</h4>
            <hr>
        </div>
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
                        </tr>
                        @endforeach
                        <tr>
                            <th colspan="7" class="text-center"><a href="{{route('admin.books.index')}}">View</a></th>
                        </tr>
                    @else
                        <tr>
                            <th colspan="7" class="text-center bg-danger text-white"> No Result </th>
                        </tr>
                    @endif
                </tbody>
              </table>
        </div>
        <div class="col-md-12">
            <h4>Borroweds List</h4>
            <hr>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-responsive-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student</th>
                    <th>Book</th>
                    <th>Due Date</th>
                    <th>Date Taken</th>
                    <th>Request</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($borroweds) > 0)
                    @foreach($borroweds as $borrowed)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$borrowed->student->firstname}}, {{$borrowed->student->lastname}}</td>
                        <td>{{$borrowed->book->title}}</td>
                        <td>{{$borrowed->due_date}}</td>
                        <td>{{$borrowed->updated_at}}</td>
                        <td>{{$borrowed->request}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="7" class="text-center"><a href="{{route('admin.borroweds.index')}}">View</a></th>
                    </tr>
                @else
                    <tr>
                        <th colspan="7" class="text-center bg-danger text-white"> No Result </th>
                    </tr>
                @endif
                </tbody>
              </table>
        </div>
        <div class="col-md-12">
            <h4>Students List</h4>
            <hr>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered table-responsive-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
                </thead>
                <tbody>
                @if (count($students) > 0)
                    @foreach($students as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->firstname}}</td>
                        <td>{{$student->lastname}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->contact}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="7" class="text-center"><a href="{{route('admin.students.index')}}">View</a></th>
                    </tr>
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


<script>

</script>
@endsection
