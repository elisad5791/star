<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Picture\IndexRequest;
use App\Http\Requests\Api\Picture\StoreRequest;
use App\Http\Requests\Api\Picture\UpdateRequest;
use App\Http\Resources\Api\PictureResource;
use App\Models\Picture;
use Illuminate\Http\Response;

class PictureController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $pictures = Picture::filter($data)->get();
        return PictureResource::collection($pictures)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $picture = Picture::create($data);
        return PictureResource::make($picture)->resolve();
    }

    public function show(Picture $picture)
    {
        return PictureResource::make($picture)->resolve();
    }

    public function update(UpdateRequest $request, Picture $picture)
    {
        $data = $request->validated();
        $picture->update($data);
        return PictureResource::make($picture)->resolve();
    }

    public function destroy(Picture $picture)
    {
        $picture->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
