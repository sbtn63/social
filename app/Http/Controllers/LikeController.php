<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function store (Request $request)
    {
        $like = Like::where('user_id', Auth::user()->id)->where('post_id', $request->post_id)->first();
        if(empty($like)){
            Like::create([
                'user_id' => Auth::user()->id,
                'post_id' => $request->post_id
            ]);

            return redirect()->route('post.index');
        }

        Like::find($like->id)->delete();
        return redirect()->route('post.index');
    }
}
