<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Repositories\BookRepository;
use Illuminate\Auth\Access\Gate;
//use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\ResponseTrait;


class BookController extends Controller
{
    use ResponseTrait;
    public $bookRepository;
    public function __construct(BookRepository $bookRepository){
        $this->bookRepository = $bookRepository;
    }
    /**
     * @OA\Get(
     *      path="/book",
     *      tags={"Books"},
     *      summary="Get list of Books",
     *      description="Returns list of Books",
     *      operationId="index",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *      @OA\Parameter(
     *         name="page",
     *         in="query",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             type="string",
     *         ),
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#/components/schemas/Book"
     *              ),
     *          )
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthResource"),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenResource"),
     *      )
     *     )
     */
    public function index(): JsonResource
    {
        abort_if(Gate::denies('book_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookResource(Book::with(['author'])->get());
    }

    /**
     * @OA\Post(
     *      path="/book",
     *      tags={"Books"},
     *      summary="Store new Book",
     *      description="Returns book data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreBookRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Book")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/BadResource"),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthResource"),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenResource"),
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorContentResource"),
     *      )
     * )
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create($request->all());

        return (new BookResource($book))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/book/{id}",
     *      tags={"Books"},
     *      summary="Get book information",
     *      description="Returns list of Books",
     *      @OA\Parameter(
     *          name="id",
     *          description="Book id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/BadResource"),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthResource"),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenResource"),
     *      ),
     *       @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundResource"),
     *      ),
     * )
     */
    public function show(Book $book)
    {
        abort_if(Gate::denies('book_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookResource($book->load(['author']));
    }

    /**
     * @OA\Put(
     *      path="/book",
     *      operationId="updateBook",
     *      tags={"Books"},
     *      summary="Update existing book",
     *      description="Returns updated book data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Book id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateBookRequest")
     *      ),
     *      @OA\Response(
     *          response=202,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(ref="#/components/schemas/BadResource"),
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthResource"),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenResource"),
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundResource"),
     *      ),
     *     @OA\Response(
     *          response=422,
     *          description="Unprocessable Content",
     *          @OA\JsonContent(ref="#/components/schemas/ErrorContentResource"),
     *      )
     * )
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->all());

        return (new ProjectResource($book))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * @OA\Delete(
     *      path="/book/{id}",
     *      operationId="deleteBook",
     *      tags={"Books"},
     *      summary="Delete existing book",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Book id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/DeleteResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthResource"),
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/ForbiddenResource"),
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthResource"),
     *      )
     * )
     */
    public function destroy(Book $book)
    {
        abort_if(Gate::denies('book_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $book->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
