<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="BookResource",
 *     description="Book resource",
 *     @OA\Xml(
 *         name="BookResource"
 *     )
 * )
 */
class BookResource extends JsonResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Models\Book[]
     */
    private $data;
}
