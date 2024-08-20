<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Author\IndexRequest;
use App\Http\Resources\Api\AuthorResource;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $authors = Author::filter($data)->get();
        return AuthorResource::collection($authors)->resolve();
    }
}
