<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::limit(8)->get();
        $oldproducts = Product::limit(4)->orderBy('id', 'asc')->get();
        $freshproducts = Product::with('category')
            ->whereHas('category', function ($query) {
                $query->whereIn('category_name', ['Fruits', 'Vegetables', 'Dairy']);
            })
            ->limit(4)
            ->orderBy('id', 'desc')
            ->get();
        return view('quickbasket', [
            'categories' => $categories,
            'oldproducts' => $oldproducts,
            'freshproducts' => $freshproducts
        ]);
    }

    public function  detail($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('product_detail', [
            'product' => $product
        ]);
    }
}
