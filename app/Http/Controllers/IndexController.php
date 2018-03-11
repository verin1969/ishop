<?php

namespace App\Http\Controllers;

use App\Product;
class IndexController extends Controller
{
    public function index() 
    {
        $products      = Product::take(5)->where([['active', '=', '1'], ['stock','<>' ,'0']])->orderBy('created_at', 'desc')->get();
        $featured      = Product::take(4)->where([['active', '=', '1'], ['stock','<>' ,'0']])->orderBy('created_at', 'asc')->get();
        $new_arrivals  = Product::take(4)->where([['active', '=', '1'], ['stock','<>' ,'0']])->orderBy('created_at', 'desc')->get();
        $top_sales     = Product::take(4)->where([['active', '=', '1'], ['stock','<>' ,'0']])->orderBy('created_at', 'desc')->get();
	return view('pages.index', ['products'      => $products,
                                    'featured'      => $featured,
                                    'new_arrivals'  => $new_arrivals,
                                    'top_sales'     => $top_sales]);
    }
}