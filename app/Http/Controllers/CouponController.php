<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Coupon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{

    public function index(){
        $data['data'] = Coupon::orderby('created_at', 'desc')->paginate(20);
        return view('admin.coupon.list', $data);
    }
    public function manage($id = null) {
        if ($data['coupon'] = Coupon::find($id)) {
          return view('admin.coupon.manage', $data);
        }
        return RedirectHelper::routeWarning('coupon.list', '<strong>Sorry!!!</strong> Coupon not found');
      }

    public function create($id = null){
        return view('admin.coupon.create');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong> Coupon successfully';
        $rules = [
            'coupon_code' => 'nullable|string',
            'valid_date' => 'nullable|string',
            'type' => ['nullable', Rule::in(\App\Models\Coupon::$typeArrays)],
            'coupon_amount' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\Coupon::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\Coupon::$statusArrays)],
        ];

        if ($request->has('id')) {
            $coupon = Coupon::find($request->id);
            $message = $message . ' updated';
          } else {
            $coupon = new Coupon();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{
            $coupon->coupon_code = $request->coupon_code;
            $coupon->valid_date = $request->valid_date;
            $coupon->type = $request->type;
            $coupon->coupon_amount = $request->coupon_amount;
            $coupon->status = $request->status;

            if ($coupon->save()) {
                return RedirectHelper::routeSuccess('coupon.list', $message);
              }
            return RedirectHelper::backWithInput();

          }catch(QueryException $e){
            // return $e;
            return RedirectHelper::backWithInputFromException();

          }

    }


    public function destroy(Request $request) {
        $id = $request->post('id');
        try {
          $user = Coupon::find($id);
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
      $user = Coupon::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }
}
