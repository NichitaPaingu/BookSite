<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Article;


class StaticController extends Controller
{
    
    public function index(){
        $articles= Article::all();
        return view('static.index')->with('articles',$articles);
    }

    public function about(){
        return view('static.about');
    }
}
