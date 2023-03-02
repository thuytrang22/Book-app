<?php

namespace App\Repositories;

use App\Interfaces\CrudInterface;
use App\Models\Book;
use Illuminate\Contracts\Pagination\Paginator;

class BookRepository implements CrudInterface
{
    public function getAll(int $perPage = 10): Paginator
    {
        return Book::paginate($perPage);
    }

    public function getById(int $id): Book
    {
        return Book::find($id);
    }
}
