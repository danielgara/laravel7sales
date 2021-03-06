<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Item;

class ProductController extends Controller
{

    public function index()
    {
        $data["products"] = Product::all();
        return view('product.index')->with("data",$data);
    }

    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        $data["title"] = $product->getName();
        $data["product"] = $product;
        return view('product.show')->with("data",$data);
    }

    public function addToCart($id, Request $request)
    {
        $data = []; //to be sent to the view
        $quantity = $request->quantity;
        $products = $request->session()->get("products");
        $products[$id] = $quantity;
        $request->session()->put('products', $products);
        return back();
    }

    public function removeCart(Request $request)
    {
        $request->session()->forget('products');
        return redirect()->route('product.index');
    }

    public function cart(Request $request)
    {
        $products = $request->session()->get("products");
        if($products){
            $keys = array_keys($products);
            $productsModels = Product::find($keys);
            $data["products"] = $productsModels;
            return view('product.cart')->with("data",$data);
        }

        return redirect()->route('product.index');
    }

    public function buy(Request $request)
    {
        $order = new Order();
        $order->setTotal("0");
        $order->save();

        $precioTotal = 0;

        $products = $request->session()->get("products");
        if($products){
            $keys = array_keys($products);
            for($i=0;$i<count($keys);$i++){
                $item = new Item();
                $item->setProductId($keys[$i]);
                $item->setOrderId($order->getId());
                $item->setQuantity($products[$keys[$i]]);
                $item->save();
                $productActual = Product::find($keys[$i]);
                $precioTotal = $precioTotal + $productActual->getPrice()*$products[$keys[$i]];
            }

            $order->setTotal($precioTotal);
            $order->save();

            $request->session()->forget('products');
        }

        return redirect()->route('product.index');
    }
}
