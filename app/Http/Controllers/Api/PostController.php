<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Jobs\AutoImportPost;
use App\Jobs\ProcessPodcast;
use App\Jobs\TrackHitJob;
use App\Models\Post;
use App\Services\ApiMessageBuilder;
use App\Services\AutoImportPostService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends ApiController
{
    public function __construct(ResponseFactory $responseFactory, ApiMessageBuilder $messageBuilder)
    {
        parent::__construct($responseFactory, $messageBuilder);
        $this->middleware('auth:api', ['except' => ['show','getAllPost']]);
    }

    /**
     * The list of relationships a model can load.
     *
     * @var array
     */
    protected const LOADABLE = [
        'user'
    ];

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return PostResource|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {


        $posts = auth()->user()->posts()->paginate();

        return PostResource::collection($posts);
    }

    /**
     * @param Request $request
     */
    public function getAllPost(Request $request)
    {
        if ($request->has('published_date'))
        {
            $posts = Post::whereDate('publication_date', Carbon::parse($request->get('published_date'))->format('Y-m-d'))->paginate();;
        }else{
            $posts = Post::paginate();
        }
        return PostResource::collection($posts);
    }

    /**
     ** Adds a post to the specified user.
     *
     * @param  StorePostRequest $request
     * @return PostResource |\Illuminate\Http\JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        $request = $this->mergeFields($request, [
            'slug' => Str::slug($request->get('title'))
        ]);

        $post = Auth::user()->posts()->create($request->all());
        return new PostResource($post);
    }



    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @param \Illuminate\Http\Request $request
     *
     * @return PostResource|\Illuminate\Http\JsonResponse
     */
    public function show(Post $post, Request $request)
    {
        return (is_null($request->get('include')))
            ? new PostResource($post)
            : new PostResource($this->loadRelationships($post, $request->get('include')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePostRequest $request
     * @param  Post  $post
     * @return PostResource
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if (!Auth::user()->can('update', $post))
        {
            return $this->messageBuilder->forbidden();
        }
        $post->update($request->all());
        return new PostResource($post);
    }


    /**
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        if (!Auth::user()->can('delete', $post))
        {
            return $this->messageBuilder->forbidden();
        }

        $post->delete();
        return $this->responseFactory->noContent();
    }

    /* This method allow merge array into the request object*/
    /**
     * @param Request $request
     * @param $fields
     * @return Request
     */
    private function mergeFields(Request $request, $fields){
        return $request->merge($fields);
    }

}
