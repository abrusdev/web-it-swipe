<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        return response()->view('admin.screens.posts.create');
    }

    public function store(Request $request)
    {
        $image = Posts::storeImage($request->file('image'));
        $category_id = $request->get('slug');
    }
}
