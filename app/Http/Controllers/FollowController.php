<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Auth;
use App\Models\User;

class FollowController extends Controller
{
    public function store (Request $request)
    {
        $follow = Follow::where('follower_id', Auth::user()->id)->where('followed_id', $request->followed_id)->first();
        if(empty($follow)){
            Follow::create([
                'follower_id' => Auth::user()->id,
                'followed_id' => $request->followed_id
            ]);

            return redirect()->route('profile', $request->followed_id);
        }

        Follow::find($follow->id)->delete();
        return redirect()->route('profile', $request->followed_id);
    }
}
