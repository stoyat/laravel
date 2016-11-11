<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Book;
use DB;

class BookUserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBooks($id)
    {
        return view('user/books', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chooseBook($id)
    {
        $user = User::findOrFail($id);
        $books = $user->books()->lists('books.id');
        $booksToChoose = DB::table('books')->whereNotIn('id', $books)->get();

        return view('user/choosebook', ['user' => $user, 'booksToChoose' => $booksToChoose]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function takeBook(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->books()->attach($request->book_id);

        return redirect("user/$id/books")->with('status', 'You took one more book to read!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function returnBook($user_id, $book_id)
    {
        $user = User::findOrFail($user_id);
        $user->books()->detach($book_id);

        return redirect("user/$user_id/books")->with('status', 'You returned book to library!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUsers($id)
    {
        return view('book/users', ['book' => Book::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chooseUser($id)
    {
        $book = Book::findOrFail($id);
        $users = $book->users()->lists('users.id');
        $usersToChoose = DB::table('users')->whereNotIn('id', $users)->get();

        return view('book/chooseuser', ['book' => $book, 'usersToChoose' => $usersToChoose]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignToUser(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->users()->attach($request->user_id);

        return redirect("book/$id/users")->with('status', 'You asign book to reader!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unassignUser($user_id, $book_id)
    {
        $book = Book::findOrFail($book_id);
        $book->users()->detach($user_id);

        return redirect("book/$book_id/users")->with('status', 'You unassigned user!');
    }
}
