<?php

namespace App\Exceptions;

use App\LoggerFormatters\PostFormatter;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Throwable;

class PostException extends Exception
{
    const TYPE_MESSAGES = [
        'post-create' => 'Post already exists',
        'post-update' => 'Post don\'t exist. Post was created'
    ];

    private $post;
    private $type;

    public function __construct($post, string $type, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $this->post = $post;
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }

    public function report(): void
    {
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/' . $this->type . '.log')
        ])->info($this->message, $this->post);
    }

    public function render(Request $request): Response
    {
        return response(['message' => $this->message], Response::HTTP_OK);
    }

    public static function checkIfExists(Post $post, string $type)
    {
        $condition = $type == 'post-create' ? !$post->wasRecentlyCreated : $post->wasRecentlyCreated;
        if ($condition) {
            throw new self($post->getAttributes(), $type, self::TYPE_MESSAGES[$type]);
        }
    }
}
