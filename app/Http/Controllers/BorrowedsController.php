<?php

namespace App\Http\Controllers;

use App\Models\Borrowed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BorrowedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borroweds = Borrowed::orderBy('created_at', 'asc')->paginate(15);

        return view('function.list.borrowed')->with('borroweds', $borroweds);
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
        $this->validate($request, [
            'book_id' => 'required'
        ]);

        $check = Borrowed::where('book_id', $request->input('book_id'))->count();

        if ($check >= 1) {
            return redirect('/books')->with('error', 'Book Ready Borrow');
        } else {

            $borrow = new Borrowed;
            $borrow->book_id = $request->input('book_id');
            $borrow->student_id = auth()->user()->id;
            $borrow->save();

            return redirect('/books')->with('success', 'Boook Success Borrow');
        }
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
