<?php

namespace App\Http\Controllers;

use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::limit(4)->orderBy('id', 'DESC')->get();
        return view('bookstore.book.index',['books'=>$books]);
    }
}
