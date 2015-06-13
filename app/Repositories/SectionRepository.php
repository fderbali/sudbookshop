<?php

namespace App\Repositories;
use App\Models\Section;
/**
 * Data manager for sections
 *
 * @author Fahmi
 */
class SectionRepository implements SectionRepositoryInterface{
    protected $section;
    public function __construct(Section $section) {
        $this->section = $section;
    }
    
    public function getPaginate($nb) {
        return $this->section->paginate($nb);
    }
}
