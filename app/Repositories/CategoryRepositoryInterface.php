<?php

namespace App\Repositories;

/**
 *
 * @author Fahmi
 */
interface CategoryRepositoryInterface {
    public function getBooksByCategory($category_id);
}
