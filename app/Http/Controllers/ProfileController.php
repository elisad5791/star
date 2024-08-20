<?php

namespace App\Http\Controllers;

use App\Http\Resources\Main\PostResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        $posts = PostResource::collection(auth()->user()->posts)->resolve();
        return inertia('Profile', compact('posts'));
    }
}
