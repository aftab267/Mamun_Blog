<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();

        $objpost= new Post();
        $posts=Post::all();
        return view ('admin.post',compact('categories','posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'title'=>'required',
        'category_id'=> 'required',
        'description'=>'required',
       ]);

        $data = [
        'title'=>$request->title,
        'category_id'=> $request->category_id,
        'description'=>$request->description,
        'status'=>$request->status,
       ];

       if ($request->hasFile('thumbnail')) {
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('/images/post_thumbnails'), $filename);
        $data['thumbnail'] = $filename;

        // // Resize image
        // $thumbnail = Image::make($file);
        // $thumbnail->resize(600, 360)->save(public_path('post_thumbnails/' , $filename));

    }
        Post::create($data);
        // $notify = ['message' => 'Post created successfully!', 'alert-type' => 'success'];
        return redirect()->back()->with('success','Post Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
