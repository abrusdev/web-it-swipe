<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Posts;
use Carbon\Carbon;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $perPage = 10;

    public function index(Request $request): JsonResponse
    {
        $page = isset($request['page']) ? $request['page'] : 1;

        $posts = DB::table('posts')
            ->skip($this->perPage * ($page - 1))
            ->take($this->perPage)
            ->get()
            ->toArray();

        $last_page = Posts::count() % $this->perPage;
        $next_page = ($page < $last_page) ? $page + 1 : $last_page;

        return response()->json([
            'current_page' => $page,
            'data' => PostResource::collection($posts)->toArray($request),
            'next_page' => $next_page,
            'last_page' => $last_page,
        ]);
    }
}
