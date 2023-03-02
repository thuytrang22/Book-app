<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="BookResource",
 *     description="Book resource",
 *     @OA\Xml(
 *         name="ErrorResource"
 *     )
 * )
 */

class BadResource extends JsonResource
{
    /**
     * @OA\Property(
     *     title="error",
     *     description="error",
     *     example=null
     * )
     *
     * @var static
     */

    private $data;

    /**
     * @OA\Property(
     *      title="null",
     *      example=400,
     *
     * )
     *
     * @var numeric
     */
    public $code;

    /**
     * @OA\Property(
     *      title="401",
     *      example="false",
     * )
     *
     * @var static
     */

    public $status;
    /**
     * @OA\Property(
     *      title="false",
     *      example="Bad qequest"
     * )
     *
     * @var static
     */

    public $message;
    /**
     * @OA\Property(
     *      title="Bad qequest",
     *      example="false"
     * )
     *
     * @var string
     */
}

