<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $danhmucs = DanhMuc::orderBy('id', 'desc')->paginate(4);

        return view('admin.category.index', compact('danhmucs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'ten_danh_muc' => 'required|unique:danh_mucs'
            ],
            [
                'ten_danh_muc.required' => 'Chưa nhập tên danh mục!',
                'ten_danh_muc.unique' => 'Tên danh mục đã tồn tại, vui lòng nhập tên khác!'

            ]
        );
        $danhmuc = new DanhMuc();
        $danhmuc->ten_danh_muc = $request->ten_danh_muc;
        $danhmuc->save();
        Session::flash('success', 'Thêm danh mục thành công!');
        return redirect()->back();
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuc = DanhMuc::findOrFail($id);

        return view('admin.category.edit', compact('danhmuc'));
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
        $this->validate(
            $request,
            [
                'ten_danh_muc' => 'required|unique:danh_mucs'
            ],
            [
                'ten_danh_muc.required' => 'Chưa nhập tên danh mục!',
                'ten_danh_muc.unique' => 'Tên danh mục đã tồn tại, vui lòng nhập tên khác!'

            ]
        );
        $danhmuc = DanhMuc::findOrFail($id);
        $danhmuc->ten_danh_muc = $request->ten_danh_muc;
        $danhmuc->save();
        Session::flash('success', 'Cập nhật danh mục thành công!');
        return redirect()->route('danhmuc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        // dd($danhmuc->sanphams->count());
        if ($danhmuc->sanphams->count() > 0) {
            Session::flash('error', 'Vui lòng xóa sản phẩm liên quan!');
            return redirect()->back();
        } else {
            $danhmuc->delete();
            Session::flash('success', 'Xóa thành công.');
            return redirect()->route('danhmuc.index');
        }
    }
}
