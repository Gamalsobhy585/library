<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::select('id', 'name', 'img')
                     ->with('category', 'user')
                     ->orderBy('id', 'desc')
                     ->paginate(3);
    
        return view('books.index', compact('books'));
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }
    
public function store(Request $request)
{
   $data= $request->validate([
        'name'=>'required|string|max:20',
        'desc'=>'required|string',
        'img'=>'required|image|mimes:png,jpg,|max:1024',
        'category_id' => 'required|exists:categories,id',
    ]);
    $data['user_id']=Auth::user()->id;

    $fileName=Storage::putFile("public/books",$data['img']);
    $data['img']=$fileName;
Book::create($data);
$request->session()->flash('success_msg','Book Created Successfully');
return redirect (url('/books'));
}
public function show(Book $book)
{
    $book->load('category', 'user');
    return view('books.show', ['book' => $book]);
}

public function edit(Book $book)
{
    $categories = Category::all();
    return view('books.edit', compact('book', 'categories'));
}

public function update(Request $request, Book $book )
{
    $data = $request->validate([
        'name' => 'required|string|max:255', 
        'desc' => 'required|string',
        'img' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
        'category_id' => 'required|exists:categories,id',
    ]);
    $data['user_id']=Auth::user()->id;

    if ($request->hasFile('img')) {
        if ($book->img) {
            Storage::delete($book->img);
        }
        $filename = $request->file('img')->store('public/books');
        $data['img'] = $filename;
    }

    $book->update($data);

    return redirect(url('/books'))->with('success', 'Book updated successfully.');
}

public function destroy(Book $book)
{
    if ($book->img) {
        Storage::delete($book->img);
    }

    $book->delete();

    return redirect(url('/books'))->with('success', 'Book deleted successfully.');
}




}
