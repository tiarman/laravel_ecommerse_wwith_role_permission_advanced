<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Categories;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductFile;
use App\Models\Review;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SiteController extends Controller {

  public function dashboard() {
//    return view('dashboard');
    return view('admin.index');
  }

  public function profile() {
    return view('admin.profile');
  }

//  public function userProfile() {
//    return to_route('profile');
//  }

  public function logout() {
    \auth()->logout();
    \session()->flush();
    return redirect()->route('login');
  }







//   Start Here

public function home(){
    $data ['category'] = Categories::where('status', '=', Categories::$statusArrays[0])->get();
    $data ['subcategory'] = SubCategory::where('status', '=', SubCategory::$statusArrays[0])->get();
    $data ['childcategory'] = ChildCategory::where('status', '=', ChildCategory::$statusArrays[0])->get();
    $data ['product'] = Product::where('status', '=', Product::$statusArrays[0])->get();
    $product = Product::where('status', '=', Product::$statusArrays[0])->get();
    $data['product_file'] = ProductFile::get();
    // return $datas;
    return view('site.index', $data);

}


// public function home(){
//     $data ['category'] = Categories::where('status', '=', Categories::$statusArrays[0])->get();
//     $data ['subcategory'] = SubCategory::where('status', '=', SubCategory::$statusArrays[0])->get();
//     $data ['childcategory'] = ChildCategory::where('status', '=', ChildCategory::$statusArrays[0])->get();
//     $data ['product'] = Product::where('status', '=', Product::$statusArrays[0])->get();
//     // return $data;
//     return view('site.index', $data);

// }





public function product_details($name = null, $id=NULL)
{
    // $cartItems = \Cart::getContent();
    // $category=Category:: where('status','=',Category::$statusArray[0])->get();

    if ($product = Product::where('name', $name)->where('status', Product::$statusArrays[0])->first()){
        $related_product = Product::where('subcategory_id', $product->subcategory_id)->take(10)->get();
        $review = Review::where('product_id', $product->id)->get();
        $totalreview = Review::where('product_id', $product->id)->count();
        $product_file = ProductFile::where('product_id', $product->id)->get();
        // return $product_file;
        //    return $related_product;
        // for Colors loading
        // $productId2 = Product::find($id, 'color');
        $ids2 = $product->color;
        $selectedColors = explode(',', $ids2 );
        // return $selectedColors;
        return view('site.product_details', compact('product', 'related_product', 'review', 'totalreview', 'product_file', 'selectedColors'));

    }
    return RedirectHelper::backWithWarning('<strong>Sorry!!! </strong> Product not found.');
}



public function productQuickView($id){
    $product = Product::where('id', $id)->first();
    return view('site.quick_view', compact('product'));
}



}
