<?php

namespace App\Repositories;
use App\Models\Category;
/**
 * Data manager for sections
 *
 * @author Fahmi
 */
class CategoryRepository implements CategoryRepositoryInterface{
    protected $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }
    
    public function getBooksByCategory($category_id) {
        return $this->category->findOrFail($category_id)->books;
    }
}
