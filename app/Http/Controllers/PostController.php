<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function getPosts ()
    {
        $posts = Post::all();
        // $posts = User::with('roles')->get();
        return response()->json($posts, 200);
    }

    public function createPosts (Request $request)
    {
        $post = new Post();
        $post->name = $request->get('name');
        $post->description = $request->get('description');
        $post->save();
        return response()->json($post, 200);
    }

    public function editPosts ()
    {
        
    }

    public function deletePosts ($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json($post, 200);
    }
}
