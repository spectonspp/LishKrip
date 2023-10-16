<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        return view('backend.product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Product::orderBy('product_id', 'desc')->first();

        if ($id == null)
            $id = 1;
        else
            $id = $id->product_id + 1;

        $destinationPath = 'images';
        $file = $request->file('product_image');
        $typeFile = $file->getClientOriginalExtension();
        $filename = $id . '-00.' . $typeFile;
        $file->move($destinationPath, $filename);
        Product::create([
            'product_name' => $request->product_name,
            'product_productiondate' => $request->product_productiondate,
            'product_expirationdate' => $request->product_expirationdate,
            'product_costprice' => $request->product_costprice,
            'product_quantity' => $request->product_quantity,
            'product_image' => $filename,
            'product_desc' => $request->product_desc,
            'prosize_id' => $request->p_size,
            'prostyle_id' => $request->p_style,
            'protype_id' => $request->p_type
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if ($request->file('product_image')) {
            $destinationPath = 'images';
            $file = $request->file('product_image');
            $typeFile = $file->getClientOriginalExtension();
            $filename =  $product->product_id . '-00.' . $typeFile;
            $file->move($destinationPath, $filename);

        }
        Product::where(['product_id' => $product->product_id])->update([
            'product_name' => $request->product_name,
            'product_productiondate' => $request->product_productiondate,
            'product_expirationdate' => $request->product_expirationdate,
            'product_costprice' => $request->product_costprice,
            'product_quantity' => $request->product_quantity,
            'product_desc' => $request->product_desc,
            'prosize_id' => $request->p_size,
            'prostyle_id' => $request->p_style,
            'protype_id' => $request->p_type
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
