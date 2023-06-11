<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        // $authors = Book::find($id)->relAuthors();
        $books = Book::all()->sortBy('title');
        
         return view('index', compact('books'));
    }

    public function create(){
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function show($id){
            
           $book = Book::find($id);
        return view('books.details', compact('book'));
    }

    public function edit($id){
        $books = Book::find($id);
        $authors = Author::all();

        return view('books.create', compact('books', 'authors'));
    }

    public function store(Request $request)
    {
            Book::create([
            'title' => $request->title,
            'id_author' => $request->author,
            'description' => $request->description,
            'pages' => $request->pages,
            'genre' => $request->genre,
            'price' => $request->price,
        ]);
        
            return redirect()->route('book.index');
    }

    public function update(Request $request, string $id)
    {
            Book::where(['id' => $id])->update([
            'title' => $request->title,
            'id_author' => $request->author,
            'description' => $request->description,
            'pages' => $request->pages,
            'genre' => $request->genre,
            'price' => $request->price,
        ]);
        return redirect()->route('book.index');
    }

    public function destroy($id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index');
    }

    public function getTitles(Request $request){
        {
            $term = $request->input('term');
        
            $titles = Book::where('name', 'LIKE', '%' . $term . '%')->pluck('name');
        
            return response()->json($titles);
        }
    }
}