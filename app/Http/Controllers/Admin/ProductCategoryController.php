<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return response()->json(['data'=>$category, 'status' => 1],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = ProductCategory::find($id)->update(['product_category_name' => $request->name, 'product_category_slug' => $request->slug]);
        Toastr::success('Cập nhật danh mục thành công','Thành công');
        return response()->json(['data' => $category, 'status' => 1],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
