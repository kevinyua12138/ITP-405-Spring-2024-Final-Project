<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    // No get only store post method where it checks if the comment is not null andd is a string
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

    // Edit Comments View
    public function edit(Request $request, $commentId)
    {
        $comment = Comment::with(['song'])->find($commentId);
        return view('profile/comment', ['comment' => $comment]);
    }

    // Storing the editing the user made
    public function update(Request $request, $commentId)
    {
        $request->validate([
            'body' => 'required|string',
        ]);
    
        $comment = Comment::find($commentId);
    
        $comment->body = $request->body;
        $comment->save();

        $songId = $comment->song_id;
    
        return redirect()->route('song.show', ['songId' => $songId])->with('success', 'Comment updated successfully.');
    }

    // delete the user's comment
    public function delete(Request $request, $commentId)
    {
        $comment = Comment::find($commentId);

        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', 'Unauthorized access.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully.');
    }
}
