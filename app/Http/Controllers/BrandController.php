<?php

namespace App\Http\Controllers;

use App\Helper\CustomHelper;
use App\Helper\RedirectHelper;
use App\Models\Brand;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{

    public function index(){
        $data['data'] = Brand::orderby('created_at', 'desc')->paginate(20);
        // return $categories;
        return view('admin.brand.list', $data);
    }
    public function manage($id = null) {
        if ($data['brand'] = Brand::find($id)) {
          return view('admin.brand.manage', $data);
        }
        return RedirectHelper::routeWarning('brand.list', '<strong>Sorry!!!</strong> User not found');
      }

    public function create($id = null){
        return view('admin.brand.create');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong> Category successfully';
        $rules = [
            'brand_name' => 'required|string',
            'brand_slug' => 'required|string',
            'front_page' => 'nullable|string',
            'image' => 'nullable|file|mimes:png,jpg,jpeg,svg',
            'status' => ['required', Rule::in(\App\Models\Brand::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\Brand::$statusArrays)],
        ];

        if ($request->has('id')) {
            $brand = Brand::find($request->id);
            $message = $message . ' updated';
          } else {
            $brand = new Brand();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{
            $brand->brand_name = $request->brand_name;
            $brand->brand_slug = $request->brand_slugy_name;
            $brand->front_page = $request->front_page;
            $brand->status = $request->status;
            $oldImage = $brand->image;
            if ($request->hasFile('image')) {
                $logo = CustomHelper::storeImage($request->file('image'), '/brand/');
                if ($logo != false) {
                    $brand->image = $logo;
                }
            }

            if ($brand->save()) {
                if ($oldImage !== null && isset($logo)) {
                    CustomHelper::deleteFile($oldImage);
                }
                return RedirectHelper::routeSuccessWithParams('brand.list', $message);
              }
            return RedirectHelper::backWithInput();

          }catch(QueryException $e){
            return $e;
            return RedirectHelper::backWithInputFromException();

          }

    }


    public function destroy(Request $request) {
        $id = $request->post('id');
        try {
          $user = Brand::find($id);
          if ($user->delete()) {
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
      $user = Brand::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }
}
