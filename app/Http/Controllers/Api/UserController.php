<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return response()->json(['data' => $post], 200);
    }

    public function post(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|unique:posts',
            'url' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'error' => $validate->errors()
            ], 406);
        }
        $post = new Post();
        $post->title = $request->name;
        if ($post->save()) {
            return response()->json(['message' => "data is saved"], 201);
        } else {
            return response()->json(['message' => "something went wrong"], 403);
        }
    }
}
