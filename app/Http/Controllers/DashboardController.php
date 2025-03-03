<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(Request $request){
        $posts = $request->user()->posts() -> latest() -> paginate(6);
        return view("users.dashboard", ['posts' => $posts]);
    }

    public function usersPosts(User $user){
        $userPosts = $user->posts()-> latest() -> paginate(6);
        return view(
            "users.posts", 
            [
                "posts"=> $userPosts,
                "user"=>$user
            ]
             
        );
    }
}
