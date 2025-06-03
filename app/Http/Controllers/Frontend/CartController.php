<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cup;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('frontend.cart.index', compact('cart'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('frontend.cart.checkout', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $cup = Cup::findOrFail($id);

        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $cup->name,
                'price' => $cup->price,
                'image' => $cup->image,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'تم إضافة الكوب إلى السلة.');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'تم حذف المنتج من السلة.');
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'سلة التسوق فارغة.');
        }

        DB::beginTransaction();

        try {

            $order = Order::create([
                'user_id' => auth()->id() ?? null,
                'total' => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
                'status' => 'pending', 
            ]);

            foreach ($cart as $cupId => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'cup_id' => $cupId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            session()->forget('cart');

            DB::commit();

            return redirect()->route('home')->with('success', 'تم إنشاء الطلب بنجاح.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout')->with('error', 'حدث خطأ أثناء معالجة الطلب.');
        }
    }

}
