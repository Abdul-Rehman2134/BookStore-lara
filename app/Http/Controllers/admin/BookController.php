<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private $validationRules = [
        'name' => 'required|string|min:5|max:20',
        'image' => 'required',
        'pages' => 'required',
        'price' => 'required',
        'description' => 'required|max:250'
    ];

    public function index()
    {
        $books = Book::Latest()->paginate(10);
        $authors = Author::get();
        $categories = Category::get();
        return view('admin.index', ['books' => $books, 'authors' => $authors, 'categories' => $categories]);
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
        $request->validate($this->validationRules);

        $book = new Book();
        $book->name = $request->name;
        $book->image = $request->image;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->number_of_pages = $request->pages;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->save();
        return back();
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
        $request->validate($this->validationRules);

        $book = Book::findOrFail($request->id);
        $book->name = $request->name;
        $book->image = $request->image;
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->number_of_pages = $request->pages;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();
        return back();
    }
}
