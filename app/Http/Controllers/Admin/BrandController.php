<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ProductCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    
    public function index()
    {
        $brands = DB::table('brands')->join('product_categories', 'brands.product_category_id', '=', 'product_categories.product_category_id')->orderBy('brand_id', 'asc')->paginate(6);
        return view('backend.brand', compact('brands'));
    }

    public function create()
    {
        $data = ProductCategory::all();
        return response()->json(['data' => $data, 'status' => 1]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nameAdd' => 'required',
            'slugAdd' => 'required|unique:brands,brand_slug',
            'catAdd' => 'required',
            'imgAdd' => 'image',
        ],[
            'nameAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập tên nhãn',
            'slugAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập slug',
            'slugAdd.unique' => '<i class="fas fa-exclamation-circle"></i> Slug đã tồn tại',
            'catAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa chọn danh mục',
            'imgAdd.image' => '<i class="fas fa-exclamation-circle"></i> Vui lòng chọn ảnh',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0] );
        }

        $image = $request->file('imgAdd');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('frontend/img/logo'), $new_name);
        $store = Brand::create([
            'brand_name' => $request->nameAdd,
            'product_category_id' => $request->catAdd,
            'brand_slug' => $request->slugAdd,
            'brand_image' => $new_name,
        ]);

        if($store){
            Toastr::success('Thêm nhãn thành công', 'Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra. Thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
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
        //
    }

    public function edit($id)
    {
        $data = [];
        $data['category'] = ProductCategory::all();
        $data['brand'] = Brand::find($id);
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nameEdit' => 'required',
            'slugEdit' => [
                'required',
                Rule::unique('brands', 'brand_slug')->ignore($id, 'brand_id'),
            ],
        ],[
            'nameEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập tên sản phẩm',
            'slugEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập slug',
            'slugEdit.unique' => '<i class="fas fa-exclamation-circle"></i> Slug đã tồn tại',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0] );
        }

        $image = $request->file('imgEdit');

        if($image){
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('frontend/img/logo'), $new_name);
            $old_img = Brand::find($id)->brand_image;
            $destinationPath = public_path('frontend/img/logo/').$old_img;
            if(file_exists($destinationPath)){
            unlink($destinationPath);
            }
            $update = Brand::find($id)->update([
                'brand_name' => $request->nameEdit,
                'brand_slug' => $request->slugEdit,
                'product_category_id' => $request->catEdit,
                'brand_image' => $new_name,
            ]);
        }
        else{
            $update = Brand::find($id)->update([
                'brand_name' => $request->nameEdit,
                'brand_slug' => $request->slugEdit,
                'product_category_id' => $request->catEdit,
            ]);
        }

        if($update){
            Toastr::success('Cập nhật nhãn thành công','Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            return response()->json(['status' => 0]);
        }
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $delete = $brand->delete();
        $destinationPath = public_path('frontend/img/logo/').$brand->brand_image;
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }
        if($delete){
            Toastr::success('Xóa nhãn thành công', 'Thành công');
            return response()->json(['status' => 1 ], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra. Thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        }
        
    }
}
