<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('product.createproduct', compact('categories'));
    }
    //inseriting product
    public function insert(Request $request)
    {
        //validate
        $request->validate([
            'product_name' => 'required|unique:products,product_name',
            'category_name' => 'required',
            'description' => 'required',
            'price' => 'required|min:0',
            'in_stock' => 'required',
            'is_discounted' => 'required',
            'is_active' => 'required',
            'featured_image' => 'required|image|mimes:jpg,png,jpeg',
            'other_images.*' => 'image|mimes:jpg,png,jpeg'
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_name;
        $product->slug = Str::slug($request->product_name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->is_active = $request->is_active;
        $product->is_discounted = $request->is_discounted;
        $product->in_stock = $request->in_stock;
        //$product->featured_image = $request->featured_image;

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/'), $fileName);
            $image = $fileName;
            $product->featured_image = $image;
        }
        $response = $product->save();

        if ($request->hasFile('other_images')) {
            foreach ($request->file('other_images') as $imageFile) {
                $imageName = uniqid() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('uploads/product_images/'), $imageName);
                ProductImages::create([
                    'product_id' => $product->id,
                    'images' => $imageName,
                ]);
            }
        }
        if ($response) {
            return Redirect()->route('product.create')->with('success_add', 'Product Added Successfully');
        } else {
            return Redirect()->route('product.create')->with('error_add', 'Something went wrong');
        }
    }

    //showing product list
    function index()
    {
        $categories=Category::all();
        $products = Product::select('id', 'product_name','category_id', 'discount', 'price', 'featured_image', 'is_discounted')
            ->get();
        return view('product.index', compact('products','categories'));
    }

    //deleting product
    function delete($id)
    {
        $product = Product::destroy($id);
        if ($product) {
            return json_encode(['status' => 'true', 'message' => 'data deleted Successfully']);
        }
        return json_encode(['status' => 'false', 'message' => 'somethig went wrong']);
    }

    //editing product
    function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $otherImages = ProductImages::where('product_id', $id);
        return view('product.edit', compact('product', 'categories', 'otherImages'));
    }
    //updating product
    public function update(Request $request, $id)
    {
        //validate
        $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|min:0',
        ]);

        //find product
        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->slug = Str::slug($request->product_name);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->discount = $request->discount;
        $product->is_active = $request->is_active;
        $product->is_discounted = $request->is_discounted;


        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/products/'), $fileName);

            $product->featured_image = $fileName;
        }


        $response = $product->save();


        if ($request->hasFile('other_images')) {
            foreach ($request->file('other_images') as $imageFile) {
                $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('uploads/product_images/'), $imageName);
                ProductImages::create([
                    'product_id' => $product->id,
                    'images' => $imageName,
                ]);
            }
        }
        if ($response) {
            return redirect()->route('product.edit', ['id' => $product->id])->with('success-update', 'Product Updated Successfully');
        } else {
            return redirect()->route('product.edit', ['id' => $product->id])->with('Error-update', 'Something went wrong!');
        }
    }

    //deletingImg
    public function ImageDelete(Request $request)
    {
        $image = ProductImages::find($request->id);

        if ($image) {
            $image->delete();
            return response()->json(["status" => true]);
        } else {
            return response()->json(["status" => false]);
        }
    }
}
