<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        // Select * from posts
        $postsFromDB = Post::all(); // Collection objects
        return view('posts.index' , ['posts' => $postsFromDB]);

    }

    public function show(Post $post) //Type hinting
    {
//        dd($post);
        // Select * from posts where id = $postId
//        $singlePostFromDB = Post::findOrFail($postId); // Look At Routes, you can check that show method takes PostID
        // FindOrFail means , if you did not find the post of the id searched, return error not found 404 page
        return view('posts.show', ['post' => $post]);
        // Here we used route model binding to write less code, so we declare an object of type Post class in the params then use it and it is already handling page NOt found
    }

    public function create(){

        return view('posts.create');

    }

    public function store(){

//        1- get the user data

//        $request = \request();
//        dd($request->title , $request-> all());

        //First Way
        $data = \request()->all();

        //Second Way
        $title = \request()-> title;
        $description = \request()-> description;
        $postCreator = \request() -> post_creator;

//        dd($data , $title , $description , $postCreator);


//        2- store the user data in database
        // will be done Later!!

//        3- redirect to posts.index
        return to_route('posts.index') ;
    }


    public function edit(){
        return view('posts.edit') ;
    }

    public function update(){


//        1- get the user data

        $title = \request()-> title;
        $description = \request()-> description;
        $postCreator = \request() -> post_creator;

//        dd($data , $title , $description , $postCreator);


//        2- update the user data in database
        // will be done Later!!

//        3- redirect to posts.show
        return to_route('posts.show', 1) ;
    }

    public function destroy(){

//        1- delete the post from database
//        will be discussed later!!

//        2- redirect to posts.index
        return to_route('posts.index');

    }

}
