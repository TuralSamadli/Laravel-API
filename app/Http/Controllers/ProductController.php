<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products,200);

    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product,200);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->name = $request->name;
        //bug fixed
        $product->description = $request->description;
        $product->category_id = $request->category_id;


        if($product->save())
        {
            return response()->json([
                'message' => 'Product added successfully'
            ],201);
        }
        else{
            return response()->json([
                'message' => 'Error occured!!!'
            ]);
        }

    }
}