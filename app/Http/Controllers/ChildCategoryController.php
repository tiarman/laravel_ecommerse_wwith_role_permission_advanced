<?php

namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Categories;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChildCategoryController extends Controller
{

    public function index(){
        $data['data'] = ChildCategory::orderby('created_at', 'desc')->paginate(20);
        $categories = Categories::all();
        $data['subcategories'] = SubCategory::all();
        // return $categories;
        return view('admin.childcategory.list', $data, compact('categories'));
    }
    public function manage($id = null) {
        if ($data['childcategory'] = ChildCategory::find($id)) {
          return view('admin.childcategory.manage', $data);
        }
        return RedirectHelper::routeWarning('childcategory.list', '<strong>Sorry!!!</strong> User not found');
      }

    public function create($id = null){
        return view('admin.childcategory.create');
    }

    public function store(Request $request){
        // return $request;
        $message = '<strong>Congratulations!!!</strong> Category successfully';
        $rules = [
            'category_id' => 'required|string',
            'subcategory_id' => 'required|string',
            'childcategory_name' => 'required|string',
            'childcategory_slug' => 'nullable|string',
            'status' => ['required', Rule::in(\App\Models\ChildCategory::$statusArrays)],
            // 'status' = ['required|string', Rule::in(\App\Models\ChildCategory::$statusArrays)],
        ];

        if ($request->has('id')) {
            $childcategory = ChildCategory::find($request->id);
            $message = $message . ' updated';
          } else {
            $childcategory = new ChildCategory();
            $message = $message . ' created';
          }
          $request->validate($rules);

          try{
            $childcategory->category_id = $request->category_id;
            $childcategory->subcategory_id = $request->subcategory_id;
            $childcategory->childcategory_name = $request->childcategory_name;
            $childcategory->childcategory_slug = $request->childcategory_slug;
            $childcategory->status = $request->status;

            if ($childcategory->save()) {
                return RedirectHelper::routeSuccess('childcategory.list', $message);
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
          $user = ChildCategory::find($id);
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
      $user = ChildCategory::find($id);
      if ($user->update(['status' => $status])) {
        return "success";
      }
    }
  }
}
