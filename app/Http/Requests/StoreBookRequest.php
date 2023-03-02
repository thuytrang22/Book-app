<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Store Book request",
 *      description="Store Book request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class StoreBookRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new book",
     *      example="A nice book"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the new book",
     *      example="This is new book's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="author_id",
     *      description="Author's id of the new book",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $author_id;
}
