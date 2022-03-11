<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    //
    public function add($product_detail_id){
        $productDetail = ProductDetail::findOrFail($product_detail_id);
        $id = $productDetail->product_id;
        $product = Product::find($id);

        Cart::add([
            'id' => $product_detail_id,
            'name' => $product->product_name,
            'qty' => 1,
            'price' => $product->product_discount ? $product->product_price-($product->product_price*$product->product_discount) : $product->product_price,
            'weight' => 0,
            'options' => [
                'color' => $productDetail->color,
                'image' => $productDetail->product_detail_image,
                'max_qty' => $productDetail->product_detail_quantity,
            ],
        ]);
        return Redirect::route('cart.show');
    }

    public function show(){
        $carts = Cart::content();
        $number = 1;
        $total = Cart::total(0);
        return view('frontend.cart', compact('carts','number','total'));
    }

    public function delete($rowId){
        Cart::remove($rowId);
        Toastr::warning('Xóa sản phẩm thành công');
        return back();
    }

    public function update(Request $request){
        $max_qty = Cart::content()->where('rowId',$request->rowId)->first()->options->max_qty;
        $qty = ($request->qty <= $max_qty) ? $request->qty : $max_qty;
        Cart::update($request->rowId, $qty);
    }

    public function destroy(){
        Cart::destroy();
        Toastr::warning('Đã xóa toàn bộ giỏ hàng');
        return back();
    }
}
