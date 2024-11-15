<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{

    public function show(){
        $all=Product::all();
        return view('admin.product.show',compact('all'));
    }

    public function add(){
        return view('admin.product.add');   
    }


    public function ProductList()
    {
        $products = Product::all(); // Assuming you have a Product model
        return response()->json($products);
    }

    public function store(Request $request){
        // dd($request->all());
        // Validate the request
        $request->validate([
            'name' =>'required|string|max:255',
            'code' =>'required',
            'details' =>'required|string',
            'price' =>'required',
            'cost' =>'required',
            'pic' =>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Get the image file
        $image = $request->file('pic');

        // Generate a unique name for the image
        $imageName = time(). '.'. $image->getClientOriginalExtension();

        // Move the image to the public/storage/products directory
        $image->move(public_path('products'), $imageName);

        // Create a new product in the database
        $product = new Product;
        $product->name = $request->name;
        $product->category_id =$request->category;
        $product->brand_id = $request->brand;
        $product->code = $request->code;
        $product->price = $request->price;
        $product->cost = $request->cost;
        $product->unit = $request->unit;
        $product->creator =Auth::user()->id;
        $product->details = $request->details;
        $product->img_url = $imageName;
        $insert= $product->save();
       if ($insert){
        return redirect()->back()->with('success', 'Product added successfully!');
       }
    }
    
}
