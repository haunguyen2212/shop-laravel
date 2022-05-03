<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Statistic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
        $data = [];
        $data['product'] = Product::all()->count();
        $data['order'] = Order::all()->count();
        $data['account'] = User::all()->count();
        $data['first_category'] = ProductCategory::first();
        return view('backend.home', compact('data', $data));
    }

    public function filterByDate(Request $request){
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'asc')->get();

        foreach($get as $val){
            $data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'quantity' => $val->quantity
            );
        }
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function filterDefault(){
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDay(7)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date', [$sub7days, $now])->orderBy('order_date', 'asc')->get();
        foreach($get as $val){
            $data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'quantity' => $val->quantity
            );
        }
        return response()->json(['data' => $data, 'status' => 1], 200);
    }

    public function categoryStatistic(){
        $get = DB::table('products')->join('product_categories','products.product_category_id', '=', 'product_categories.product_category_id')
                    ->selectRaw('products.product_category_id, product_category_name ,count(products.product_id) as qty')
                    ->groupBy('products.product_category_id', 'product_category_name')
                    ->get();
        foreach($get as $val){
            $data[] = array(
                'label' => $val->product_category_name,
                'value' => $val->qty,
            ); 
        }
        
        return response()->json(['data' => $data, 'status' => 1], 200);
    }
    
    public function getAccount(){
        $accounts = User::all();
        return view('backend.account', compact('accounts'));
    }
}
