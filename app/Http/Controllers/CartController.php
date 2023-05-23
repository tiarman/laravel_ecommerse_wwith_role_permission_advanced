<?php
// namespace App\Http\Controllers\Gloudemans\Shoppingcart\Cart;
namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = Cart::content();
        // $data ['category'] = Category::where('status', '=', Category::$statusArray[0])->get();
        // dd($cartItems);
        // return $cartItems;
        return view('site.cart.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        // return $request;
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->selling_price,
            'stock_quantity' => $request->stock_quantity,
            'weight' => '1',
            'qty' => '1',
            'attributes' => array(
                'image' => $request->image,
                // 'user_id'=>$request->user_is,
                'subcategory_id' => $request->subcategory_id,

            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
//        return \Cart::getContent();
$message = "Card Added Successfully";
return RedirectHelper::routeSuccess('shopping.cartlist', $message);
    }

    public function removeCart(Request $request)
    {
        // return $request;
        Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('shopping.cartlist');
    }



}
