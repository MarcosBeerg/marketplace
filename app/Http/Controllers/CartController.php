<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        dd(session()->get('cart'));
    }
    public function add(Request $request)
    {
        $product = $request->get('product');

        if(session()->has('cart')){

            session()->push('cart', $product);
        }
        
        else {
            $products[] = $product;

            session()->put('cart', $products);

        }

        flash('Produto Adicionado no carrinho!')->success();
        return redirect()->route('product.single',['slug' =>$product['slug']]);   
    }
}
