<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use DB;
use App\Models\Book;
use App\Models\Borrowed;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;


class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['except' => ['Studentlist', 'show', 'Borrowed', 'searchbystudent']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(10);
        // return Book::all();
        return view('function.list.book')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::orderBy('name', 'asc')->get();
        $years = ['other'];
        for ($year = 1100; $year <= 2021; $year++) $years[$year] = $year;

        return view('function.create.book', compact('genre', 'years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'author' => 'required',
        //     'quantity' => 'required',
        //     'published' => 'required|min:1000|max:9999',
        //     'genre' => 'required',
        //     'cover_image' => 'image|nullable|max:1999'
        // ]);

        // Handle File Upload
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
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // return $request->input('published');

        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->quantity = $request->input('quantity');
        $book->published = $request->input('published');
        $book->genre_id = $request->input('genre');
        $book->cover_image = $fileNameToStore;
        $book->save();

        return redirect('/admin/books')->with('success', 'Book Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Book::find($id);
        $borrow = Borrowed::all();
        return view('function.show.book', compact('books', 'borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book   =   Book::find($id);
        $genre  =   Genre::all();




        if (!isset($book)) {
            return redirect()->route('admin.books.edit')->with('error', 'No Book Found');
        }

        if (!auth()->guard('admin')->check()) {
            return redirect()->back()->with('error', 'Unauthorized Book');
        }

        return view('function.edit.book', compact('book', 'genre',));
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
        $book = Book::find($id);
        // Handle File Upload
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

            if ($book->cover_image != 'noimage.jpg') {
                // Delete Image
                Storage::delete('public/cover_images/' . $book->cover_image);
            }
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->quantity = $request->input('quantity');
        $book->published = $request->input('published');
        $book->genre_id = $request->input('genre');
        $book->cover_image = $fileNameToStore;
        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Book Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = book::find($id);

        //Check if book exists before deleting
        if (!isset($book)) {
            return redirect()->route('admin.books.index')->with('error', 'No Book Found');
        }

        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book Removed');
    }

    public function Studentlist()
    {
        $books = Book::orderBy('created_at', 'asc')->paginate(10);
        return view('function.list.books')->with('books', $books);
    }

    public function Borrowed()
    {
        $borroweds = Borrowed::where('student_id', auth()->user()->id)->paginate(10);

        return view('function.list.borroweds', compact('borroweds'));
    }

    public function search(Request $request)
    {
        $search = $request->input('query');

        $books = Book::where('id', 'like', '%' . $search . '%')
            ->orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->orWhere('published', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('function.list.book', compact('books'));
    }

    public function searchbystudent(Request $request)
    {
        $search = $request->input('query');

        $books = Book::where('id', 'like', '%' . $search . '%')
            ->orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->orWhere('published', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('function.list.books', compact('books', 'search'));
    }
}
