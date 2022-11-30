<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        if (auth()->user()->hasRole('admin'))
            return view('admin.dashboard.index', [
                'title' => 'Dashboard',
                'user' => User::all()->count(),
                'category' => '',
                'service' => '',
                'transaction' => '',
                'demo' => '',
                'careers' => '',
                'form_careers' => '',
            ]);
        else
            return redirect()->route('fe.index');
    }
}
