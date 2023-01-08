<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $data['pending'] = Transaction::with('customer','employe','category')->where('status', 'Pending')->latest('id')->get();
            $data['proses'] = Transaction::with('customer','employe','category')->where('status', 'Proses')->latest('id')->get();

            return view('admin.dashboard.index', [
                'title' => 'Dashboard',
                'user' => User::all()->count(),
                'category' => Category::all()->count(),
                'package' => Package::all()->count(),
                'transaction' => Transaction::all()->count(),
                'pending' => $data['pending'],
                'proses' => $data['proses'],
            ]);
        }
        elseif (auth()->user()->hasRole('pegawai')) {
            $data['pending'] = Transaction::with('customer','employe','category')->where('status', 'Pending')->latest('id')->get();
            $data['proses'] = Transaction::with('customer','employe','category')->where('status', 'Proses')->latest('id')->get();

            return view('pegawai.dashboard.index', [
                'title' => 'Dashboard',
                // 'user' => User::all()->count(),
                'transaction' => Transaction::all()->count(),
                'pending' => $data['pending'],
                'proses' => $data['proses'],
            ]);
        }
        else {
            return redirect()->route('fe.service');
        }
    }
}
