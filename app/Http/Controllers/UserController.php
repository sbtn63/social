<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use Auth;

class UserController extends Controller
{

    public function editCover()
    {
        return view('user.cover');
    }

    public function updateCover(Request $request)
    {
        $user = Auth::user();
        $fileName = $user->username.time(). '.' . $request->image->extension();
        $request->image->move(public_path('cover'), $fileName);
        $user->cover_url = $fileName;
        $user->save();

        return redirect()->route('profile', $user->id);
    }

    public function profile(User $user) {
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        //Traer bool si el usuario auth sigue a el usuario del perfil
        $following = Follow::where('follower_id', Auth::user()->id)->where('followed_id', $user->id)->exists();

        //Seguidores del usuario
        $followers = $user->followers();
        $my_likes = 0;
        
        foreach($posts as $post){
            $liked = $post->likes()->where('user_id', Auth::user()->id)->exists();
            $my_likes += $post->likes()->count();
            $post->liked = $liked;
        }
        return view('user.profile', compact('user', 'posts', 'my_likes', 'following', 'followers'));
    }
}
