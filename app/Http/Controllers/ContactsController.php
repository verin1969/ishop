<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller {

    public function contacts()
    {
      return view('pages.contacts', []);
    }
    public function about()
    {
      return view('pages.about', []);
    }
    public function payment()
    {
      return view('pages.payment', []);
    }
   public function service()
    {
      return view('pages.service', []);
    }

    public function send()
    {

        $rules = array(
            'fullname' => 'required',
            'email' => 'required|email',
            'theme' => 'required|min:5',
            'message' => 'required|min:10'
        );

        $validator = Validator::make(Request::input(), $rules);

        if ($validator->fails()) {
            return redirect("/contacts")->withErrors($validator);
        } else {
            Mail::send('mail.send', 
                      ['item' => Request::input()], 
                        function($message) {
                             $message->to(config('setting.email'))->subject("Новое сообщение с сайта " . config('setting.title'));
                        });
        }

      return redirect("/home");
    }
}
