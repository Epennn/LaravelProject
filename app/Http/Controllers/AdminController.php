<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function viewHome() {
        $products = Product::simplePaginate(8);

        return view('adminHome', ["products" => $products]);
    }

    public function viewDetail($id) {
        $product = Product::where('id', $id)->first();

        return view('adminProductDetail', ["product" => $product]);
    }

    public function viewSearch() {
        $products = Product::simplePaginate(8);

        return view('adminSearch', ["products" => $products]);
    }

    public function searchProduct(Request $request) {
        $products = Product::where('name', 'LIKE', "%$request->nama%")->simplePaginate(8);

        return view('adminSearch', ["products" => $products]);
    }

    public function viewProfile() {
        return view('adminProfile');
    }

    public function viewAddItem() {
        return view('addItem');
    }

    public function addItem(Request $request) {
        $validation = [
            'image' => 'required | image',
            'name' => 'required | min: 5 | max: 20',
            'description' => 'required | min:5',
            'price' => 'required | numeric | gte: 1000',
            'stock' => 'required | numeric | gte: 1'
        ];

        $validator = Validator::make($request->all(), $validation);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $file = $request->file('image');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $fileName);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->image = $fileName;

        $product->save();

        return redirect()->to('/adminHome');
    }

    public function deleteProduct($id) {
        $product = Product::where('id', $id)->first();

        $transaction = Transaction::where('status', 0)->get();
        if(!empty($transaction)) {
            foreach ($transaction as $t) {
                $transaction_detail = TransactionDetail::where('transaction_id', $t->id)->where('product_id', $product->id)->first();
                if(!empty($transaction_detail)) {
                    $t->total_price -= $transaction_detail->price;
                    $t->total_qty -= $transaction_detail->qty;
                    $t->update();
                }
            }
        }

        $product->delete();

        return redirect()->to('/adminHome');
    }
}
