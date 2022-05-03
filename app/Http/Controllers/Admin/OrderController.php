<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request){
        if(!isset($request->search)){
            $orders = Order::orderBy('created_at','desc')->paginate(10);
        }
        else{
            $orders = Order::where('order_id', 'like','%'.$request->search.'%')->orderBy('created_at','desc')->paginate(10);
        }
        return view('backend.order', compact('orders'));
    }

    public function getDetails(Request $request){
        $id = $request->id;
        $data['order'] = Order::find($id);
        $details = DB::table('order_details')->join('product_details','order_details.product_detail_id','=','product_details.product_detail_id')->where('order_details.order_id', $id);
        $details = $details->join('products','product_details.product_id','=','products.product_id')->get();
        $data['detail'] = $details;
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function browsing(Request $request){
        $id = $request->id;
        $value = $request->value;
        if($value == 2){
            $date = Carbon::now();
            $update = Order::find($id)->update(['delivery_date' => $date->format('Y-m-d H:i:s'),'payment_status' => 1, 'order_status' => $value]);
        }
        else{
            $update = Order::find($id)->update(['order_status' => $value]);
        }
        
        if($update){
            switch($value){
                case '-1':
                    Toastr::error('Hủy đơn hàng thành công', 'Thành công');
                    break;
                case '1': 
                    Toastr::success('Duyệt đơn hàng thành công', 'Thành công');
                    break;
                case '2':
                    Toastr::info('Đơn hàng đã hoàn thành', 'Thành công');
            }
            
            return response()->json(['status' => 1], 200);
        }
        else{
            Toastr::error('Có lỗi xảy ra, thử lại sau', 'Thất bại');
            return response()->json(['status' => 0]);
        }
    }


}
