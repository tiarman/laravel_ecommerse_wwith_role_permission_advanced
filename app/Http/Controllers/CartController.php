<?php
// namespace App\Http\Controllers\Gloudemans\Shoppingcart\Cart;
namespace App\Http\Controllers;

use App\Helper\RedirectHelper;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // $data ['category'] = Category::where('status', '=', Category::$statusArray[0])->get();
        // dd($cartItems);
        // foreach ($cartItems as $cartItem) {
        //     $image = $cartItem->getAttributes()['image'];
        // return $image;
        // return $cartItems;
        // return $cartItems->attributes['image'];
        return view('site.cart.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {

        // \Cart::add(array(
        //     'id' => $request->id, // inique row ID
        //     'name' => $request->name,
        //     'price' => $request->selling_price,
        //     'quantity' => $request->stock_quantity,
        //     'image' => $request->image,
        //     'attributes' => array()
        // ));
        // $message = "Card Added Successfully";
        // return RedirectHelper::routeSuccess2('shopping.cartlist', $message);
        // return session()->all();
        // Log::info('Data received in addToCart:', $request->all());
        if ($request->discount_price==NULL){
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->selling_price,
                'quantity' => 1,
                'image' => $request->image,
                'weight' => '1',
                'qty' => '1',
                'attributes' => array(
                    'image' => $request->image,
                    'discount_price' => $request->discount_price,
                    'stock_quantity' => $request->stock_quantity,
                    // 'user_id'=>$request->user_is,
                    'subcategory_id' => $request->subcategory_id,

                )
            ]);

        }else
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->discount_price,
            'quantity' => 1,
            'image' => $request->image,
            'weight' => '1',
            'qty' => '1',
            'attributes' => array(
                'image' => $request->image,
                'discount_price' => $request->discount_price,
                'stock_quantity' => $request->stock_quantity,
                // 'user_id'=>$request->user_is,
                'subcategory_id' => $request->subcategory_id,

            )
        ]);
        // return $request;
        session()->flash('success', 'Product is Added to Cart Successfully !');
        //        return \Cart::getContent();
        $message = "Card Added Successfully";
        return RedirectHelper::routeSuccess2('shopping.cartlist', $message);
    }


    // public function addToCart(Request $request)
    // {
    //     // return session()->all();
    //     $product = Product::findOrFail($request->input('product_id'));
    //     return $product;
    //     cart::add(
    //         $product->id,
    //         $product->name,
    //         $product->selling_price,
    //         $request->input('stock_quantity')
    //     );
    //     $message = "Card Added Successfully";
    //     return RedirectHelper::routeSuccess2('shopping.cartlist', $message);
    // }

    public function removeCart($id)
    {

        // $cart = \Cart::getContent()->value('rowId');
        \Cart::remove($id);
        // // session()->flash('success', 'Item Cart Remove Successfully !');
        // $userID = auth()->id();
        // \Cart::session($userID)->remove($cart);

        $message = 'Item Cart Remove Successfully !';
        return RedirectHelper::routeSuccess('shopping.cartlist', $message);
    }
}
