<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function viewHome() {
        $products = Product::simplePaginate(8);

        return view('userHome', ["products" => $products]);
    }

    public function viewDetail($id) {
        $product = Product::where('id', $id)->first();

        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if(!empty($transaction)) {
            $transaction_detail = TransactionDetail::where('product_id', $product->id)->where('transaction_id', $transaction->id)->first();

            if(!empty($transaction_detail)) {
                return view('editCart', ["td" => $transaction_detail]);
            }
        }

        return view('productDetail', ["product" => $product]);
    }

    public function viewSearch() {
        $products = Product::simplePaginate(8);

        return view('search', ["products" => $products]);
    }

    public function searchProduct(Request $request) {
        $products = Product::where('name', 'LIKE', "%$request->nama%")->simplePaginate(8);

        return view('search', ["products" => $products]);
    }

    public function viewProfile() {
        return view('profile');
    }

    public function viewEditProfile() {
        return view('editProfile');
    }

    public function editProfile(Request $request) {
        $validation = [
            'username' => 'required | min:5 | max:20',
            'email' => 'required',
            'phone' => 'required | min:10 | max:13',
            'address' => 'required | min:5'
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::where('email', Auth::user()->email)->first();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();

        return redirect()->to('/profile');
    }

    public function viewCart() {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();

        return view('cart', ["transaction" => $transaction]);
    }

    public function addCart($id, Request $request) {
        $validation = [
            'qty' => 'required | gt: 0'
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $product = Product::where('id', $id)->first();
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(empty($transaction)) {
            $transaction = new Transaction;
            $transaction->user_id = Auth::user()->id;
            $transaction->date = date("Y-m-d");
            $transaction->total_price = 0;
            $transaction->total_qty = 0;
            $transaction->status = 0;
            $transaction->save();
        }

        $transaction_detail = TransactionDetail::where('product_id', $product->id)->where('transaction_id', $transaction->id)->first();

        if(empty($transaction_detail)) {
                $transaction_detail = new TransactionDetail();
                $transaction_detail->transaction_id = $transaction->id;
                $transaction_detail->product_id = $product->id;
                $transaction_detail->qty = $request->qty;
                $transaction_detail->price = $product->price * $request->qty;
                $transaction_detail->save();
        }

        $transaction->total_price += $product->price * $request->qty;
        $transaction->total_qty += $request->qty;
        $transaction->update();

        return redirect()->to('/cart');
    }

    public function viewEditCart($id) {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $transaction_detail = TransactionDetail::where('product_id', $id)->where('transaction_id', $transaction->id)->first();

        return view('editCart', ["td" => $transaction_detail]);
    }

    public function editCart($id, Request $request) {
        $validation = [
            'qty' => 'required | gt: 0'
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $product = Product::where('id', $id)->first();

        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $transaction_detail = TransactionDetail::where('product_id', $product->id)->where('transaction_id', $transaction->id)->first();

        $originalQty = $transaction_detail->qty;

        $transaction_detail->qty = $request->qty;
        $transaction_detail->price = $product->price * $request->qty;
        $transaction_detail->update();

        if($request->qty < $originalQty) {
            $transaction->total_price -= $product->price * ($originalQty - $request->qty);
            $transaction->total_qty -= $originalQty - $request->qty;
            $transaction->update();
        } else if($request->qty > $originalQty) {
            $transaction->total_price += $product->price * ($request->qty - $originalQty);
            $transaction->total_qty += $request->qty - $originalQty;
            $transaction->update();
        }

        return redirect()->to('/cart');
    }

    public function deleteItem($id) {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $transaction_detail = TransactionDetail::where('product_id', $id)->where('transaction_id', $transaction->id)->first();

        $transaction->total_price -= $transaction_detail->price;
        $transaction->total_qty -= $transaction_detail->qty;
        $transaction->update();

        $transaction_detail->delete();

        return redirect()->to('/cart');
    }

    public function checkOut() {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $transaction->status = 1;
        $transaction->update();

        return redirect()->to('/userHome');
    }

    public function viewHistory() {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 1)->get();

        return view('history', ["transaction" => $transaction]);
    }
}
