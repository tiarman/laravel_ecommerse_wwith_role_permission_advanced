<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PickupPointController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WareHouseController;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('site.index');
// })->name('home');



Route::get('/', [SiteController::class, 'home'])->name('home');

Route::get('/shop', function () {
    return view('site.shop');
})->name('shop');

Route::get('/quick_view/{id}', [SiteController::class, 'productQuickView'])->name('quick_view');
Route::get('/product_details/{name}', [SiteController::class, 'product_details'])->name('product_details');
Route::get('/product/{productId}/file/{id}/delete', [ProductController::class, 'productFileDelete'])->name('product.file.delete');





Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');



Route::get('/logout', [SiteController::class, 'logout'])->middleware('auth')->name('logout');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [SiteController::class, 'profile'])->name('profile');

    # Ajax
    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::post('/permission-by-role', [PermissionController::class, 'getPermissionByRole'])->middleware('role_or_permission:Super Admin|Manage Permission')->name('get.permission.by.role');
        Route::post('/update/user/status', [UserController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.user.status');
        Route::post('/update/category/status', [CategoriesController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.category.status');
        Route::post('/update/subcategory/status', [SubCategoryController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.subcategory.status');
        Route::post('/update/childcategory/status', [ChildCategoryController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.childcategory.status');
        Route::post('/update/brand/status', [BrandController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.brand.status');
        Route::post('/update/warehouse/status', [WareHouseController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.warehouse.status');
        Route::post('/update/coupon/status', [CouponController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.coupon.status');
        Route::post('/update/pickuppoint/status', [PickupPointController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.pickuppoint.status');
        Route::post('/update/product/status', [ProductController::class, 'ajaxUpdateStatus'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.product.status');
        Route::post('/update/product/featured', [ProductController::class, 'ajaxUpdateFeatured'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.product.featured');
        Route::post('/update/product/today_deal', [ProductController::class, 'ajaxUpdatedeal'])->middleware('role_or_permission:Super Admin|Manage User')->name('update.product.today_deal');
    });


    #Users
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/create', [UserController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [UserController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [UserController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [UserController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [UserController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [UserController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #Roles
    Route::prefix('role')->name('role.')->group(function () {
        Route::get('/create', [RoleController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Role')->name('create');
        Route::post('/store', [RoleController::class, 'store'])->middleware('role_or_permission:Super Admin|Create Role|Manage Role')->name('store');
        Route::get('/manage/{id}', [RoleController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Role')->name('manage');
        Route::get('/{id}/view', [RoleController::class, 'view'])->middleware('role_or_permission:Super Admin|View Role')->name('view');
        Route::delete('/destroy', [RoleController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Role')->name('destroy');
        Route::get('/list', [RoleController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of Role')->name('list');
    });

    #Permission
    Route::match(['get', 'post'], '/permission/manage', [PermissionController::class, 'managePermission'])->middleware('role_or_permission:Super Admin|Manage Permission')->name('permission.manage');



    #Categories
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/create', [CategoriesController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [CategoriesController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [CategoriesController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [CategoriesController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [CategoriesController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [CategoriesController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #SubCategory
    Route::prefix('subcategory')->name('subcategory.')->group(function () {
        Route::get('/create', [SubCategoryController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [SubCategoryController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [SubCategoryController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [SubCategoryController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [SubCategoryController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [SubCategoryController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #SubCategory
    Route::prefix('childcategory')->name('childcategory.')->group(function () {
        Route::get('/create', [ChildCategoryController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [ChildCategoryController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [ChildCategoryController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [ChildCategoryController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [ChildCategoryController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [ChildCategoryController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });


 // Global Route
 Route::get('/get-child-category/{id}', [CategoriesController::class, 'getChildCategory']);


    #Brand
    Route::prefix('brand')->name('brand.')->group(function () {
        Route::get('/create', [BrandController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [BrandController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [BrandController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [BrandController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [BrandController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [BrandController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });


    #WareHouse
    Route::prefix('warehouse')->name('warehouse.')->group(function () {
        Route::get('/create', [WareHouseController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [WareHouseController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [WareHouseController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [WareHouseController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [WareHouseController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [WareHouseController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });

    #WareHouse
    Route::prefix('coupon')->name('coupon.')->group(function () {
        Route::get('/create', [CouponController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [CouponController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [CouponController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [CouponController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [CouponController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [CouponController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });


    #Pickup Point
    Route::prefix('pickuppoint')->name('pickuppoint.')->group(function () {
        Route::get('/create', [PickupPointController::class, 'create'])->middleware('role_or_permission:Super Admin|Create User')->name('create');
        Route::post('/store', [PickupPointController::class, 'store'])->middleware('role_or_permission:Super Admin|Create User|Manage User')->name('store');
        Route::get('/manage/{id}', [PickupPointController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage User')->name('manage');
        Route::get('/{id}/view', [PickupPointController::class, 'view'])->middleware('role_or_permission:Super Admin|View User')->name('view');
        Route::delete('/destroy', [PickupPointController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete User')->name('destroy');
        Route::get('/list', [PickupPointController::class, 'index'])->middleware('role_or_permission:Super Admin|List Of User')->name('list');
    });


        #Product
        Route::prefix('product')->name('product.')->group(function () {
            Route::get('/create', [ProductController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Slider')->name('create');
            Route::post('/store', [ProductController::class, 'store'])->middleware('role_or_permission:Super Admin|Store Slider')->name('store');
            Route::get('/manage/{id}', [ProductController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Slider')->name('manage');
            Route::get('/{id}/view', [ProductController::class, 'view'])->middleware('role_or_permission:Super Admin|View Slider')->name('view');
            Route::delete('/destroy', [ProductController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Slider')->name('destroy');
            Route::get('/list', [ProductController::class, 'index'])->middleware('role_or_permission:Super Admin|List of Slider')->name('list');
        });

          #Review
  Route::prefix('review')->name('review.')->group(function () {
    Route::get('/create', [ReviewController::class, 'create'])->middleware('role_or_permission:Super Admin|Create Slider')->name('create');
    Route::post('/store', [ReviewController::class, 'store'])->middleware('role_or_permission:Super Admin|Customer|Store Slider')->name('store');
    Route::get('/manage/{id}', [ReviewController::class, 'manage'])->middleware('role_or_permission:Super Admin|Manage Slider')->name('manage');
    Route::get('/view', [ReviewController::class, 'view'])->middleware('role_or_permission:Super Admin|View Slider')->name('view');
    Route::delete('/destroy', [ReviewController::class, 'destroy'])->middleware('role_or_permission:Super Admin|Delete Slider')->name('destroy');
    Route::get('/list', [ReviewController::class, 'index'])->middleware('role_or_permission:Super Admin|List of Slider')->name('list');
});


    #Cart
    Route::prefix('shopping')->name('shopping.')->group(function () {
        Route::get('/cartlist', [CartController::class, 'cartList'])->name('cartlist');
        Route::post('/carts', [CartController::class, 'addToCart'])->name('carts.store');
        Route::post('/update-cart', [CartController::class, 'updateCart'])->name('carts.update');
        // Route::delete('/remove', [CartController::class, 'removeFromCart'])->name('remove');
        Route::delete('/remove',[CartController::class, 'removeCart'])->name('remove');

    });







});
