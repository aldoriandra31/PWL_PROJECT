<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'posts' => Post::with('user')->withCount('comments')->latest('id')->get(),
            // 'uuu' => Auth::user()->user_role->role->role,
        ]);
    }

    public function buatPost(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|min:8'
        ]);
        $request->user()->posts()->create($data);
        return redirect()->back();
    }

    public function showPost(Post $post)
    {
        return view('post.show', [
            'post' => $post->load([
                'comments' => function ($query) {
                    $query->orderBy('id', 'desc');
                },
                'comments.user',
                'user'
            ]),
        ]);
    }

    public function editPost(Post $post)
    {
        $this->authorize('update', $post);
        return view('post.editPost', compact('post'));
    }

    public function updatePost(Request $request, Post $post)
    {
        $data = $request->validate([
            'body' => 'required|min:8'
        ]);

        $post->update($data);

        return redirect()->route('dashboard');
    }
    public function hapusPost(Request $request, Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->back();
    }
}
