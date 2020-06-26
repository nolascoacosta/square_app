<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ApiMessageBuilder;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

abstract class ApiController extends Controller
{
    //use AuthorizesRequests;
    /**
     * The list of relationships a model can load.
     *
     * @var array
     */
    protected const LOADABLE = [];
    /**
     * A helper to create Response objects on the fly.
     *
     * @var \Illuminate\Routing\ResponseFactory
     */
    protected $responseFactory;

    /**
     * A helper to create error messages.
     *
     * @var ApiMessageBuilder
     */
    protected $messageBuilder;

    public function __construct(ResponseFactory $responseFactory, ApiMessageBuilder $messageBuilder)
    {
        auth()->setDefaultDriver('api');

        $this->responseFactory = $responseFactory;
        $this->messageBuilder = $messageBuilder;
    }

    /**
     * Loads relationships dynamically for a given model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array|string|null                   $relationships
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    protected function loadRelationships($model, $relationships = [])
    {
        if (is_string($relationships)) {
            $relationships = explode(',', $relationships);
        }

        if ($model instanceof Model || $model instanceof Collection || $model instanceof Paginator) {
            foreach ($relationships as $relationship) {
                $model = !in_array($relationship, static::LOADABLE) ?: $model->load($relationship);
            }
        }

        if ($model instanceof Builder || $model instanceof Relation) {
            foreach ($relationships as $relationship) {
                $model = !in_array($relationship, static::LOADABLE) ?: $model->with($relationship);
            }
        }

        return $model;
    }

}
