<?php

namespace App\Http\Controllers;

use App\Book;
use App\Mail\BookOrdered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //list all books from database, and added search function
    public function index(Request $request)
    {
        $search_query = $request->input('search_query');
        $books = Book::search($search_query)->get();
        return view('books.index', compact('books','search_query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //storing books to database
    public function store(Request $request)
    {
        Book::create($this->validateBook());
        return redirect(route('book_list'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
    //In this function when users reach show view for particular book,
    //pressing button to rent a book they get notification by email and session
    public function rent(Request $request, Book $book) {

        new Book();
        $userId = Auth::id();
        $book->orderBook($userId);

        Mail::to('email@email.com')->send(new BookOrdered());

        $request->session()->flash(
            'message',
            'Your order has placed. Librarian will soon notify you.'
        );

        return back();
    }

    //function for validation new book when adding.s
    public function validateBook() {
        return request()->validate([
            'title' => 'required',
            'author_name' => 'required',
            'category' => 'required',
            'publisher' => 'required',
            'status' => 'required'
        ]);
    }

}
