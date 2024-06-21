@extends('base.base')
@section('content')
    <div class="container flex justify-between items-center">
        <h1 class="text-4xl">Products</h1>
        <form
            hx-get="/api/products"
            hx-target="#products_list"
            hx-trigger="submit">
            <input type="text"
                name="filter"
                class="p-2 border border-gray-300 rounded">
        </form>
    </div>
    <hr class="m-2">
    <div id="products_list" class="flex flex-wrap justify-center gap-3 mt-3"
        hx-get="/api/products"
        hx-trigger="load delay:500ms"
        hx-swap="innerHTML">
    </div>
    @endsection
    
    {{-- @foreach($products as $prod)
        <div class='p-4 rounded bg-blue-200 w-[21.5rem]'>
            <h3 class='text-2xl'>{{ $prod->name }}</h3>
            <div class='italic text-gray-500'>{{ $prod->description }}</div>
            <div class='text-4xl text-right'>{{ $prod->price }}</div>
        </div>
    @endforeach --}}


        {{-- <h1>PRODUCTS</h1>
        <div class="products grid grid-cols-4 gap-3">
            @foreach ($products as $product)
                <div class="mini-container p-8 bg-slate-300 duration-500 hover:bg-slate-500 hover:cursor-pointer">
                    <h2>Name: {{ $product->name }}</h2>
                    <p>Description: {{ $product->description }}</p>
                    <p>Qty: {{ $product->qty }}</p>
                    <p>Price: {{ $product->price }}</p>
                </div>
            @endforeach
        </div> --}}