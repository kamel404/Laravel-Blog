<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
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
        // Select * from posts where id = $postId
//        $singlePostFromDB = Post::findOrFail($postId); // Look At Routes, you can check that show method takes PostID
        // FindOrFail means , if you did not find the post of the id searched, return error not found 404 page
        return view('posts.show', ['post' => $post]);
        // Here we used route model binding to write less code, so we declare an object of type Post class in the params then use it and it is already handling page NOt found
    }


    public function create(){

        // Select * from posts;
        $users = User::all();

        return view('posts.create', ['users' => $users]);

    }


    public function store(){

//        1- get the user data

        $title = request()-> title;
        $description = request()-> description;
        $postCreator = request() -> post_creator;

//        2- store the submitted data in database

        Post::create([
            'title' => $title,
            'description' => $description,
        ]);


//        3- redirect to posts.index
        return to_route('posts.index') ;
    }


    public function edit(Post $post){
        $users = User::all();

        return view('posts.edit' , ['users' => $users , 'post' => $post]) ;
    }


    public function update($postId){

//        1- get the user data

        $title = \request()-> title;
        $description = \request()-> description;
        $postCreator = \request() -> post_creator;


//        2- update the user data in database
        $singlepostFromDB = Post::find($postId);

        $singlepostFromDB -> update([
            'title' => $title,
            'description' => $description,
        ]);

//        3- redirect to posts.show
        return to_route('posts.show', $postId) ;
    }


    public function destroy($postId){

//        1- delete the post from database
        $postToDelete = Post::find($postId);
        $postToDelete -> delete();

//        2- redirect to posts.index
        return to_route('posts.index');

    }

}
