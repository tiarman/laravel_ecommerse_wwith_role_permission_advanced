<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\WareHouse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WareHouseController extends Controller
{

    public function index(){
        $data['data'] = WareHouse::orderby('created_at', 'desc')->paginate(20);
        // return $categories;
        return view('admin.warehouse.list', $data);
    }
    public function manage($id = null) {
        if ($data['warehouse'] = WareHouse::find($id)) {
          return view('admin.warehouse.manage', $data);
        }
        return RedirectHelper::routeWarning('warehouse.list', '<strong>Sorry!!!</strong> User not found');
      }

    public function create($id = null){
        return view('admin.warehouse.create');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong> Category successfully';
        $rules = [
            'warehouse_name' => 'required|string',
            'warehouse_address' => 'required|string',
            'warehouse_phone' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\WareHouse::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\WareHouse::$statusArrays)],
        ];

        if ($request->has('id')) {
            $warehouse = WareHouse::find($request->id);
            $message = $message . ' updated';
          } else {
            $warehouse = new WareHouse();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{
            $warehouse->warehouse_name = $request->warehouse_name;
            $warehouse->warehouse_address = $request->warehouse_address;
            $warehouse->warehouse_phone = $request->warehouse_phone;
            $warehouse->status = $request->status;

            if ($warehouse->save()) {
                return RedirectHelper::routeSuccess('warehouse.list', $message);
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
          $user = WareHouse::find($id);
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
      $user = WareHouse::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }
}
