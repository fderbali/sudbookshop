<?php

namespace App\Repositories;
use App\Models\Book;
/**
 * Data manager for sections
 *
 * @author Fahmi
 */
class BookRepository implements BookRepositoryInterface{
    protected $book;
    public function __construct(Book $book) {
        $this->book = $book;
    }
    
    public function getBookById($book_id) {
        return $this->book->findOrFail($book_id);
    }

}
