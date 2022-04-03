<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductDetail;
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
}
