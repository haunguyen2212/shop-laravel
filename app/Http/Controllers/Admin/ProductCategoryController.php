<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('backend.category');
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:product_categories,product_category_slug',
        ],[
            'name.required' => 'Chưa nhập tên danh mục',
            'slug.required' => 'Chưa nhập slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0] );
        }
        else{
            $category = ProductCategory::create(['product_category_name' => $request->name, 'product_category_slug' => $request->slug]);
            Toastr::success('Thêm danh mục thành công','Thành công');
            return response()->json(['data' => $category, 'status' => 1],200);
        }
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return response()->json(['data'=>$category, 'status' => 1],200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('product_categories', 'product_category_slug')->ignore($id, 'product_category_id'),
            ],
        ],[
            'name.required' => 'Chưa nhập tên danh mục',
            'slug.required' => 'Chưa nhập slug',
            'slug.unique' => 'Slug đã tồn tại',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0] );
        }
        else{
            $category = ProductCategory::find($id)->update(['product_category_name' => $request->name, 'product_category_slug' => $request->slug]);
            Toastr::success('Cập nhật danh mục thành công','Thành công');
            return response()->json(['data' => $category, 'status' => 1], 200);
        }
    }

    public function destroy($id)
    {
        $delete = ProductCategory::find($id)->delete();
        if($delete){
            Toastr::success('Xóa danh mục thành công', 'Thành công');
            return response()->json(['status' => 1 ], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra. Thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        } 
    }
}
