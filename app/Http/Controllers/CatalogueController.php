<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Repositories\SectionRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\BookRepositoryInterface;
use Illuminate\Http\Request;

class CatalogueController extends Controller {
    protected $sectionRepository;
    protected $categoryRepository;
    protected $bookRepository;
    protected $nbrPerPage = 4;
    public function __construct(SectionRepositoryInterface $sectionRepository, 
                                CategoryRepositoryInterface $categoryRepository,
                                BookRepositoryInterface $bookRepository){
        $this->sectionRepository = $sectionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->bookRepository = $bookRepository;
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
    public function displayBooks($category_id) {
        $categoryname = $this->categoryRepository->getCategoryName($category_id);
        $books = $this->categoryRepository->getBooksByCategory($category_id);
        return view('catalogue/books', compact('books','categoryname'));
    }   
    
    public function displayBook($book_id) {
        $book = $this->bookRepository->getBookById($book_id);
        return view('catalogue/book')->withBook($book);
    }
}
