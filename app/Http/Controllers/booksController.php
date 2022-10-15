<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_books = book::all();
        // $all_books = book::orderBy('book_title')->get();
        // $all_books = book::where('book_author', 'Dan Brown')->get();
        // return view('books', ['all_books' => $all_books]);
        return view('index', ['all_books' => $all_books]);
    }



    public function add()
    {
        return view('add');
    }


    public function show($id)
    {
        $book = book::findorfail($id);
        return view('show', ['book' => $book]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //the same ass add route
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_title' => 'required',
            'book_author' => 'required',
            'book_image' => 'required',
            'book_description' => 'required'

        ]);
        // book::create([
        //     'book_title' => $request->book_title,
        //     'book_image' => $request->book_image,
        //     'book_description' => $request->book_description,
        //     'book_author' => $request->book_author
        // ]);

        book::create($request->all());

        return redirect('books')->with('Book was successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
