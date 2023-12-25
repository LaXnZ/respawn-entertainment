<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::paginate(10);
       
        foreach ($product as $item) {
            $item->description = Str::limit($item->description, 400);
        }
        
        
        
        return view('admin.products.products', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.product-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the request, image should be only jpg
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'slug' => 'required|max:255',
                'short_description' => 'required|max:255',
                'description' => 'required',
                'regular_price' => 'required|numeric',
                'SKU' => 'required',
                'stock_status' => 'required',
                'featured' => 'required',
                'quantity' => 'required|numeric',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]
        );
        
        $input = $request->all();
        
       if($image = $request->file('image')){
           $destinationPath = 'assets/imgs/product_crud/';
           $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image->move($destinationPath, $productImage);
           $input['image'] = "$productImage";
         }
        
        Product::create($input);
        
        return redirect()->route('products')->with('success','Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.product-edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate the request, image should be only jpg
        $this->validate(
            $request,
            [
                'name' => 'required|max:255',
                'slug' => 'required|max:255',
                'short_description' => 'required|max:255',
                'description' => 'required',
                'regular_price' => 'required|numeric',
                'SKU' => 'required',
                'stock_status' => 'required',
                'featured' => 'required',
                'quantity' => 'required|numeric',
                
            ]
        );
        
        $input = $request->all();
        
       if($image = $request->file('image')){
           $destinationPath = 'assets/imgs/product_crud/';
           $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
           $image->move($destinationPath, $productImage);
           $input['image'] = "$productImage";
         }
        
        $product = Product::findOrFail($id);
        $product->update($input);
        
        return redirect()->route('products')->with('success','Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('products')->with('success','Product deleted successfully!');
    }
}