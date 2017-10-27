<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
    	$posts=Post::free()->get();
    	return view('blog.index',compact('posts'));
    }

    public function single(Post $post)
    {
    	return view('blog.single',compact('post'));
    }


}
