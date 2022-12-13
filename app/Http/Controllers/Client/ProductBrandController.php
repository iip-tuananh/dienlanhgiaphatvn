<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\models\product\Product;
use App\models\product\ProductBrands;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    public function listProductBrand($slug){
        $data['list'] = Product::where(['status'=>1,'brand_slug'=>$slug])
        ->orderBy('id','DESC')
        ->select('id','category','name','discount','price','images','slug','cate_slug','type_slug', 'size','description')
        ->paginate(12);
        $data['brands'] = ProductBrands::where('status', 1)->get();
        $brand = ProductBrands::where('slug', $slug)->first();
        $data['title'] = $brand->name;
        return view('product.list',$data);
    }

    public function allProductBrand()
    {
        $data['brands'] = ProductBrands::where('status', 1)->get();
        $data['title'] = 'Tất cả thương hiệu';
        return view('product.list-brand', $data);
    }
}
