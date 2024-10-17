<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('comments', compact('comments'));
    }

    public function save(Request $request)
    {
        $result = Comment::create([
            'firstName' => $request->firstName, 
            'lastName' => $request->lastName, 
            'phone' => $request->phone, 
            'email' => $request->email, 
            'subject' => $request->subject, 
            'message' => $request->message, 
        ]);

        if($result) {
            return response()->json(['message' => 'Your feedback was sent successfully!'], 200);
        }else {
            return response()->json(['message' => 'There was a problem in delivering your feedback.'], 500);

        }
    }

    public function delete($id) {
        Comment::find($id)->delete();

        return back()->with('success', 'The record has been delete');
    }
}
