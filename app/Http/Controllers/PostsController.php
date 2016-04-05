<?php

namespace App\Http\Controllers;
use Gate;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show($id)
    {
    	// auth()->logout();
    	auth()->loginUsingId(2); // tmp
    	$post = Post::findOrFail($id);

    	if (Gate::denies('show-post', $post)) {
    		abort(403, 'Sorry, I am Bruce.');
    	}

    	return $post->title;
    }
}
