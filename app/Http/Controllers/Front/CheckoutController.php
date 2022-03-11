<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use App\Models\Ward;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class CheckoutController extends Controller
{
    //
    public function index(){
        $carts = Cart::content();
        $total = Cart::total(0);
        $provinces = Province::all();
        return view('frontend.checkout', compact('carts','total','provinces'));
    }

    public function getDistricts(Request $request){
        $id = $request->id;
        $districts = District::where('province_id', $id)->get();
        $data = '<option value="">Chưa chọn huyện</option>';
        foreach($districts as $district){
            $data .= '<option value="'.$district->id.'">'.$district->name.'</option>';
        }
        return $data;
    }

    public function getWards(Request $request){
        $id = $request->id;
        $wards = Ward::where('district_id', $id)->get();
        $data = '<option value="">Chưa chọn xã</option>';
        foreach($wards as $ward){
            $data .= '<option value="'.$ward->id.'">'.$ward->name.'</option>';
        }
        return $data;
    }

    public function checkout(Request $request){
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
            'province' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'address' => 'required',
        ],[
            'firstName.required' => 'Vui lòng nhập họ của bạn',
            'lastName.required' => 'Vui lòng nhập tên của bạn',
            'phone.required' => 'Chưa nhập số điện thoại',
            'province.required' => 'Chưa chọn tỉnh',
            'district.required' => 'Chưa chọn huyện',
            'ward.required' => 'Chưa chọn xã',
            'address.required' => 'Chưa nhập địa chỉ giao hàng',
        ]);

        $ward = Ward::find($request->ward)->name;
        $district = District::find($request->district)->name;
        $province = Province::find($request->province)->name;
        $address = $request->address.', '.$ward.', '.$district.', '.$province;
        $date = Carbon::now();
        $order = new Order();
        $order->order_id = $request->orderId;
        $order->customer_id = Auth::id();
        $order->customer_name = $request->firstName.' '.$request->lastName;
        $order->customer_phone = $request->phone;
        $order->customer_address = $address;
        $order->total = Cart::total(0,'','');
        $order->order_date = $date->format('Y-m-d H:i:s');
        $order->delivery_date = $date->addDays(5)->format('Y-m-d H:i:s');
        $order->order_status = '0';
        $saveOrder = $order->save();
        if(!$saveOrder)
            return redirect()->route('complete')->with('error','Đặt hàng thất bại, thử lại sau.');

        $carts = Cart::content();
        foreach($carts as $cart){
            $detail = new OrderDetail();
            $detail->order_id =$request->orderId;
            $detail->product_detail_id = $cart->id;
            $detail->quantity = $cart->qty;
            $detail->amount = $cart->price;
            $saveDetail = $detail->save();
            if(!$saveDetail)
            return redirect()->route('complete')->with('error','Đặt hàng thất bại, thử lại sau.');
        }

        Cart::destroy();
        return redirect()->route('complete');
    }

    public function complete(){
        return view('frontend.complete');
    }

    public function getProfile(){
        $user = Auth::user();
        $id = Auth::id();
        $orders = Order::where('customer_id',$id)->orderBy('updated_at','desc')->get();
        return view('frontend.profile',compact('user','orders'));
    }

    public function getOrderDetails($id){
        $order = Order::find($id);
        $order_id = $order->order_id;
        $details = DB::table('order_details')->join('product_details','order_details.product_detail_id','=','product_details.product_detail_id')->where('order_details.order_id', $order_id);
        $details = $details->join('products','product_details.product_id','=','products.product_id')->get();
        return view('frontend.orderdetail', compact('order','details'));
    }

    public function cancelOrder($id){
        $status = Order::find($id)->payment_status;
        if(!$status){
            $details = OrderDetail::where('order_id', $id)->delete();
            Order::find($id)->delete();
            Toastr::success('Xóa đơn hàng thành công');
            return redirect()->route('profile');
        }
        else{
            Toastr::error('Thất bại, thử lại sau');
            return redirect()->route('profile');
        }
    }
}
