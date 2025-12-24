<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            "product_name" => "required",
            "brand" => "nullable",
            "description" => "nullable",
            "price" => "required|numeric",
            "stock" => "required|integer",
            "status" => "required|boolean",
        ]);
        $product = new Product();
        $product->category_id = $request->category;
        $product->name = $request->product_name;
        $product->brand = $request->brand;
        $product->slug = Str::slug($request->product_name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->save();

        if ($request->hasFile('images')) {
            // dd($product);
            foreach ($request->file('images') as $image) {
                $imageName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('product_images', $imageName);

                Product_image::create([
                    'product_id' => $product->id,
                    'image_path' => 'product_images/' . $imageName
                ]);
            }
        }

        return redirect()->route('product.index');
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
        $categories = Category::all();

        $product = Product::findorFail($id);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            "product_name" => "required",
            "brand" => "nullable",
            "description" => "nullable",
            "price" => "required|numeric",
            "stock" => "required|integer",
            "status" => "required|boolean",
        ]);
        $product = Product::findorFail($id);
        $product->category_id = $request->category;
        $product->name = $request->product_name;
        $product->brand = $request->brand;
        $product->slug = Str::slug($request->product_name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->save();

        if ($request->hasFile('images')) {

            // delete old images from storage + DB
            $oldImages = Product_image::where('product_id', $product->id)->get();

            foreach ($oldImages as $oldImage) {
                $oldImage->delete();
            }

            // save new images
            foreach ($request->file('images') as $image) {
                $imageName = time().'_'.uniqid().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('product_images'), $imageName);

                Product_image::create([
                    'product_id' => $product->id,
                    'image_path' => 'product_images/' . $imageName
                ]);
            }
        }

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findorFail($id);
        $images = Product_image::where('product_id', $id)->get();
        foreach ($images as $image) {
            $image->delete();
        }
        $product->delete();
        return redirect()->route('product.index');
    }
}
