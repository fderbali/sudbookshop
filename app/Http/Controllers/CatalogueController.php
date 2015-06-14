<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Repositories\SectionRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CatalogueController extends Controller {
    protected $sectionRepository;
    protected $categoryRepository;
    protected $nbrPerPage = 4;
    public function __construct(SectionRepositoryInterface $sectionRepository, 
                                CategoryRepositoryInterface $categoryRepository){
        $this->sectionRepository = $sectionRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function displaySections(){
        $sections = $this->sectionRepository->getPaginate($this->nbrPerPage);
        $links = str_replace('/?', '?', $sections->render());
        return view('catalogue/sections_cats', compact('sections', 'links'));
    }
    
    public function displayCategories($section_id){
        $categories = $this->sectionRepository->getCategoriesBySection($section_id);
        echo $categories;
    }
}
