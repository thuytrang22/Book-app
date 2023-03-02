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
class DeleteResource extends JsonResource
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
     *      example=204,
     *
     * )
     *
     * @var numeric
     */
    public $code;

    /**
     * @OA\Property(
     *      title="204",
     *      example="true",
     * )
     *
     * @var static
     */

    public $status;
    /**
     * @OA\Property(
     *      title="true",
     *      example="Delete resource Successfully"
     * )
     *
     * @var static
     */

    public $message;
    /**
     * @OA\Property(
     *
     *      title="Delete resource Successfully",
     *      example="false"
     * )
     *
     * @var string
     */
}
