<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Main\Controller;
use App\Http\Requests\Api\Tag\IndexRequest;
use App\Http\Requests\Api\Tag\StoreRequest;
use App\Http\Requests\Api\Tag\UpdateRequest;
use App\Http\Resources\Api\TagResource;
use App\Models\Tag;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $tags = Tag::filter($data)->get();
        return TagResource::collection($tags)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::create($data);
        return TagResource::make($tag)->resolve();
    }

    public function show(Tag $tag)
    {
        return TagResource::make($tag)->resolve();
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return TagResource::make($tag)->resolve();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
