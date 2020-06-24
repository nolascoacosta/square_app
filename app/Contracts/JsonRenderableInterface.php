<?php


namespace Square\Contracts;

use Illuminate\Http\JsonResponse;

/**
 * Transform data into a JSON response.
 *
 * @package Square\Contracts
 */
interface JsonRenderableInterface
{
    /**
     * Render an exception into a response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(): JsonResponse;
}
