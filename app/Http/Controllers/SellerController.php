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

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $seller = Auth::user()->seller;
        $products = $seller->products()->orderBy('updated_at', 'desc')->paginate(10);
        $cat = Category::all();
        return view('seller.profile')->withSeller($seller)->withProducts($products)->withCat($cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller.create');
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
                'ime' => 'required|regex:/^[\pL\s\-]+$/u',
                'adresa' => 'required|string',
                'telefon' => 'sometimes|string',
                'slika' => 'required|image'
            ]);

        $uid = Auth::user()->id;
        $seller = new Seller();
        $seller->user_id = $uid;
        $seller->ime = $request->ime;
        $seller->adresa = $request->adresa;
        if($request->telefon)
            $seller->telefon = $request->telefon;
        $image = $request->file('slika');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('/images/sellers/' . $filename);
        Image::make($image)->fit(450,500)->save($location);
        $seller->slika = $filename;

        $user = Auth::user();
        $seller->save();
        $seller->user()->associate($user);
        Session::flash('success', 'Регистрирани како продавач.');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
                'ime' => 'required|regex:/^[\pL\s\-]+$/u',
                'adresa' => 'required|string',
                'telefon' => 'sometimes|string',
                'slika' => 'sometimes|image'
            ]);

        $uid = Auth::user()->id;
        $seller = Seller::find($id);
        $seller->user_id = $uid;
        $seller->ime = $request->ime;
        $seller->adresa = $request->adresa;
        if($request->telefon)
            $seller->telefon = $request->telefon;
        if($request->slika){
            File::delete(public_path('/images/sellers/' . $seller->slika));
            $image = $request->file('slika');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/images/sellers/' . $filename);
            Image::make($image)->fit(450,500)->save($location);
            $seller->slika = $filename;
        }
        //$user = Auth::user();
        $seller->save();
        //$seller->user()->associate($user);
        Session::flash('success', 'Податоците се променети.');
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
        $seller = Auth::user()->seller;
        File::delete(public_path('/images/sellers/' . $seller->slika));
        $seller->delete();
        Session::flash('success', 'Избришани сте како продавач.');
        return redirect('/');

    }
}
