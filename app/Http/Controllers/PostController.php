<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        // select * from posts
        // id, title, created_at, description, updated at

        $allPosts = [
            ['id' => 1 , 'title' => 'PHP' , 'posted_by' => 'Kamel' , 'created_at' => '2024-07-07'],
            ['id' => 2 , 'title' => 'Java' , 'posted_by' => 'Mahdi' , 'created_at' => '2024-03-02'],
            ['id' => 3 , 'title' => 'Laravel' , 'posted_by' => 'Ahmad' , 'created_at' => '2024-07-03'],
            ['id' => 4 , 'title' => 'Python' , 'posted_by' => 'Ali' , 'created_at' => '2024-07-07'],
        ];
        return view('posts.index' , ['posts' => $allPosts]);
    }

    public function show($postId){
        $singlePost = [
            'id' => 1 , 'title' => 'PHP' , 'description' => 'PHP is cool language' , 'posted_by' => 'Kamel' , 'email' => 'kamelfaour@gmail.com',  'created_at' => '2024-07-07',
        ];
        return view('posts.show', ['post' => $singlePost]);
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
