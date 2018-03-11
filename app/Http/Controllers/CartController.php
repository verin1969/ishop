<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;

class CartController extends Controller {
    public $productId = 0;
    public $rowId = '';
    
    public function index()
    {
         return view('shop.cart', ['cart' => Cart::content()]);
    }

    public function update()
    {
        if (Request::ajax()) {
            $this->productId = Request::input('productId');
            $quantity = Request::input('quantity');

            $this->rowId = '';
            Cart::search(function ($cartItem, $rowId) {
                            if ($cartItem->id == $this->productId) {
                                $this->rowId = $rowId;
                                return true; 
                            } else {
                                return false;
                            }
                         });
            Cart::update($this->rowId, $quantity);
            return $this->rowId;
 
        }
    }

    public function add()
    { 
        if (Request::ajax()) {
            $this->productId = Request::input('productId'); 
            $product = Product::findOrFail($this->productId);
            $name = $product->name;
            $price = $product->price;
            $image = $product->image;
            Cart::add(['id' => $this->productId, 'name' => $name, 'qty' => 1, 'price' => $price, 'options' => ['image' => $image]]);
            return $this->productId;
        }
         
    }

    public function delete()
    {
        if (Request::ajax()) {
            
            $this->productId =  Request::input('productId');
            $this->rowId = '';
            Cart::search(function ($cartItem, $rowId) {
                            if ($cartItem->id == $this->productId) {
                                $this->rowId = $rowId;
                                return true; 
                            } else {
                                return false;
                            }
                         });
            Cart::remove($this->rowId);
            return $this->rowId;
        }
    }
}