<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\TransactionDetail;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    public function Home(){
        $Data = Product::paginate(8);
        return view('Home', compact('Data'));
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
       return redirect('/Home');
    }
    public function productView($name)
    {
        if(Product::where('name', $name)->exists()){
            $products = Product::where('name', $name)->first();
            return view('ProductDetails', compact('products'));
        }
        else{
            return redirect ('/Home')->with('status', "not available");
        }
    }

    public function search_product(Request $request){
        $name_search = $request->name;
        $products = Product::where('name', 'LIKE', "%$name_search%")->paginate(3)->withQueryString();
        return view('Search', compact('products'));
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
    public function delete($id)
    {
        $data = Product::where('id', $id)->first();
        // if($data->image_url){
        //     Storage::delete($data->image_url);
        // }
        $data->delete();

        return redirect()->back();
    }
    public function addcart(Request $request, $id){
        $this->validate($request, rules: [
            'quantity' => 'required|integer|min:1',
       ]);
        if(Auth::check()){
            $check = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();
            if($check){
                $cart = Cart::find($check->id);
                $cart->update([
                    'quantity' => $request->quantity
                ]);
                return back()->with('message', 'Cart updated');
            }
            else{
                $cart = new Cart;
                $cart->user_id = Auth::id();
                $cart->product_id = $id;
                $cart->quantity = $request->quantity;
                $cart->save();
                return back()->with('message', 'Items Added');
            }
            return redirect()->back();
        }
        else{
            return redirect('/Signin');
        }
    }
    public function viewcart(){
        $total = 0;
        $qty = 0;
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('Cart', compact('cartitems', 'total', 'qty'));
    }
    public function deletecart($id)
    {
        $data = Cart::where('id', $id)->first();
        // if($data->image_url){
        //     Storage::delete($data->image_url);
        // }
        $data->delete();

        return redirect()->back();
    }
    public function editcartview($id){
        if(Product::where('id', $id)->exists()){
            $products = Product::where('id', $id)->first();
            return view('EditCart', compact('products'));
        }
        else{
            return redirect ('/Cart')->with('message', "not available");
        }
    }
    public function updatecart(Request $request, $id){
        $this->validate($request, rules: [
            'quantity' => 'required|integer|min:1',
       ]);
        if(Auth::check()){
            $check = Cart::where('product_id', $id)->where('user_id', Auth::id())->first();
            if($check->exists()){
                $cart = Cart::find($check->id);
                $cart->update([
                    'quantity' => $request->quantity
                ]);
                return back()->with('message', 'Cart updated');
            }

        }
        else{
            return redirect('/Signin');
        }
    }
    public function historyindex(){
        $total = 0;
        $transaction = Transactions::with('details')->where('user_id', Auth::id())->get();
        return view('History', compact('transaction', 'total'));
    }
   public function checkout(){
        $transactions = new Transactions();
        $ldate = date('Y-m-d H:i:s');
        $transactions->transaction_date = $ldate;
        $transactions->user_id = Auth::id();
        $transactions->save();

        $items = Cart::where('user_id', Auth::id())->get();
        foreach($items as $item)
        {
            TransactionDetail::create([
                'transaction_id'=> $transactions->id,
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
            ]);
        }
        foreach($items as $item){
            $item->delete();
        }
        return redirect('/History');
   }
}

