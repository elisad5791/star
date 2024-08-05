<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsModeratorMiddleware
{
    const MODERATOR_ROLES = [
        'posts' => 'PostModerator',
        'pictures' => 'PictureModerator',
        'videos' => 'VideoModerator',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        $uri = $request->route()->uri;
        $type = explode('/', $uri)[1];
        $role = self::MODERATOR_ROLES[$type];
        if (auth()->user()->roles->contains('title', $role)) {
            return $next($request);
        }

        return response(['message' => 'Forbidden'], 403);
    }
}
