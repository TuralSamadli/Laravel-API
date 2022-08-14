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
    public function update(Request $request){
        
        $product=Product::where('id',$request->id)->update([
            'name' => $request->name,
            'description'=>$request->description,
            'category_id'=>$request->category_id,
            'slug'=>$request->slug,
            'price'=> $request->price,
        
            
        ]);
        if($product->update()){
            return response()->json([
                'message' => 'Product updated successfully'
            ],201);
        }
        else{
            return response()->json([
                'message' => 'Error occured!!!'
            ]);
        }
    }
    
    public function delete(Request $request){
        if(Product::destroy($request->id)){
            
            return response()->json([
                'message'=> 'Product was deleted successfully'
            ]);
        }
    }
}
