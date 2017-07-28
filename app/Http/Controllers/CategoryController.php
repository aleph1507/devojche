<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use App\Product;

class CategoryController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
		$this->middleware('isadmin');
	}

	public function add_category(Request $request){
		$this->validate($request, [
				'ime' => 'required'
			]);

		// echo "asdasdsad";
		// dd("vesna " . $request);
		$c = new Category();
		$ime = $request->ime;
		if($ime != null)
			$c->ime = $request->ime;
		$tab = 'category';
		$c->save();
		Session::flash('success', 'Категоријата е зачувана.');
		return redirect()->route('admin.index')->with('tab', $tab);
	}

    public function rename(Request $request, $id){
    	$this->validate($request, [
    		'ime' => 'required'
    	]);
    	$category = Category::find($id);
    	if($request->ime && $category)
    		$category->ime = $request->ime;
    	$category->save();
    	$tab = 'category';
    	Session::flash('success', 'Името е успешно променето.');
    	return redirect()->route('admin.index')->with('tab', $tab);
    }

    public function del_category($id){
    	$category = Category::find($id);
    	// foreach($category->products() as $p){
    	// 	// $p->category()->dissociate($category);
    	// 	// $p->save();
    	// 	$category->products()->dissociate($category);
    		
    	// }
    	// $category->products()->dissociate($category);
    	// $category->save();
    	$tab = 'category';
    	$category->delete();
    	Session::flash('success', 'Категоријата е избришана.');
    	return redirect()->route('admin.index')->with('tab', $tab);
    }
}
