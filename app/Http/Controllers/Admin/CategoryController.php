<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getCategory(){
        return view('backend.category');
    }

    public function addCategory(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:product_categories,product_category_slug',
        ],[
            'name.required' => 'Chưa nhập tên danh mục',
            'slug.required' => 'Chưa nhập slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);

        $category = new ProductCategory();
        $category->product_category_name = $request->name;
        $category->product_category_slug = $request->slug;
        $category->save();

        return back();
    }
}
