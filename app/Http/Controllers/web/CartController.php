<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('web.page.cart');
    }
    public function addToCart(Request $request)
    {
        if(isset($request->id)){
            
            $product = products::findOrFail($request->id);
            $cart = session()->get('cart', []);

            if (isset($cart[$request->id])) {
                if (isset($request->quantity) && $request->quantity > 0) {
                    $cart[$request->id]['quantity']+= $request->quantity;
                }else{
                    $cart[$request->id]['quantity']++;
                }
            } else {
                $cart[$request->id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->img,
                ];
            }

            $total = $this->total($cart);
            session()->put('total', $total);
            session()->put('cart', $cart);
            // echo '<pre>';
            // print_r(session()->get('cart')); 
            // echo '</pre>';
            return response()->json(['cart' => count($cart), 'total' => $total]);
        }
        
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            $total = $this->total($cart);
            session()->put('total', $total);
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }

    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                session()->put('total', $this->total($cart));
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    
    private function total($cart){
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return $total ?? 0;
    }
   
}
