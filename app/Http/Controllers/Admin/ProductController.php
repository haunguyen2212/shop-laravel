<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index($id)
    {
        $category = ProductCategory::find($id);
        $products = DB::table('products')->join('brands', 'products.brand_id', '=', 'brands.brand_id')->where('products.product_category_id', $id)->orderBy('product_id', 'desc')->paginate(10);
        return view('backend.product', compact('category','products'));
    }

    public function create($category)
    {
        $data = Brand::where('product_category_id', $category)->get();
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function store($id, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nameAdd' => 'required',
            'slugAdd' => 'required|unique:products,product_slug',
            'brandAdd' => 'required',
            'descriptionAdd' => 'required',
            'priceAdd' => 'required',
            'discountAdd' => 'required|numeric|between:0,1',
            'imgAdd' => 'image',
        ],[
            'nameAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập tên sản phẩm',
            'slugAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập slug',
            'slugAdd.unique' => '<i class="fas fa-exclamation-circle"></i> Slug đã tồn tại',
            'brandAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa chọn nhãn hiệu',
            'descriptionAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập mô tả',
            'priceAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập giá',
            'discountAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập giảm giá',
            'discountAdd.numeric' => '<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số',
            'discountAdd.between' => '<i class="fas fa-exclamation-circle"></i> Giá trị nẳm giữa 0 và 1',
            'imgAdd.image' => '<i class="fas fa-exclamation-circle"></i> Vui lòng chọn ảnh',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0] );
        }

        $image = $request->file('imgAdd');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('frontend/img/product'), $new_name);
        $store = Product::create([
            'product_name' => $request->nameAdd,
            'brand_id' => $request->brandAdd,
            'product_category_id' => $id,
            'product_slug' => $request->slugAdd,
            'product_description' => $request->descriptionAdd,
            'product_image' => $new_name,
            'product_price' => $request->priceAdd,
            'product_discount' => $request->discountAdd,
            'featured' => $request->featuredAdd ? 1 : 0,
        ]);
        if($store){
            Toastr::success('Thêm sản phẩm thành công', 'Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra. Thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        }
    }

    public function show($category ,$id)
    {
        $data = [];
        $data['category'] = ProductCategory::find($category);
        $data['product'] = Product::find($id);
        $brand = $data['product']->brand_id;
        $data['brand'] = Brand::find($brand);
        $data['color'] = ProductDetail::where('product_id', $id)->get();
        $data['specification'] = DB::table('product_specifications')->join('specification_types', 'product_specifications.type_id', '=', 'specification_types.type_id')->where('product_specifications.product_id', $id)->get();
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function edit($category, $id)
    {
        $data = [];
        $data['category'] = ProductCategory::all();
        $data['product'] = DB::table('products')->join('brands', 'products.brand_id', '=', 'brands.brand_id')->where('products.product_id', $id)->first();
        $data['brand'] = Brand::where('product_category_id', $category)->get();
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($category, $id)
    {
        $product = Product::find($id);
        $delete = $product->delete();
        $destinationPath = public_path('frontend/img/product/').$product->product_image;
        if(file_exists($destinationPath)){
            unlink($destinationPath);
        }
        if($delete){
            Toastr::success('Xóa sản phẩm thành công', 'Thành công');
            return response()->json(['status' => 1 ], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra. Thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        } 
    }

    public function updateProductInfo($id,  Request $request){
        $validator = Validator::make($request->all(),[
            'nameEdit' => 'required',
            'slugEdit' => [
                'required',
                Rule::unique('products', 'product_slug')->ignore($id, 'product_id'),
            ],
            'brandEdit' => 'required',
            'descriptionEdit' => 'required',
            'priceEdit' => 'required',
            'discountEdit' => 'required|numeric|between:0,1',
        ],[
            'nameEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập tên sản phẩm',
            'slugEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập slug',
            'slugEdit.unique' => '<i class="fas fa-exclamation-circle"></i> Slug đã tồn tại',
            'brandEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa chọn nhãn hiệu',
            'descriptionEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập mô tả',
            'priceEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập giá',
            'discountEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập giảm giá',
            'discountEdit.numeric' => '<i class="fas fa-exclamation-circle"></i> Vui lòng nhập số',
            'discountEdit.between' => '<i class="fas fa-exclamation-circle"></i> Giá trị nẳm giữa 0 và 1',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0] );
        }

        $image = $request->file('imgEdit');

        if($image){
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('frontend/img/product'), $new_name);
            $old_img = Product::find($id)->product_image;
            $destinationPath = public_path('frontend/img/product/').$old_img;
            if(file_exists($destinationPath)){
            unlink($destinationPath);
            }
            $update = Product::find($id)->update([
                'product_name' => $request->nameEdit,
                'product_slug' => $request->slugEdit,
                'brand_id' => $request->brandEdit,
                'product_description' => $request->descriptionEdit,
                'product_price' => $request->priceEdit,
                'product_discount' => $request->discountEdit,
                'product_image' => $new_name,
                'featured' => $request->featuredEdit ? 1 : 0,
            ]);
        }
        else{
            $update = Product::find($id)->update([
                'product_name' => $request->nameEdit,
                'product_slug' => $request->slugEdit,
                'brand_id' => $request->brandEdit,
                'product_description' => $request->descriptionEdit,
                'product_price' => $request->priceEdit,
                'product_discount' => $request->discountEdit,
                'featured' => $request->featuredEdit ? 1 : 0,
            ]);
        }
        
        if($update){
            Toastr::success('Cập nhật sản phẩm thành công','Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            return response()->json(['status' => 0]);
        }
        
    }

}
