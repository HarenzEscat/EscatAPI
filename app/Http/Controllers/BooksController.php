<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    //this is use to get all the books that you want to get or what you need.
    public function Books(){
        $book = Books::all();
        return response($book);
    }

    public function Book($id){
        $book = Books::find($id);
        return response($book);
    }

    public function post(Request $request)
    {
        $book=new Books();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;

        $book->save();
        return response([
            "message"=>"Books added in database!!"
        ]);
    }
    //to update books
    public function update(Request $request)
    {
        $book = Books::findorfail($request->id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->published_at = $request->published_at;

        $book->update();
        return response([
            "message"=>"Updated Succesfully"
        ]);
    }
        //to destroy/delete
    public function delete($id){
        $user = Books::find($id);
        if ($user == null){
            return response([
                "message"=>"Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Deleted succesfully!"
            ],200);
        }
    }
}
