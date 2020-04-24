<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=> [ 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post_data = Post::orderBy('created_at','desc')->get();
        return view('posts.index')->with('post_data',$post_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required',
                'cover_image' => 'image|nullable|max:1999',
            ]
        );
        if($request->hasFile('cover_image'))
        {
            $filenamewithext = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
            //GET just ext
            $extansion = $request->file('cover_image')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time().'.'.$extansion;
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenametostore);
        }
        else{
            $filenametostore='noimage.jpg';
        }
        $post_obj = new Post;
        $post_obj->name = $request->input('name');
        $post_obj->email = $request->input('email');
        $post_obj->user_id = auth()->user()->id;
        $post_obj->cover_image = $filenametostore;
        $post_obj->save();
        return redirect('/posts')->with('success','User added successfully');
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

        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
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
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id)
            return redirect('/posts')->with('error','Unauthorized Page');    
        return view('posts.edit')->with('post',$post);

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
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required',
            ]
        );
        $post_obj = Post::find($id);
        $post_obj->name = $request->input('name');
        $post_obj->email = $request->input('email');
        $post_obj->save();
        return redirect('/posts')->with('success','User updated successfully');

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
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id)
            return redirect('/posts')->with('error','Unauthorized Page');
        $post->delete();
        return redirect('/posts')->with('success','User deleted successfully');
    }
}
