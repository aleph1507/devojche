<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Request;
// use Request;
// use Input;
use App\Product;
use App\Category;
use App\Seller;
use Auth;
use Mail;
use Recaptcha;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'get_category']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->seller == null)
                return view('seller.create');
        }


        $categories = Category::all();
        // $first = true;
        // $skip = 3;
        // $page = Input::get('post', 1);

        // if($request->ajax()){
        //     $products = Product::orderBy('updated_at', 'desc')->paginate(3);
        //     // $first = false;
        //     // if(first)
        //     //     $products = Product::orderBy('updated_at', 'desc')->take(3)->skip(6);
        //     // else
        //     //     $products = Product::orderBy('updated_at', 'desc')->take(3)->skip(6 + $page * 3);

        //     return view('partials._products', ['products' => $products])->render();
        // }

        if($request->sid){
            $seller = Seller::find($request->sid);
            $products = Product::where('seller_id', $seller->id)->where('deleted', 0)->orderBy('updated_at', 'desc')->paginate(6);
        }
        else
            $products = Product::where('deleted', 0)->orderBy('updated_at', 'desc')->paginate(6);

        return view('welcome')->withCategories($categories)->withProducts($products);
    }

    public function get_category($id){
        // $cat = Category::find($id);
        $categories = Category::all();
        $products = Product::where('category_id', $id)->where('deleted', 0)->orderBy('updated_at', 'desc')->paginate(6);

        return view('welcome', compact('categories', 'products', 'id'));
    }

    public function get_contact(){
        return view('contact');
    }

    public function post_contact(Request $request){
        $this->validate($request, [
                'ime' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email',
                'msg' => 'required|min:5',
                'g-recaptcha-response' => 'required|recaptcha'
            ]);

        // dd($request);
        $title = "Контакт форма порака од $request->ime";
        $sender = $request->email;
        $ime = $request->ime;
        $content = $request->msg;

        // dd("title: " . $title . " sender: $sender" . " ime: $ime " . " content: $content ");

        Mail::send('email.contactmail', ['title' => $title, 'sender' => $sender, 'content' => $content], function ($message) use ($request)
        {

            $message->from($request->email, $request->ime);

            $message->to('xrristo@gmail.com');

        });
    
        Session::flash('success', 'Пораката е пратена.');
        return redirect('/');
    }
}
