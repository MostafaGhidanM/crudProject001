<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* Mostafa
        $request->validate ([
            'productName' => 'required | string | max:255',
            'productPrice' => 'required | decimal:2',
            'productDescription' => 'required | string',
            'productProducer' => 'required | string',
        ]);
        Product::create($request->all());
        return redirect()->route('products.index');
        */
        $request->validate ([
            'productName' => 'required | unique:products| string | max:255',
            'productPrice' => 'required | numeric | min:0 | not_in:0',
            'productDescription' => 'required | string',
            'productProducer' => 'required | string',
        ],
        [
            'productName' => 'يجب إدخال اسم المنتج'
        ]
        );
        Product::create($request->all());
        return redirect()->route('products.index')->with('success','Prouct has been added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate ([
            'productName' => 'required | unique:products,productName,'.$product->id,
            'productPrice' => 'required | numeric',
            'productDescription' => 'required | string',
            'productProducer' => 'required | string',
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success','Product has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with("success", "The Product has been deleted");
    }
}
