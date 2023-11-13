<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Post;
use App\Http\Resources\PostResource;
class PostResource extends JsonResource
{
    public $status;
    public $message;
    /**
     * __construct
     *
     * @param mixed $status 
     * @param mixed $message 
     * @param mixed $resource
     * @return void
     */
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }
    public function toArray($request)
    {
        return [
            'success'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->resource
        ];
    }
    public function index()
    {
       $post = Post::latest()->paginate(5);
       return new PostResource(true, 'List Data Post', $post);
    }
}
