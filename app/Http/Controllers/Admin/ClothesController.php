<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clothes;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:clothes-list|clothes-create|clothes-edit|clothes-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:clothes-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:clothes-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:clothes-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $data = Clothes::where('transaction_id', $request->transaction_id)->get();
        return view('admin.clothes.index',compact('data'));
    }

    public function clothes_detail(Request $request ,$id)
    {
        // $id = $request->transaction_id;
        $data = Clothes::where('transaction_id', $request->transaction_id)->get();
        return view('admin.clothes.index',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
