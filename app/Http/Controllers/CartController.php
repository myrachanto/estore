<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use Validator;
use Gloudemans\Shoppingcart;

class CartController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showcart()
    {
        return view('home.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem) use ($request) {
            return $cartItem->id === $request->id;
            
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your cart!');
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect('cart')->withSuccessMessage('Item was added to your cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric'
        ]);

         if ($validator->fails()) {
            session()->flash('message', 'Quantity must be numeric.');
            return response()->json(['success' => false]);
         }

        Cart::update($id, $request->quantity);
        session()->flash('message', 'Quantity was updated successfully!');

        return redirect('cart')->withSuccessMessage('Item was updated in your cart!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('Item has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Your cart has been cleared!');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your Wishlist!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
                                  ->associate('App\Product');

        return redirect('cart')->withSuccessMessage('Item has been moved to your Wishlist!');

    }
}
