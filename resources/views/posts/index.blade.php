@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')

    <div class="text-center">
        <a type="button" class="btn btn-success" href="{{route('posts.create')}}">Create Post</a>
    </div>

    <table class="table mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted by</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->posted_by}}</td>
                <td>{{$post->created_at}}</td>
                <td>
                    <a href="{{route('posts.show' , $post->id)}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit' , $post->id)}}" class="btn btn-primary">Edit</a>
                    <form  style="display: inline" method="POST" action="{{route('posts.destroy' , $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
