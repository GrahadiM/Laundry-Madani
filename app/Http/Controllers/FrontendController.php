<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Clothes;
use App\Models\Package;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\OrderPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $data['service'] = Package::latest('id')->get();
        return view('frontend.index', $data);
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function service()
    {
        $data['category'] = Category::all();
        $data['service'] = Package::latest('id')->get();
        return view('frontend.service', $data);
    }

    public function service_detail(Request $request, Package $package)
    {
        return view('frontend.service_detail', compact('package'));
    }

    public function checkout(Request $request)
    {
        $carts = Cart::with('package')->where('customer_id', Auth::user()->id)->get();
        $total = 0;
        $cost = 0;
        foreach ($carts as $item) {
            $total += $item['qty']*$item['package']->price;
            $cost = $item['qty']*$item['package']->price;
        }

        return view('frontend.checkout', [
            'data' => $carts,
            'total' => $total,
            'cost' => $cost,
        ]);
    }

    public function post_checkout(Request $request)
    {
        $request->validate([
            'bukti_tf' => 'nullable|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'required|min:8',
            'address' => 'required',
            'order_by' => 'required',
            'total' => 'required',
            'status' => 'required',
            'tgl_penjemputan' => 'required',
            'tgl_pengantaran' => 'required',
        ]);

        // dd($request->all());
        $atr = new Transaction();
        $atr->customer_id = Auth::user()->id;
        $atr->employe_id = 2;
        $atr->code_order = rand();
        $atr->total = $request->total;
        $atr->phone = $request->phone;
        $atr->address = $request->address;
        $atr->status = $request->status;
        $atr->order_by = $request->order_by;
        $atr->tgl_penjemputan = $request->tgl_penjemputan;
        $atr->tgl_pengantaran = $request->tgl_pengantaran;
        // $bukti_tf = $request->file('bukti_tf');
        // $destinationPath = 'images/bukti_tf/';
        // $buktiTF = date('YmdHis') . "." . $bukti_tf->getClientOriginalExtension();
        // $bukti_tf->move($destinationPath, $buktiTF);
        // $atr->bukti_tf = $buktiTF;
        $atr->save();
        // dd($atr->all());

        $tr = Transaction::latest()->first();
        $carts = Cart::with('package')->where('customer_id', Auth::user()->id)->get();
        foreach ($carts as $item) {

            $atr = new OrderPackage;
            $atr->transaction_id = $tr->id;
            $atr->package_id = $item->package->id;
            $atr->qty = $item->qty == null ? 1 : $item->qty;
            $atr->save();

            Cart::destroy($item->id);
        }

        return redirect()->route('fe.invoice')->with('Sukses', 'Data Berhasil Ditambahkan, Silahkan Melakukan Pembayaran di Tempat!');
        // return view('frontend.checkout_clear');
    }

    public function invoice()
    {
        $data['transaksi'] = Transaction::with('customer')->where('customer_id', Auth::user()->id)->latest('id')->first();
        $data['items'] = OrderPackage::where('transaction_id', $data['transaksi']->id)->get();
        return view('frontend.invoice', $data);
    }

    public function print_invoice($id)
    {
        $data['transaksi'] = Transaction::with('customer')->where('customer_id', Auth::user()->id)->where('id', $id)->first();
        $data['items'] = OrderPackage::where('transaction_id', $data['transaksi']->id)->get();
        return view('frontend.invoice', $data);
    }

    public function history()
    {
        $data['items'] = Transaction::with(['customer', 'package'])->where('customer_id', Auth::user()->id)->latest('id')->get();
        return view('frontend.history', $data);
    }

    public function history_detail($id)
    {
        $data['dt'] = Transaction::find($id);
        $data['clothes'] = Clothes::with('transaction')->where('transaction_id', $id)->get();
        return view('frontend.history_detail', compact('data'));
    }

    public function clothes($id)
    {
        $data['dt'] = Transaction::find($id);
        $data['clothes'] = Clothes::where('transaction_id', $id)->get();
        // dd($data['clothes']);
        return view('frontend.clothes', compact('data'));
    }

    public function clothes_post(Request $request)
    {
        $request->validate([
            'transaction_id' => ['required'],
            'name' => ['required'],
        ]);

        $id = $request->transaction_id;
        // dd($request->all());
        $atr = new Clothes();
        $atr->transaction_id = $id;
        $atr->name = $request->name;
        $atr->qty = $request->qty == NULL ? 1 : $request->qty;
        $atr->detail = $request->detail;
        $atr->created_at = Carbon::now();
        $atr->save();

        return redirect()->route('fe.history_detail', $id);
    }

    public function cart()
    {
        $carts = Cart::with('package')->where('customer_id', Auth::user()->id)->get();
        $total = 0;
        foreach ($carts as $item) {
            $total += $item['qty']*$item['package']->price;
        }

        return view('frontend.cart', [
            'data' => $carts,
            'total' => $total,
        ]);
    }

    public function post_cart(Request $request)
    {
        $atr = Cart::with('package')->where([
			['customer_id', Auth::user()->id],
			['package_id', $request->package_id],
		])->first();

		$qty = $request->qty == null ? 1 : $request->qty;
		$new = false;
		if (!$atr) {
			$atr = new Cart();
			$new = true;
		}

        $atr->customer_id = Auth::user()->id;
        $atr->package_id = $request->package_id;
        if ($new) {

            $atr->qty = $qty;
        } else {
            $atr->qty = $atr->qty + $qty;
        }
        $atr->save();

        return redirect()->route('fe.service')->with('Sukses', 'Data Berhasil Ditambahkan');
    }

    public function update_cart(Request $request, $id)
    {
        $atr = Cart::findOrFail($id);

        $atr->qty = $request->qty;
        $atr->update();

        return back()->with('Sukses', 'Data Berhasil Diubah');
    }

    public function delete_cart($id)
    {
        Cart::destroy($id);

        return back()->with('Sukses', 'Data Berhasil Dihapus');
    }
}
