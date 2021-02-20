<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use Illuminate\Http\Request;

class LibrariansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $librarians = Librarian::orderBy('created_at', 'asc')->paginate(15);

        return view('function.list.librarian')->with('librarians', $librarians);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $librarian = Librarian::find($id);

        if (!isset($librarian)) {
            return redirect()->route('admin.librarians.index')->with('error', 'Librarian Account NOT FOUND!');
        }

        if (!auth()->guard('admin')->check()) {
            return redirect()->back()->with('error', 'Uanauthorized Personnel!');
        }

        return view('function.edit.librarian')->with('librarian', $librarian);
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
        $librarian = Librarian::find($id);

        $librarian->username = $request->input('username');
        $librarian->firstname = $request->input('firstname');
        $librarian->lastname = $request->input('lastname');
        $librarian->contact = $request->input('contact');
        $librarian->email = $request->input('email');
        $librarian->save();

        return redirect()->route('admin.librarians.index')->with('success', 'Librarian Account Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $librarian = Librarian::find($id);

        //Check if librarian exists before deleting
        if (!isset($librarian)) {
            return redirect()->route('admin.librarians.index')->with('error', 'Account Not Found!');
        }

        if (!auth()->guard('admin')->check()) {
            return redirect()->back()->with('error', 'Unauthorized Personnel!');
        }

        $librarian->delete();
        return redirect()->route('admin.librarians.index')->with('success', 'Account Removed!');
    }
}
