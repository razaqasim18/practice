<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::with('products')->get();
        return view('category.create', compact('categories'));
    }
    public function save(Request $req)
    {
        $validation = Validator::make($req->all(), [
            'category_name' => 'required|unique:categories,category_name'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 'errors',
                'errors' => $validation->errors()
            ], 422);
        }

        $category = new Category();
        $category->category_name = $req->category_name;

        if ($category->save()) {
            return response()->json(['status' => 'success', 'message' => 'Data saved successfully!']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);

        if ($category->delete()) {
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully!']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
    public function update(Request $req)
    {
        $validation = Validator::make($req->all(), [
            'edit_category_name' => 'required|unique:categories,category_name'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 'errors',
                'errors' => $validation->errors()
            ], 422);
        }

        $category = Category::findOrFail($req->cat_id);


        $category->category_name = $req->edit_category_name;

        if ($category->save()) {
            return json_encode(["status" => true, "message" => "Category Updated Successfully!"]);
        } else {
            return redirect()->route('category.create')->with('error', 'Something went wrong');
        }
    }
}
