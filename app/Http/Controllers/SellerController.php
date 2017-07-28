<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductsController;
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
        // $this->middleware('checkactivated')->only('create','store','update','destroy');
    }

    public function index()
    {
        $seller = Auth::user()->seller;
        $products = $seller->products()->where('deleted', 0)->orderBy('updated_at', 'desc')->paginate(7);
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

    public function smeni_activated($id){
        $seller = Seller::find($id);
        $smena = '';
        $tab = 'seller';
        if($seller->aktiviran){
            $smena = 'деактивиран.';
            $seller->aktiviran = false;
        }
        else {
            $smena = 'активиран.';
            $seller->aktiviran = true;
        }
        $seller->save();
        Session::flash('success', 'Продавачот е ' . $smena);
        return redirect('/admin')->with('tab', $tab);
    }

    // public function nov_seller($uid, $ime, $adresa, $telefon = null, $slika){
    //     $seller = new Seller();

    // }

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

        // dd('seller.update');
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
        // dd('seller.destroy');
        $seller = Seller::find($id);
        $user = $seller->user();
        $products = Product::where('seller_id', $id);
        $PC = new ProductsController;
        foreach($products as $p)
            $PC->destroy($p->id);
        File::delete(public_path('/images/sellers/' . $seller->slika));
        $seller->delete();
        $user->delete();
        Session::flash('success', 'Продавачот е избришан.');
        return redirect('/');

    }
}
