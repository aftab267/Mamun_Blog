<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $postObj= new Post();

        $posts=$postObj->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->orderby('posts.id','desc')
        ->get();

        // dd($posts);
        return view('user.index',compact('posts'));
    }
}
