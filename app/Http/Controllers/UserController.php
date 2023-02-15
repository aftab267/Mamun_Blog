<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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

        $categories=Category::all();

        // dd($posts);
        return view('user.index',compact('posts','categories'));
    }
    public function single_post_view($id){

        $postobj= new Post();

        $post=$postobj->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.id',$id)
        ->first();

        // dd($posts);
        return view('user.single_post_view',compact('post'));
    }
     public function filter_by_category($id){
        $postObj= new Post();

        $posts=$postObj->join('categories','categories.id','=','posts.category_id')
        ->select('posts.*','categories.name as category_name')
        ->where('posts.status',1)
        ->where('posts.category_id',$id)
        ->orderby('posts.id','desc')
        ->get();

        // dd($posts);
        return view('user.filter_by_category',compact('posts'));

     }
}
