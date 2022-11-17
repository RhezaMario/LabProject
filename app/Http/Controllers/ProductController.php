<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
    public function CustomerHome(){
        $productData = Product::paginate(8);
        return view('CustomerHome', compact('productData'));
    }
    public function AdminHome(){
        $Data = Product::paginate(8);
        return view('AdminHome', compact('Data'));
    }
    public function addpage(){
        return view ('AddItem');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, rules: [
            'name' => 'required|unique:products|min:5|max:20',
            'image_url' => 'required|mimes:jpg,jpeg,png',
            'description'=> 'required|min:5',
            'price'=> 'integer|min:1000',
            'stock'=> 'integer|min:1'
       ]);
       $file_name = $request->image_url->getClientOriginalName();
       $image = $request->image_url->storeAs('product_image', $file_name);
       Product::create([
            'name' => $request->name,
            'price'=> $request->price,
            'image_url'=>$image,
            'description'=> $request->description,
            'stock' => $request->stock
       ]);
       return redirect('/AdminHome');
    }
    public function productView($name)
    {
        if(Product::where('name', $name)->exists()){
            $products = Product::where('name', $name)->first();
            return view('ProductDetails', compact('products'));
        }
        else{
            return redirect ('/AdminHome')->with('status', "not available");
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
