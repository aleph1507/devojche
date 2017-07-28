<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Session;
use File;
use Auth;
use App\User;
use App\Product;
use App\Seller;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function save_slika($slika, $k, $p_directory){
        $fn = time() . "$k." . $slika->getClientOriginalExtension();
        $location = $p_directory . '/' . $fn;
        Image::make($slika)->fit(600,600)->save($location);
        return $fn;
        // $k++;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'ime' => 'required|min:2|max:20',
                'cena' => 'required|integer',
                'category' => 'required',
                'prva_slika' => 'required|image'
            ]);

        $p = new Product();
        $p->ime = $request->ime;
        $seller = Auth::user()->seller;

        if(!$seller->aktiviran){
            Session::flash('warning','Треба да бидете потврден продавач за да можете да додавате продукти.');
            return redirect('/seller');
        }
        // print_r($seller);
        // exit;
        $category = Category::find($request->category);
        //$p->seller_id = $seller->id;

        if($request->description){
            $p->description = $request->description;
        }
        $p->cena = $request->cena;
        $slika = $request->file('prva_slika');
        $filename = time() . '.' . $slika->getClientOriginalExtension();
        $location = public_path('/images/products/' . $filename);
        Image::make($slika)->fit(600,600)->save($location);
        // dd($seller);
        $p->prva_slika = $filename;
        $p->seller()->associate($seller);
        $p->category()->associate($category);
        $p->save();
        if(($request->slika1)||($request->slika2)||($request->slika3)){
            // print_r($request->sliki);
            $sliki = '';
            $k=1;
            $p_directory = public_path() . '/images/products/' . $p->id;
            // dd($p_directory);
            if(!File::exists($p_directory))
                File::makeDirectory($p_directory, 0777, true);
            if($request->slika1){
                $slika = $request->slika1;
                
            }
            if($request->slika1)
                $p->slika1 = $this->save_slika($request->slika1, 1, $p_directory);
            
            if($request->slika2)
                $p->slika2 = $this->save_slika($request->slika2, 2, $p_directory);

            if($request->slika3)
                $p->slika3 = $this->save_slika($request->slika3, 3, $p_directory);

            // foreach($request->sliki as $slika){
            //     $fn = time() . "$k." . $slika->getClientOriginalExtension();
            //     $location = $p_directory . '/' . $fn;
            //     Image::make($slika)->fit(600,600)->save($location);
            //     $sliki.=$fn . ';';
            //     $k++;
            // }
            // $p->sliki = $sliki;
            // echo $sliki;
        }
        $p->save();
        Session::flash('success', 'Производот е додаден.');
        return redirect('/seller');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $seller = Seller::find($product->seller_id);
        $user = User::find($seller->user_id);
        // $sid = $seller->id;
        $products_from_seller = Product::where('seller_id', $seller->id);
        return view('products.show')->withProduct($product)->withSeller($seller)->withPfs($products_from_seller)->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function soft_delete($id){
        $p = Product::find($id);
        $p->deleted = true;
        $p->save();
        Session::flash('success', 'Продуктот е избришан.');
        return redirect('/seller');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                $this->validate($request, [
                'ime' => 'required|min:2|max:20',
                'cena' => 'required|integer',
                'category' => 'required',
                'prva_slika' => 'sometimes|image'
            ]);

        $p = Product::find($id);
        // if(($request->ime != $p->ime) && (File::exists(public_path('/images/products') . '/' . $p->ime))) {
        //     rename(public_path('/images/products') . '/' . $p->ime,
        //         public_path('/images/products') . '/' . $request->ime);
        // }
        $p->ime = $request->ime;
        $seller = Auth::user()->seller;
        // print_r($seller);
        // exit;
        $category = Category::find($request->category);
        //$p->seller_id = $seller->id;

        if($request->description)
            $p->description = $request->description;

        if(($request->slika1)||($request->slika2)||($request->slika3)){
            // print_r($request->sliki);
            $sliki = '';
            $k=1;
            $p_directory = public_path() . '/images/products/' . $p->id;
            // dd($p_directory);
            if(!File::exists($p_directory))
                File::makeDirectory($p_directory, 0777, true);
            if($request->slika1){
                $slika = $request->slika1;
                
            }
            if($request->slika1)
                $p->slika1 = $this->save_slika($request->slika1, 1, $p_directory);
            
            if($request->slika2)
                $p->slika2 = $this->save_slika($request->slika2, 2, $p_directory);

            if($request->slika3)
                $p->slika3 = $this->save_slika($request->slika3, 3, $p_directory);

        }

        // if($request->sliki){
        //     // print_r($request->sliki);
        //     $s_array = explode(";", $p->sliki);
        //     array_pop($s_array);
        //     foreach($s_array as $s){
        //         File::delete(public_path('images/products' . '/' . $p->ime . '/' . $s));
        //     }
        //     $sliki = '';
        //     $k=1;
        //     $p_directory = public_path() . '/images/products/' . $p->ime;
        //     // dd($p_directory);
        //     if(!File::exists($p_directory))
        //         File::makeDirectory($p_directory, 0777, true);
        //     foreach($request->sliki as $slika){
        //         $fn = time() . "$k." . $slika->getClientOriginalExtension();
        //         $location = $p_directory . '/' . $fn;
        //         Image::make($slika)->fit(600,600)->save($location);
        //         $sliki.=$fn . ';';
        //         $k++;
        //     }
        //     $p->sliki = $sliki;
        //     // echo $sliki;
        // }
        $p->cena = $request->cena;
        if($request->prva_slika){
            File::delete(public_path('images/products/' . $p->prva_slika));
            //dd(public_path('images/products/' . $p->prva_slika));
            $slika = $request->file('prva_slika');
            $filename = time() . '.' . $slika->getClientOriginalExtension();
            $location = public_path('/images/products/' . $filename);
            Image::make($slika)->fit(600,600)->save($location);
            // dd($seller);
            $p->prva_slika = $filename;
        }
        //$p->seller()->associate($seller);
        $p->category()->associate($category);
        $p->save();
        Session::flash('success', 'Производот е променет.');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Products::find($id);
        File::deleteDirectory(asset('images/products/') . $p->id);
        File::delete(asset('images/products/') . $p->prva_slika);
        $p->delete();
        Session::flash('success', 'Продуктот е успешно избришан.');
        return back();
    }
}
