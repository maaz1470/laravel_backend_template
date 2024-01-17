<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(){
        $categories = Category::all();
        return view('backend.categories.all',[
            'categories'    => $categories
        ]);
    }

    public function add(){
        return view('backend.categories.add');
    }
}
