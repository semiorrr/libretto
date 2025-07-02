<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $books = Book::with('author', 'genres', 'reviews')->paginate(5); 
    return view('books.index', compact('books'));
}


    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.create', compact('authors', 'genres'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);
    
        $book = Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
        ]);
    
        // Attach genres
        if ($request->has('genres')) {
            $book->genres()->attach($request->genres);
        }
    
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }
    

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('books.edit', compact('book', 'authors', 'genres'));
    }
    

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genres' => 'array',
            'genres.*' => 'exists:genres,id',
        ]);
    
        $book->update([
            'title' => $request->title,
            'author_id' => $request->author_id,
        ]);
    
        $book->genres()->sync($request->genres ?? []);
    
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }
    

public function show(Book $book)
{
    $book->load('author', 'genres', 'reviews');
    return view('books.show', compact('book'));
}

public function destroy(Book $book)
{
    $book->delete();
    return redirect()->route('books.index');
}
}
