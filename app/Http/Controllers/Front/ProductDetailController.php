<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    //
    public function getProductDetails($product_slug, Request $request){
    	$product = Product::where('product_slug',$product_slug)->first();
        $id = $product->product_id;
        $productCategory = Product::find($id)->productCategory;
        $productBrand = Product::find($id)->brand;
    	$productDetails = Product::find($id)->productDetail;
        $productQuantity = $productDetails->sum('product_detail_quantity');
    	$productSpecifies = DB::table('products')->join('product_specifications','product_specifications.product_id','=','products.product_id')->join('specification_types','product_specifications.type_id','=','specification_types.type_id')->where('products.product_id',$id)->get();
    	$comments = DB::table('comments')->join('users','comments.user_id','=', 'users.uid')->where('product_id', $id)->get();
        if(isset($request->color))
            return redirect()->route('cart.add',['product_detail_id' => $request->color]);
            
        return view('frontend.productdetail', compact('product', 'productCategory', 'productBrand' ,'productDetails','productQuantity','productSpecifies', 'comments'));
    }

    public function sendComment(Request $request){
        $user_id = Auth::id();
        $avatar = User::find($user_id)->avatar;
        $username = User::find($user_id)->username;
        $product_id = $request->id;
        $comment_content = $request->comment;

        $comment = new Comment();
        $comment->product_id = $product_id;
        $comment->user_id = $user_id;
        $comment->messages = $comment_content;
        $comment->save();
        
        $data = '';
        $data = '<div class="comment-ask">';
        $data .= '<div class="row-user">';
        $data .= '<img src="img/avatar/'.$avatar.'" alt="Avatar" class="avatar">';
        $data .= '<span> '.$username.'</span>';
        $data .= '</div>';
        $data .= '<div class="comment-content">'.$comment_content.'</div>';
        $data .= '<div class="action-user">';
        $data .= '<a href="">Trả lời</a>';
        $data .= '<span> - </span>';
        $data .= '<span>Vừa xong</span>';
        $data .= '</div>';
        $data .= '</div>';
        return $data;
    }
}
