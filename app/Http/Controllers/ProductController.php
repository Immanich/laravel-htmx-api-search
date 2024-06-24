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
        $products = $products->get();
        $html = "";
    
        foreach($products as $prod) {
            $html.= "
            <div class='container border border-black border-solid px-8 py-6 rounded-sm w-3/6 ml-8 mt-8'>
            <h1 class='text-4xl'>Create Product</h1>
            <form hx-post='/api/products' hx-trigger='submit' hx-redirect='/products' hx-target='#products_list' hx-swap='outerHTML' id='add-product-form' method='POST'>
                @csrf
                <div class='name'>
                    <label for='name' class='text-2xl'>Name <br>
                        <input type='text' name='name' id='name' placeholder='Product's name' class='px-2 py-4 h-8 border rounded-sm border-gray-700 border-solid'>
                    </label>
                </div>
                <div class='description mt-3'>
                    <label for='description' class='text-2xl'>Description: <br>
                        <input type='text' name='description' id='description' placeholder='Product's description' class='px-2 py-4 h-8 border rounded-sm border-gray-700 border-solid'>
                    </label>
                </div>
                <div class='price mt-3'>
                    <label for='price' class='text-2xl'>Price: <br>
                        <input type='text' name='price' id='price' placeholder='Product's price' class='px-2 py-4 h-8 border rounded-sm border-gray-700 border-solid'>
                    </label>
                </div>
                <div class='qty mt-3'>
                    <label for='qty' class='text-2xl'>Quantity: <br>
                        <input type='text' name='qty' id='qty' placeholder='Product's quantity' class='px-2 py-4 h-8 border rounded-sm border-gray-700 border-solid'>
                    </label>
                </div>
                <div class='save mt-3 text-2xl'>
                    <button type='submit' class='bg-blue-500 rounded-sm hover:bg-blue-300 duration-500 py-2 px-4'>Save</button>
                </div>
            </form>
        </div>
            ";
        }
        return $html;
    }

    public function addProduct(Request $request) {
        $html = "";

        $html.= "
                <div class='p-4 rounded bg-blue-200 w-[21.5rem]'>
                    <h3 class='text-2xl'>$prod->name</h3>
                    <hr class='m-2'>
                    <div class='italic text-gray-500'>$prod->description</div>
                    <div class='text-4xl text-right'>$prod->price</div>
                </div>
            ";
            
        return $html;
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('product.index')->with('success', 'New product added successfully.');
    }
}
