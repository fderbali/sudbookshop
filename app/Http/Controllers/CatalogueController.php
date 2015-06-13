<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Repositories\SectionRepositoryInterface;
use Illuminate\Http\Request;

class CatalogueController extends Controller {
    protected $sectionRepository;
    protected $nbrPerPage = 4;
    public function __construct(SectionRepositoryInterface $sectionRepository){
        $this->sectionRepository = $sectionRepository;
    }

    public function displaySections()
    {
        $sections = $this->sectionRepository->getPaginate($this->nbrPerPage);
        $links = str_replace('/?', '?', $sections->render());
        return view('catalogue/sections_cats', compact('sections', 'links'));
    }    
}
