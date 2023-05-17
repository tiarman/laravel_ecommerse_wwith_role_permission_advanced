<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\ChildCategory;
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
    // return $data;
    return view('site.index', $data);

}



}
