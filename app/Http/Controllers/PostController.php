<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
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



}
