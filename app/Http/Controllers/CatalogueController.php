<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Section;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Catalogue extends Controller {
    public function displaySections(){
        $section = new Section;
    }
}
