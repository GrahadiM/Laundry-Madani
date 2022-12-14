<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class PackageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:package-list|package-create|package-edit|package-delete', ['only' => ['index','show']]);
         $this->middleware('permission:package-create', ['only' => ['create','store']]);
         $this->middleware('permission:package-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:package-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Package::with('category')->latest('id')->get();
        return view('admin.packages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.packages.create', compact('categories'));
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
            'category_id' => 'required',
            'name' => 'required',
            'body' => 'required',
        ]);

        $dt = new Package;
        $dt->category_id = $request->category_id;
        $dt->name = $request->name;
        $dt->slug = Str::slug($request->name);
        $dt->price = $request->price;
        $dt->qty = $request->qty;
        $dt->type = $request->type;
        $dt->body = $request->body;
        $dt->created_at = now();
        $dt->save();

        return redirect()->route('admin.packages.index')
                        ->with('success','Package created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dt = Package::find($id);
        return view('admin.packages.show',compact('dt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dt = Package::find($id);
        $categories = Category::all();
        return view('admin.packages.edit',compact('dt','categories'));
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
        request()->validate([
            'category_id' => 'required',
            'name' => 'required',
            'body' => 'required',
        ]);
        $dt = Package::find($id);
        $dt->category_id = $request->category_id;
        $dt->name = $request->name;
        $dt->slug = Str::slug($request->name);
        $dt->price = $request->price;
        $dt->qty = $request->qty;
        $dt->type = $request->type;
        $dt->body = $request->body;
        $dt->created_at = now();
        $dt->update();

        return redirect()->route('admin.packages.index')
                        ->with('success','Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dt = Package::find($id);
        $dt->delete();

        return redirect()->route('admin.packages.index')
                        ->with('success','Package deleted successfully');
    }
}
