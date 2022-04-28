<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductSpecification;
use App\Models\SpecificationType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductDetailController extends Controller
{
    public function index($id){
        $product = Product::find($id);
        $details = ProductDetail::where('product_id', $id)->get();
        $specifications = DB::table('product_specifications')->join('specification_types', 'product_specifications.type_id', '=', 'specification_types.type_id')->where('product_specifications.product_id', $id)->get();
        return view('backend.detail', compact('product', 'details', 'specifications'));
    }

    public function storeColor($id, Request $request){
        $validator = Validator::make($request->all(), [
            'nameColorAdd' => 'required',
            'qtyColorAdd' => 'required',
            'imgColorAdd' => 'image',
        ],[
            'nameColorAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập màu sản phẩm',
            'qtyColorAdd.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập số lượng',
            'imgColorAdd.image' => '<i class="fas fa-exclamation-circle"></i> Vui lòng chọn hình ảnh',
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0 ]);
        }
        $image = $request->file('imgColorAdd');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('frontend/img/product_detail'), $new_name);
        $store = ProductDetail::create([
            'product_id' => $id,
            'color' => $request->nameColorAdd,
            'product_detail_image' => $new_name,
            'product_detail_quantity' => $request->qtyColorAdd,
        ]);
        if($store){
            Toastr::success('Thêm chi tiết thành công', 'Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            return response()->json(['status' => 0]);
        }
    }

    public function editColor($id){
        $data = ProductDetail::find($id);
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function updateColor($id, Request $request){
        $validator = Validator::make($request->all(),[
            'nameColorEdit' => 'required',
            'qtyColorEdit' => 'required',
        ],[
            'nameColorEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập màu sản phẩm',
            'qtyColorEdit.required' => '<i class="fas fa-exclamation-circle"></i> Chưa nhập số lượng', 
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0]);
        }

        $image = $request->file('imgColorEdit');
        if($image){
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('frontend/img/product_detail'), $new_name);
            $old_img = ProductDetail::find($id)->product_detail_image;
            $destinationPath = public_path('frontend/img/product_detail/').$old_img;
            if(file_exists($destinationPath)){
            unlink($destinationPath);
            }
            $update = ProductDetail::find($id)->update([
                'color' => $request->nameColorEdit,
                'product_detail_image' => $new_name,
                'product_detail_quantity' => $request->qtyColorEdit,
            ]);
        }
        else{
            $update = ProductDetail::find($id)->update([
                'color' => $request->nameColorEdit,
                'product_detail_quantity' => $request->qtyColorEdit,
            ]);
        }

        
        if($update){
            Toastr::success('Cập nhật thành công', 'Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            return response()->json(['status' => 0]);
        }   
    }

    public function destroyColor($id){
        $detail = ProductDetail::find($id);
        $delete = $detail->delete();
        $destinationPath = public_path('frontend/img/product_detail/').$detail->product_detail_image;
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

    public function createSpec($id){
        $spec = ProductSpecification::where('product_id', $id)->get();
        $arr = [];
        foreach ($spec as $key => $value) {
            $arr[$key] = $value->type_id;
        }
        $data = SpecificationType::whereNotIn('type_id', $arr)->get();
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function storeSpec($id, Request $request){
        $validator = Validator::make($request->all(), [
            'contentSpecAdd' => 'required',
        ],[
            'contentSpecAdd.required' => '<i class="fas fa-exclamation-circle"></i> Nội dung không được bỏ trống',
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0]);
        }
        $store = ProductSpecification::create([
            'product_id' => $id,
            'type_id' => $request->nameSpecAdd,
            'specification' => $request->contentSpecAdd,
        ]);
        if($store){
            Toastr::success('Thêm thành công', 'Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra, thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        }
    }

    public function editSpec($product_id, $type_id){
        $spec = ProductSpecification::where('product_id', $product_id)->get();
        $type_edit = ProductSpecification::where('product_id', $product_id)->where('type_id', $type_id)->first()->type_id;
        $arr = [];
        foreach ($spec as $value) {
            if($value->type_id != $type_edit){
                $arr[] = $value->type_id;
            }    
        }
        $data = [];
        $data['allSpec'] = SpecificationType::whereNotIn('type_id', $arr)->get();
        $data['spec'] = ProductSpecification::where('product_id', $product_id)->where('type_id', $type_id)->first();
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function updateSpec($product_id, $type_id, Request $request){
        $validator = Validator::make($request->all(),[
            'contentSpecEdit' => 'required',
        ],[
            'contentSpecEdit.required' => '<i class="fas fa-exclamation-circle"></i> Nội dung không được bỏ trống',
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0]);
        }
        $update = ProductSpecification::where('product_id', $product_id)->where('type_id', $type_id)->update([
            'type_id' => $request->nameSpecEdit,
            'specification' => $request->contentSpecEdit,
        ]);
        if($update){
            Toastr::success('Cập nhật thành công', 'Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra, thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        }
    }

    public function destroySpec($product_id, $type_id){
        $delete = ProductSpecification::where('product_id', $product_id)->where('type_id',$type_id)->delete();
        if($delete){
            Toastr::success('Xóa thành công', 'Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra, thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        }
    }

    public function storeNewSpec(Request $request){
        $validator = Validator::make($request->all(),[
            'newSpec' => 'required|unique:specification_types,type_name',
        ],[
            'newSpec.required' => '<i class="fas fa-exclamation-circle"></i> Tên không được bỏ trống',
            'newSpec.unique' => '<i class="fas fa-exclamation-circle"></i> Tên thông số đã tồn tại',
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->toArray(), 'status' => 0]);
        }
        $store = SpecificationType::create([
            'type_name' => $request->newSpec,
        ]);
        if($store){
            Toastr::success('Thêm mới thành công', 'Thành công');
            return response()->json(['status' => 1], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra, thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        }
    }
}
