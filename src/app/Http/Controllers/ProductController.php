<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductBackground;
use App\Models\BackgroundReview;
class ProductController extends Controller
{
    //
    public function getProduct()
    {
        $product = ProductCategory::with('product')->get();
        
        return response()->json($product);
    }
    public function getProductName($slug)
    {
        $product = Product::with('productImage')->where('slug' , $slug)->first();
        return response()->json($product);
    }
    public function getProductSize($slug)
    {
        $product = Product::with('productSize')->where('slug' , $slug)->first();
        $id = $product->id;
        $productSize = ProductSize::where('product_id' , $id)->get();
        return response()->json($productSize);
    }
    public function getProductBackground($slug)
    {
        $product = Product::where('slug' , $slug)->first();
        $id = $product->id;
        $productBackground = ProductBackground::where('product_id' , $id)->with('backgroundReview')->get();
        return response()->json($productBackground);
    }
    
}
