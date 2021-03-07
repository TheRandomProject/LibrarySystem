<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Book;
use App\Models\Borrowed;
use App\Models\Student;
use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Form Database
        $books          =       Book::orderBy('created_at', 'desc')->paginate(5);
        $borroweds      =       Borrowed::orderBy('request', 'desc')->paginate(5);
        $students       =       Student::orderBy('created_at', 'desc')->paginate(5);
        $librarians     =       Librarian::orderBy('created_at', 'desc')->paginate(5);

        $countbooks = Book::all();
        $countborroweds = Borrowed::all();
        $countstudents = Student::all();
        // Variables into Arrary
        $array          =       ['books' => $books, 'borroweds' =>  $borroweds, 'students' =>  $students, 'librarians' => $librarians, 'countbooks' => $countbooks, 'countborroweds' => $countborroweds, 'countstudents' => $countstudents];
        // Pass to the Page
        return view('admin.dashbaord')->with($array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //
    }
}
