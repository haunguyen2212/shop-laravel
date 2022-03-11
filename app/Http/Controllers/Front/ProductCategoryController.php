<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class ProductCategoryController extends Controller
{
    //
    public function getProductsByBrand(Request $request, $brand_slug){
        $price = $request->price ?? 'all';
        $sort = $request->sort_by ?? 'latest';

    	$brandInfo = Brand::where('brand_slug',$brand_slug)->first();
        $id = $brandInfo->brand_id;
        $category_id = $brandInfo->product_category_id;
        $brands = Brand::where('product_category_id',$category_id)->get();

        switch($price){
            case 'all':
                $products = Brand::find($id)->product();
                break;
            case 'lv1':
                $products = Brand::find($id)->product()->where('product_price', '<', 5000000);
                break;
            case 'lv2':
                $products = Brand::find($id)->product()->whereBetween('product_price', [5000000, 10000000]);
                break;
            case 'lv3':
                $products = Brand::find($id)->product()->whereBetween('product_price', [10000000, 20000000]);
                break;
            case 'lv4':
                $products = Brand::find($id)->product()->where('product_price', '>', 20000000);
                break;
            default:
                $products = Brand::find($id)->product();
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
        
        return view('frontend.productcategory', compact('brandInfo','brands','products'));
    }
}
