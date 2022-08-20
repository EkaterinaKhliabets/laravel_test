<?php

namespace App\Http\Controllers;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\Products\FilterProductsRequest;
use App\Http\Requests\Products\StoreProductsRequest;
use App\Http\Requests\Products\UpdateProductsRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(FilterProductsRequest $request)
    {
       // $products = Product::paginate(9);
       // return view('products.index', ['products' => $products]);


        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(9);

        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }


    public function store(StoreProductsRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }


    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }


    public function update(UpdateProductsRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('products.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
