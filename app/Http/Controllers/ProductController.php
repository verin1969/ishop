<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    public function index($category_id) 
    {
        $products = Product::where('categories_id', $category_id)->get();
        $text = Category::find($category_id);
	return view('pages.products', ['products' => $products, 'text' => $text->description]);
    }
    
    public function search() 
    {
        $text = Request::input('text');
        $products = Product::whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)",array($text))->get();
	return view('pages.products', ['products' => $products, 'text' => "Результаты поиска ".$text]);
    }

    public function show($id) 
    {
        $product = Product::find($id);
        if ($product->stock == '0') {
            $product->onstock = "Нет на складе";
        } else {
            $product->onstock = "На складе";
        }
	return view('pages.product', ['product' => $product]);
    }
}