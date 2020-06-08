<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller{
    protected $product;

    public function __construct(){
        $this->product = new Product();
    }

    public function index(){
        $product = new Product();

        $products = $product->limit(8)->orderBy('id', 'desc')->get();

        return view('welcome', compact('products'));
    }

    public function single($slug){
        $product = $this->product->whereSlug($slug)->first();

        return view('single', compact('product'));
    }
}
