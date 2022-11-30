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
    public function service_detail(Request $request, $id)
    {
        $data['service'] = Package::find($id);
        // dd($data);
        return view('frontend.service_detail', compact('data'));
    }
    public function checkout(Request $request, $id)
    {
        $data['service'] = Package::find($id);
        return view('frontend.checkout', compact('data'));
    }
    public function checkout_post(Request $request)
    {
        // dd($request->all());
        $atr = new Transaction();
        $atr->code_order = Str::random(6);
        $atr->customer_id = Auth::user()->id;
        $atr->package_id = $request->package_id;
        $atr->phone = $request->phone;
        $atr->address = $request->address;
        $atr->order_by = $request->order_by;
        $atr->status = 'Proses';
        $atr->created_at = Carbon::now();
        $atr->save();
        return view('frontend.checkout_clear');
    }
    public function testimonial()
    {
        return view('frontend.testimonial');
    }
    public function history()
    {
        $data['history'] = Transaction::with(['customer', 'package'])->where('customer_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('frontend.history', compact('data'));
    }
    public function history_detail($id)
    {
        $data['clothes'] = Clothes::with('transaction')->where('transaction_id', $id)->get();
        return view('frontend.history_detail', compact('data'));
    }
}
