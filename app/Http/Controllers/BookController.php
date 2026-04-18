<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //  ADD BOOK
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'published_date' => 'required|date'
        ]);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'cover_image' => $request->cover_image,
            'price' => $request->price,
            'published_date' => $request->published_date
        ]);

        return response()->json([
            'message' => 'Book created successfully',
            'data' => $book
        ]);
    }
// GET book
   public function index(Request $request)
{
    try {
        $search = $request->query('search');

        $booksQuery = Book::query()
            ->where('_deleted', 0);

        //  SEARCH
        if (!empty($search)) {
            $booksQuery->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }

        //  PAGINATION
        $books = $booksQuery->orderBy('id', 'desc')->paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Books fetched successfully',
            'data' => $books
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
}
    //  GET SINGLE BOOK
    public function show($id)
    {
        $book = Book::where('_deleted', 0)->find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book);
    }

    //  UPDATE BOOK
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book || $book->_deleted == 1) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->update($request->all());

        return response()->json([
            'message' => 'Book updated successfully',
            'data' => $book
        ]);
    }

    //  SOFT DELETE
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->_deleted = 1;
        $book->save();

        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
}