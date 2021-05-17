<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Arr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        return response()->view('admin.screens.posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
       Posts::createPost($request);
       return redirect()->route('posts.create');
    }
}
