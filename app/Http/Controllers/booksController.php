<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_books = book::with('author')->get();
        // $all_books = book::orderBy('book_title')->get();
        // $all_books = book::where('book_author', 'Dan Brown')->get();
        // return view('books', ['all_books' => $all_books]);
        return view('index', ['all_books' => $all_books]);
    }



    public function add()
    {
        // if (!Gate::allows('isAdmin')) {
        //     return abort(403, 'UnOthorized Action');
        // }
        // or
        Gate::authorize('isAdmin');
        $authors = author::all();

        return view('add', ['authors' => $authors]);
    }


    public function show($id)
    {
        $book = book::withTrashed()->findorfail($id);
        return view('show', ['book' => $book]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('isAdmin');

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

        $book =  book::create($request->all());

        if ($request->hasFile('book_image')) {
            $request->file('book_image')->store('public/images');

            // ensure every image has a different name
            $file_name = $request->file('book_image')->hashName();

            // save new image $file_name to database
            $book->update(['book_image' => $file_name]);
        }


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
        Gate::authorize('isAdmin');

        $book = book::findorfail($id);
        $authors = author::all();
        return view('update', ['book' => $book, 'authors' => $authors]);
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
        if (!Gate::allows('isAdmin')) {
            return abort(403, 'UnOthorized Action');
        }

        $request->validate([
            'book_title' => 'required',
            'book_author' => 'required',
            'book_image' => 'required',
            'book_description' => 'required'

        ]);

        $book = book::findorfail($id);
        $book->book_description = $request->book_description;
        $book->book_author = $request->book_author;
        $book->book_title = $request->book_title;
        $book->book_image = $request->book_image;
        $book->save();

        return redirect('books')->with('updatemsg', 'Book was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('isAdmin');

        $book = book::findorfail($id);
        $book->delete();
        return redirect('books')->with('deletemsg', 'Book was successfully deleted');
    }


    public function forceDelete($id)
    {
        if (!Gate::allows('isAdmin')) {
            return abort(403, 'UnOthorized Action');
        }

        book::withTrashed()->findorfail($id)->forceDelete();
        return redirect('books')->with('deletemsg', 'Book was successfully deleted');
    }

    public function restore($id)
    {
        Gate::authorize('isAdmin');

        book::withTrashed()->findorfail($id)->restore();
        return redirect('books')->with('restoremsg', 'Book was successfully restored');
    }


    public function restoreAll()
    {
        Gate::authorize('isAdmin');

        book::onlyTrashed()->restore();
        return redirect('books')->with('restoreAllMsg', 'Books where successfully restored');
    }



    public function trash()
    {
        Gate::authorize('isAdmin');

        $trash = Book::onlyTrashed()->get();
        return view('Trash', ['trash' => $trash]);
    }

    public function author($id)
    {
        $author = author::findorfail($id);
        $books = author::findorfail($id)->books()->get();
        // dd($author, $books);
        return view('author', ['author' => $author, 'books' => $books]);
    }

    public function addAuthor(Request $request)
    {
        Gate::authorize('isAdmin');

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nationality' => 'required',
        ]);

        author::create($request->all());

        return redirect('books')->with('Book was successfully created');
    }

    public function authorForm()
    {
        Gate::authorize('isAdmin');

        return view('authorForm');
    }

    public function searchResults(Request $request)
    {
        $name = $request->name;

        $results = book::where('book_title', 'like', "%{$name}%")->get();

        return view('searchResults', ['results' => $results]);
    }
}
