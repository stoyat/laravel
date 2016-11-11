<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book/index', ['books' => Book::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'author' => 'required|max:50|alpha',
            'year' => 'required|digits_between:1,4|numeric',
            'genre' => 'required|max:50|alpha',
        ]);
        if ($validator->fails())
        {
            return redirect('book/create')->withErrors($validator)->withInput();
        }
        else
        {
            $book = new Book;
            $book->title = $request->title;
            $book->author = $request->author;
            $book->year = $request->year;
            $book->genre = $request->genre;
            $book->save();

            return redirect('book')->with('status', 'New book successfully added!');
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
        return view('book/show', ['book' => Book::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('book/edit', ['book' => Book::findOrFail($id)]);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'author' => 'required|max:50|alpha',
            'year' => 'required|digits_between:1,4|numeric',
            'genre' => 'required|max:50|alpha',
        ]);
        if ($validator->fails())
        {
            return redirect("book/$id/edit")->withErrors($validator)->withInput();
        }
        else
        {
            $book = Book::findOrFail($id);
            $book->title = $request->title;
            $book->author = $request->author;
            $book->year = $request->year;
            $book->genre = $request->genre;
            $book->save();

            return redirect('book')->with('status', 'New book successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('book')->with('status', 'Book successfully deleted!');
    }
}
