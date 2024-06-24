@extends('base.base')
@section('content')
    <div class="container flex justify-between items-center">
        <h1 class="text-4xl">Products</h1>
        <div class="right-items flex items-center">
            <a href="#" class="mr-2 bg-blue-400 hover:bg-blue-300 duration-500 py-2 px-4 rounded-sm"
                hx-swap="innerHTML" hx-target="">Add</a>
            {{-- <a href="/product/add-product " class="mr-2 bg-blue-400 hover:bg-blue-300 duration-500 py-2 px-4 rounded-sm">Add</a> --}}
            <form
                hx-get="/api/products"
                hx-target="#products_list"
                hx-trigger="submit">
                <input type="text"
                    name="filter"
                    class="p-2 border border-gray-300 rounded">
            </form>
        </div>
    </div>
    <hr class="m-2">
    <div id="products_list" class="flex flex-wrap justify-center gap-3 mt-3"
        hx-get="/api/products"
        hx-trigger="load delay:500ms"
        hx-swap="innerHTML">
    </div>
    @endsection