<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        foreach($posts as $post){
            $liked = $post->likes()->where('user_id', Auth::user()->id)->exists();
            $post->liked = $liked;
        }

        return view('post.posts', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:3|max:255',
        ]);

        $post = new Post;
        $post->content = $request->content;

        if(!empty($request->image)){
            $fileName = time(). '.' . $request->image->extension();
            $request->image->move(public_path('images'), $fileName);
            $post->image = $fileName;
        }

        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect()->route('post.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
