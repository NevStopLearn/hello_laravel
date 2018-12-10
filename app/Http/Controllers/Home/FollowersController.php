<?php

namespace App\Http\Controllers\Home;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        #用户不能对自己进行关注和取关
        if(Auth::user()->id === $user->id){
            return redirect('/');
        }
        #判断当前用户已关注要进行操作的用户
        if(!Auth::user()->isFollowing($user->id)){
            Auth::user()->follow($user->id);
        }

        return redirect()->route('user.show',$user->id);
    }

    public function destroy(User $user)
    {
        if(Auth::user()->id === $user->id){
            return redirect('/');
        }

        if(Auth::user()->isFollowing($user->id)){
            Auth::user()->unfollow($user->id);
        }

        return redirect()->route('user.show',$user->id);
    }
}
