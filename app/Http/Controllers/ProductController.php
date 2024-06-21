<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request) {

        $products = Product::orderBy('name');
        if($request->filter) {
            $products->where('name', 'like', "%$request->filter%")
                ->orWhere('description', 'like', "%$request->filter%");
        }
        
        $html = "";
    
        // $products = $products->get();
        foreach($products->get() as $prod) {
            $html .= "
                <div class='p-4 rounded bg-blue-200 w-[21.5rem]'>
                    <h3 class='text-2xl'>$prod->name</h3>
                    <hr class='m-2'>
                    <div class='italic text-gray-500'>$prod->description</div>
                <div class='text-4xl text-right'>$prod->price</div>
                </div>
            ";
        }
    
        return $html;
        // return view('products', [
    
        //     'products' => $products
    
        // ]);
    
    }

    // return view('products', [
    //     'products' => $products
    // ]);

    //   public function index() {
    //     $products = Product::all();

    //     return view('products', [
    //         'products' => $products
    //     ]);
    // }    
}
