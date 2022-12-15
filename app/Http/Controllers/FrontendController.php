<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Package;
use App\Models\Service;
use App\Models\Category;
use App\Models\Clothes;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function service()
    {
        $data['category'] = Category::all();
        $data['service1'] = Package::where('id', '<=' , 6)->get();
        $data['service2'] = Package::where('id', '>=' , 7)->where('id', '<=' , 12)->get();
        $data['service3'] = Package::where('id', '>=' , 13)->where('id', '<=' , 15)->get();
        return view('frontend.service', compact('data'));
    }
    public function service_detail(Request $request, Package $package)
    {
        // $data['service'] = Package::with(['category'])->find($package);
        // dd($data);
        return view('frontend.service_detail', compact('package'));
    }
    public function checkout(Request $request, Package $package)
    {
        // $data['service'] = Package::find($id);
        return view('frontend.checkout', compact('package'));
    }
    public function checkout_post(Request $request)
    {
        $request->validate([
            'package_id' => ['required'],
            'phone' => ['required', 'min:8'],
            'address' => ['required'],
            'order_by' => ['required'],
        ]);

        // dd($request->all());
        $atr = new Transaction();
        $atr->code_order = Str::random(6);
        $atr->customer_id = Auth::user()->id;
        $atr->package_id = $request->package_id;
        $atr->phone = $request->phone;
        $atr->address = $request->address;
        $atr->order_by = $request->order_by;
        $atr->status = 'Pending';
        $atr->created_at = Carbon::now();
        $atr->save();

        return redirect()->route('fe.checkout.clear');
        // return view('frontend.checkout_clear');
    }
    public function checkout_clear(Request $request)
    {
        // $data['transaction'] = Transaction::where('status', 'Proses')->where('tgl_penerimaan', '=', NULL)->latest('id')->get()->first();
        // return view('frontend.checkout_clear', compact('data'));
        return view('frontend.checkout_clear');
    }
    public function testimonial()
    {
        return view('frontend.testimonial');
    }
    public function history()
    {
        $data['history'] = Transaction::with(['customer', 'package'])->where('customer_id', Auth::user()->id)->latest('id')->get();
        return view('frontend.history', compact('data'));
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
        $atr->qty = 1;
        $atr->detail = $request->detail;
        $atr->created_at = Carbon::now();
        $atr->save();

        return redirect()->route('fe.history_detail', $id);
    }
}
