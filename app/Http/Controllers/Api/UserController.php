<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Api\User\IndexRequest;
use App\Http\Resources\Api\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $users = User::filter($data)->get();
        return UserResource::collection($users)->resolve();
    }
}
