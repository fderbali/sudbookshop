<?php

namespace App\Repositories;

/**
 *
 * @author Fahmi
 */
interface SectionRepositoryInterface {
    public function getPaginate($nb);
    public function getCategoriesBySection($section_id);
}
