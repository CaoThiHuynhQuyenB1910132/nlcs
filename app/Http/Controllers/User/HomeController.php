<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanphams = SanPham::orderBy('created_at','desc')->take(4)->get();
        // dd($sanphams);
        return view('client.home.index',compact('sanphams'));
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
    public function show($id)
    {
        //
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

    public function productDetail($id){
        $chitiet_sp = SanPham::findOrFail($id);
        return view('client.product.detail',compact('chitiet_sp'));
    }

    public function showAll(){
        $danhmucs = DanhMuc::all();
        $sanphams = SanPham::orderBy('id', 'desc')->paginate(12);

        return view('client.product.list-product', compact('sanphams', 'danhmucs'));
    }

    public function spDanhMuc($id){
        $danhmucs = DanhMuc::all();
        $danhmuc = DanhMuc::findOrFail($id);
        $sanphams = $danhmuc->sanphams()->orderBy('id','desc')->paginate(12);
        return view('client.product.category-product',compact('sanphams','danhmucs'));
    }
}
