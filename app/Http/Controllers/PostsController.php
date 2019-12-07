<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function create(){
		return view('posts.create');
	}
	public function store(){

        $data= request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagepath= request('image')->store('uploads', 'uploads');
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagepath,
        ]);


	    return redirect('/profile/'.auth()->user()->id);
    }
    public function show($post){
        $post=\App\Post::findOrFail($post);
        return view('posts.show',['post' => $post]);
    }
}
