<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        return view('index');
    }
    public function about(){
        return view('about-us');
    }
    public function contact(){
        return view('contact');
    }

    /* ------------ Draft Template Pages Discards -------------- */
    public function blog(){
        return view('templatePagesDiscards/blog');
    }
    public function courseDetails(){
        return view('templatePagesDiscards/course-details');
    }
    public function courses(){
        return view('templatePagesDiscards/courses');
    }
    public function elements(){
        return view('templatePagesDiscards/elements');
    }
    public function singleBlog(){
        return view('templatePagesDiscards/single-blog');
    }
    /* --------------------------- */
}
