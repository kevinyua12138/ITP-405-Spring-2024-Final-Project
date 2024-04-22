<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, $songId)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->song_id = $songId;
        $comment->user_id = Auth::id();
        $comment->body = $request->body;
        $comment->save();

        return back()->with('success', 'Comment added successfully.');
    }

    public function edit(Request $request, $songId)
    {
        $commentId = $request->input('comment_id');
        $comment = Comment::findOrFail($commentId);

        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', 'Unauthorized access.');
        }

        return back()->with('commentToEdit', $comment);
    }

    public function delete(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', 'Unauthorized access.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
