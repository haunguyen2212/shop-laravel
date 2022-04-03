<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
    	$mainProducts = Product::where('featured',1)->get();
        $newProducts = Product::orderBy('product_id','desc')->take(8)->get();
    	return view('frontend.index', compact('mainProducts','newProducts'));
    }

    public function getProductsByKey(Request $request){
        $key = $request->keyword;
        $products = Product::where('product_name', 'like','%'.$key.'%')->take(12)->get();
        return view('frontend.search', compact('products','key'));
    }

    public function getProductsByCategory(Request $request, $category_slug){
        $price = $request->price ?? 'all';
        $sort = $request->sort_by ?? 'latest';

        $categoryInfo = ProductCategory::where('product_category_slug',$category_slug)->first();
        $id = $categoryInfo->product_category_id;
        $brands = ProductCategory::find($id)->brand;
        
        switch($price){
            case 'all':
                $products = ProductCategory::find($id)->product();
                break;
            case 'lv1':
                $products = ProductCategory::find($id)->product()->where('product_price', '<', 5000000);
                break;
            case 'lv2':
                $products = ProductCategory::find($id)->product()->whereBetween('product_price', [5000000, 10000000]);
                break;
            case 'lv3':
                $products = ProductCategory::find($id)->product()->whereBetween('product_price', [10000000, 20000000]);
                break;
            case 'lv4':
                $products = ProductCategory::find($id)->product()->where('product_price', '>', 20000000);
                break;
            default:
                $products = ProductCategory::find($id)->product();
        }

        switch($sort){
            case 'latest':
                $products = $products->orderByDesc('product_id')->paginate(12);
                break;
            case 'oldest':
                $products = $products->orderBy('product_id')->paginate(12);
                break;
            case 'price-asc':
                $products = $products->orderBy('product_price')->paginate(12);
                break;
            case 'price-desc':
                $products = $products->orderByDesc('product_price')->paginate(12);
                break;
            default:
                $products = $products->orderByDesc('product_id')->paginate(12);
        }

        $products->appends(['price' => $price, 'sort_by' => $sort]);

        return view('frontend.productcategory', compact('categoryInfo','brands','products'));
    }
}
