<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function buatComment(Request $request, Post $post)
    {
        $data = $request->validate([
            'body' => 'required|min:8'
        ]);

        $data['user_id'] = auth()->id();

        $post->comments()->create($data);

        return redirect()->back();
    }

    public function editComment(Post $post, Comment $comment)
    {
        return view('post.edit', compact('post', 'comment'));
    }
    public function updateComment(Request $request, Post $post, Comment $comment)
    {
        $data = $request->validate([
            'body' => 'required|min:8'
        ]);
        $comment->update($data);

        return redirect()->route('show.post', $post->id);
    }

    public function hapusComment(Post $post, Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->back();
    }
}
