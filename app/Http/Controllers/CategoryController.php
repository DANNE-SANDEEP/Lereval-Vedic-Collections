<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($id){
        $products= Product::where('category_id',$id)->get();

        return view('category',compact('products'));
    }
}
