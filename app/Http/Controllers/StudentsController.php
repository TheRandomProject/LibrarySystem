<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->paginate(10);

        return view('function.list.student')->with('students', $students);
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
        $student = Student::find($id);
        if (!isset($student)) {
            return   redirect()->route('admin.books.index')->with('error', 'Student Not Found!');
        }

        if (!auth()->guard('admin')->check()) {
            return redirect()->back()->with('error', 'Unauthorized Personnel!');
        }

        return view('function.edit.student')->with('student', $student);
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
        $student = Student::find($id);

        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

            if ($student->cover_image != 'noimage.jpg') {
                // Delete Image
                Storage::delete('public/cover_images/' . $student->cover_image);
            }
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $student->username = $request->input('username');
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->contact = $request->input('contact');
        $student->email = $request->input('email');
        $student->image = $fileNameToStore;
        $student->save();

        return redirect()->route('admin.students.index')->with('success', 'Book Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Student::find($id);

        //Check if book exists before deleting
        if (!isset($book)) {
            return redirect()->route('admin.students.index')->with('error', 'No Book Found');
        }

        $book->delete();
        return redirect()->route('admin.students.index')->with('success', 'Book Removed');
    }

    public function search(Request $request)
    {

        $search = $request->input('query');
        $students = Student::where('id', 'like', '%' . $search . '%')
            ->orWhere('firstname', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('contact', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->paginate(10);


        return view('function.list.student', compact('students', 'search'));
    }
}
