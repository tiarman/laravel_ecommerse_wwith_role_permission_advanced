<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\ChildCategory;
use App\Models\PickupPoint;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\WareHouse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{


    public function index()
    {
        $data['data'] = Product::orderby('created_at', 'desc')->get();
        return view('admin.product.list', $data);
    }


    public function create()
    {
        $data['categories'] = Categories::get();
        $data['subcategory'] = SubCategory::get();
        $data['childcategory'] = ChildCategory::get();
        $data['brand'] = Brand::get();
        $data['pickup_point'] = PickupPoint::get();
        $data['warehouse'] = WareHouse::get();
        return view('admin.product.create',$data);
    }

    //manage

    public function manage($id = null)
    {
        if ($data['product'] = Product::find($id)) {
            return view('admin.product.manage', $data);
        }
        return RedirectHelper::routeWarningWithParams('product.list', '<strong>Sorry!!!</strong> Product not found');
    }


    public function store(Request $request)
    {
//        dd($request->all());
// return $request;
$message = '<strong>Congratulations!!!</strong> Product successfully';
$rules = [

    'category_id' => 'nullable|string',
    'subcategory_id' => 'nullable|string',
    'childcategory_id' => 'nullable|string',
    'brand_id' => 'nullable|string',
    'pickuppoint_id' => 'nullable|string',
    'warehouse_id' => 'nullable|string',
    'name' => 'nullable|string',
    'code' => 'nullable|string',
    'unit' => 'nullable|string',
    'tags[]' => 'nullable|string',
    'color[]' => 'nullable|string',
    'size' => 'nullable|string:',
    'video' => 'nullable|string',
    'purchase_price' => 'nullable|string',
    'selling_price' => 'nullable|string',
    'discount_price' => 'nullable|string',
    'stock_quantity' => 'nullable|string',
    'warehuse' => 'nullable|string',
    'description' => 'nullable|string',
    'thumbnail' => 'nullable|string',
    'images' => 'nullable|string',
    'featured' => 'nullable|string',
    'today_deal' => 'nullable|string',
    'flash_deal_id' => 'nullable|string',
    'cash_on_delivery' => 'nullable|string',
    'admin_id' => 'nullable|string',
    'status' => ['required', Rule::in(\App\Models\Product::$statusArrays)],
    // 'status' = ['required|string', Rule::in(\App\Models\Product::$statusArrays)],
];

if ($request->has('id')) {
    $product = Product::find($request->id);
    $message = $message . ' updated';
  } else {
    $product = new Product();
    $message = $message . ' created';
  }
  $request->validate($rules);

        try {
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->childcategory_id = $request->childcategory_id;
            $product->brand_id = $request->brand_id;
            $product->pickuppoint_id = $request->pickuppoint_id;
            $product->warehouse_id = $request->warehouse_id;
            $product->name = $request->name;
            $product->code = $request->code;
            $product->unit = $request->unit;
            $product->tags = $request->tags;
            $product->color = $request->color;
            $product->size = $request->size;
            $product->video = $request->video;
            $product->purchase_price = $request->purchase_price;
            $product->selling_price = $request->selling_price;
            $product->discount_price = $request->discount_price;
            $product->stock_quantity = $request->stock_quantity;
            $product->warehuse = $request->warehuse;
            $product->description = $request->description;
            $product->thumbnail = $request->thumbnail;
            $product->featured = $request->featured;
            $product->today_deal = $request->today_deal;
            $product->status = $request->status;
            $product->flash_deal_id = $request->flash_deal_id;
            $product->cash_on_delivery = $request->cash_on_delivery;
            $product->admin_id = $request->admin_id;

            $oldImage = $product->image;
//            return $product;
            if ($request->hasFile('image')) {
                $logo = CustomHelper::storeImage($request->file('image'), '/product/');
                if ($logo != false) {
                    $product->image = $logo;
                }
            }
            if ($product->save()) {
                if ($oldImage !== null && isset($logo)) {
                    CustomHelper::deleteFile($oldImage);
                }
                return RedirectHelper::routeSuccessWithParams('product.list', $message);
            }
            return RedirectHelper::backWithInput();
        } catch (QueryException $e) {
            return $e;
            return RedirectHelper::backWithInputFromException();
        }

    }


    public function destroy(Request $request) {
        $id = $request->post('id');
        try {
            $user = Product::find($id);
            $oldImage = $user->image;
            if ($user->delete()) {
                if ($oldImage !== null) {
                    CustomHelper::deleteFile($oldImage);
                }
                return 'success';
            }
        } catch (\Exception $e) {
        }
    }


    /**
     * @param Request $request
     * @return string|void
     */
    public function ajaxUpdateStatus(Request $request) {
        if ($request->isMethod("POST")) {
            $id = $request->post('id');
            $postStatus = $request->post('status');
            $status = strtolower($postStatus);
            $user = Product::find($id);
            if ($user->update(['status' => $status])) {
                return "success";
            }
        }
    }


}
