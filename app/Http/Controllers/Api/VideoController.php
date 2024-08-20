<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Picture\IndexRequest;
use App\Http\Requests\Api\Video\StoreRequest;
use App\Http\Requests\Api\Video\UpdateRequest;
use App\Http\Resources\Api\VideoResource;
use App\Models\Video;
use Illuminate\Http\Response;

class VideoController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $videos = Video::filter($data)->get();
        return VideoResource::collection($videos)->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $video = Video::create($data);
        return VideoResource::make($video)->resolve();
    }

    public function show(Video $video)
    {
        return VideoResource::make($video)->resolve();
    }

    public function update(UpdateRequest $request, Video $video)
    {
        $data = $request->validated();
        $video->update($data);
        return VideoResource::make($video)->resolve();
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
