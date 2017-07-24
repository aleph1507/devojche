<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\Product;
use App\User;
use App\Category;
use Auth;
use Image;
use File;
use Session;

class AdminController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
		$this->middleware('isadmin');
	}

    public function index(){
    	$products = Product::where('deleted', 0)->orderBy('updated_at', 'desc')->paginate(5);
        $dp = Product::where('deleted', 1)->orderBy('updated_at', 'desc')->paginate(5);
    	$sellers = Seller::orderBy('updated_at', 'desc')->paginate(5);
    	$categories = Category::all();
    	return view('admin.index', compact(['products', 'dp', 'sellers', 'categories']));
    }

    public function delete_product(Request $request, $pid){
        // dd($request);
        $product = Product::find($pid);
        File::deleteDirectory(public_path() . '/images/products/' . $product->ime);
        // dd(public_path() . '/images/products/' . $product->prva_slika);
        File::delete(public_path() . '/images/products/' . $product->prva_slika);
        $product->delete();
        Session::flash('success', 'Продуктот е избришан.');
        return back();
    }
}
