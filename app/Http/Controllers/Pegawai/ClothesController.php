<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\Clothes;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClothesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:clothes-list|clothes-create|clothes-edit|clothes-delete', ['only' => ['index','show']]);
         $this->middleware('permission:clothes-create', ['only' => ['create','store']]);
         $this->middleware('permission:clothes-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:clothes-delete', ['only' => ['destroy']]);
    }

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
        return view('pegawai.clothes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $dt = new Clothes;
        $dt->transaction_id = $request->tr_id;
        $dt->name = $request->name;
        $dt->qty = $request->qty;
        $dt->detail = $request->detail;
        $dt->created_at = now();
        $dt->save();

        return redirect()->route('pegawai.clothes.show', $request->tr_id)
                        ->with('success','Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,$id)
    {
        $tr = Transaction::find($id);
        $data = Clothes::where('transaction_id', $id)->get();
        return view('pegawai.clothes.index',compact('data','tr'));
    }

    public function clothes_detail(Request $request ,$id)
    {
        $data = Clothes::with('transaction')->where('transaction_id', $id)->get();
        return view('pegawai.clothes.index',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tr = Clothes::with('transaction')->findOrFail($id);
        return view('pegawai.clothes.edit',compact('tr'));
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
        $tr = Clothes::find($id);
        $tr->delete();
        return redirect()->back()->with('success','Transaction deleted successfully.');
    }
}
