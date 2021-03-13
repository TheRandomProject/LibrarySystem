<?php

namespace App\Http\Controllers;

use App\Models\Borrowed;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use DB;

class BorrowedsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borroweds = Borrowed::orderBy('request', 'desc')->paginate(15);

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

        if (Borrowed::where(['book_id' => $request->input('book_id'), 'student_id' => auth()->user()->id])->count() >= 1) {

            return redirect('/books')->with('error', 'Book Ready Borrow');
        } else {

            $borrow = new Borrowed;
            $borrow->due_date = Carbon::now()->addDay(4);
            $borrow->request = 'pending';
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
        $this->validate($request, [
            'request' => 'required'
        ]);

        $borrow = Borrowed::find($id);

        $borrow->request = $request->input('request');
        $borrow->save();

        return redirect()->back()->with('success', 'Approve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrow = Borrowed::find($id);

        if (!isset($borrow)) {
            return redirect()->route('admin.borroweds.index')->with('error', 'No Borrowed Found');
        }

        $borrow->delete();
        return redirect()->route('admin.borroweds.index')->with('success', 'Deleted Borrowed!');
    }

    public function search(Request $request)
    {

        $search = $request->input('query');
        $borroweds = Borrowed::where('id', 'like', '%' . $search . '%')
            ->orWhere('request', 'like', '%' . $search . '%')
            ->orWhere('due_date', 'like', '%' . $search . '%')
            // ->orWhere($book->title, 'like', '%' . $search . '%')
            ->paginate(10);


        return view('function.list.borrowed', compact('borroweds'));
    }
}
