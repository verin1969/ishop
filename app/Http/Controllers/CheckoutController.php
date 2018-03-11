<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Order;
use App\OrderDetails;

class CheckoutController extends Controller {

    public function index()
    {
        if (!Cart::total()) {
            return redirect('/cart');
        }
        return  view('shop.checkout', []);
    }

    public function add()
    {
        if (!Auth::check()) {
            $temail = 'required|email|unique:users';
        } else {
            $temail = 'required|email';
        }

        $rules = [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'address' => 'required|min:5',
            'phone' => 'required|min:7',
            'email' => $temail,
        ];


        $validator = Validator::make(Request::input(), $rules);

        if ($validator->fails()) {
            return redirect("checkout")
                ->withErrors($validator);
        } else {
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
            } else {
                $user = new User;
                $user->email = Request::input('email');
                $password = str_random(10);
                $user->password = password_hash($password,PASSWORD_BCRYPT);
            }

            $user->firstname = Request::input('firstname');
            $user->lastname = Request::input('lastname');
            $user->address = Request::input('address');
            $user->phone = Request::input('phone');

            if ($user->save()) {
                $order = new Order;
                $order->users_id = $user->id;
                $order->status_id = 1;
                $order->comment = 'Телефон: <b>' . $user->phone . '</b><br>Адрес: <b>' 
                                                 . $user->address . '</b><br>Комментарий покупателя: ' 
                                                 . '<i>' . Request::input('comment') . '</i>';
 
                if ($order->save()) {
                    $cart = Cart::content();
                    foreach($cart as $product) {
                        $orderDetails = new OrderDetails;
                        $orderDetails->orders_id = $order->id;
                        $orderDetails->products_id = $product->id;
                        $orderDetails->quantity = $product->qty;
                        $orderDetails->price = $product->price;
                        $orderDetails->save();
                    }
                }

                if (!Auth::check()) {
                    Mail::send('mail.registration', 
                            ['firstname' => $user->firstname, 'login' => $user->email, 'password' => $password], 
                            function($message) {
                               $message->to(Request::input('email'))->subject("Регистрация прошла успешно");
                            });
                }


                $orderId = $order->id;

                Mail::send('mail.order', 
                           ['cart' => $cart, 'order' => $order, 'phone' => $user->phone, 'user' => $user->firstname . ' ' . $user->lastname], 
                            function($message) use ($orderId) {
                                     $message->to(Request::input('email'))->subject("Ваша заявка № {$orderId} принята");
                                     });
                Cart::destroy();
                return redirect("/home");
            }
        }
    }

}