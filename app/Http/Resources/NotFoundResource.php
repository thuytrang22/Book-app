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
class NotFoundResource extends JsonResource
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
     *      example=404,
     *
     * )
     *
     * @var numeric
     */
    public $code;

    /**
     * @OA\Property(
     *      title="401",
     *      example="true",
     * )
     *
     * @var static
     */

    public $status;
    /**
     * @OA\Property(
     *      title="false",
     *      example="Resource not found"
     * )
     *
     * @var static
     */

    public $message;
    /**
     * @OA\Property(
     *
     *      title="Unauthorized",
     *      example="false"
     * )
     *
     * @var string
     */
}
