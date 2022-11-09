<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProDuctController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanphams = SanPham::orderBy('id', 'desc')->paginate(4);
        return view('admin.product.index', compact('sanphams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmucs = DanhMuc::all();

        if($danhmucs->count() == 0){
            Session::flash('info', 'Vui lòng thêm danh mục trước!');
            return redirect()->back();
        }

        return view('admin.product.create',compact('danhmucs'));
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
                'ten_sp' => 'required',
                'mo_ta' => 'required',
                'hinh_anh' => 'required',
                'gia' => 'required|numeric',
                'so_luong' => 'required|numeric',
                'danh_muc_id' => 'required',
            ],
            [
                'ten_sp.required' => 'Chưa nhập tên danh mục!',
                'ten_sp.unique' => 'Tên danh mục đã tồn tại, vui lòng nhập tên khác!',
                'mo_ta.required' => 'Chưa nhập mô tả!',
                'hinh_anh.required' => 'Chưa nhập hình ảnh!',
                'gia.numeric' => 'Chưa nhập giá!',
                'so_luong.numeric' => 'Chưa nhập số lượng!',
                'danh_muc_id.required' => 'Chưa Chọn Danh Mục!',
            ]
        );
       
        $sanpham = new SanPham();
        $hinh_anh = $request->hinh_anh;

        $hinh_anh_moi = time() . $hinh_anh->getClientOriginalName();
        $hinh_anh->move('upload/', $hinh_anh_moi);

        $sanpham = SanPham::create([
            'ten_sp' => $request->ten_sp,
            'mo_ta' => $request->mo_ta,
            'hinh_anh' => 'upload/' . $hinh_anh_moi,
            'gia' => $request->gia,
            'so_luong' => $request->so_luong,
            'danh_muc_id' => $request->danh_muc_id,
        ]);
        $sanpham->save();
        Session::flash('success', 'Thêm sản phẩm thành công!');
        return redirect()->back();
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
        $sanpham = SanPham::findOrFail($id);
        $danhmucs = DanhMuc::all();

        return view('admin.product.edit', compact('sanpham','danhmucs'));
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
                'ten_sp' => 'required',
                'mo_ta' => 'required',
                'hinh_anh' => 'required',
                'gia' => 'required|numeric',
                'so_luong' => 'required|numeric',
                'danh_muc_id' => 'required',
            ],
            [
                'ten_sp.required' => 'Chưa nhập tên danh mục!',
                'ten_sp.unique' => 'Tên danh mục đã tồn tại, vui lòng nhập tên khác!',
                'mo_ta.required' => 'Chưa nhập mô tả!',
                'hinh_anh.required' => 'Chưa nhập hình ảnh!',
                'gia.numeric' => 'Chưa nhập giá!',
                'so_luong.numeric' => 'Chưa nhập số lượng!',
                'danh_muc_id.required' => 'Chưa Chọn Danh Mục!',
            ]
        );
        $sanpham = SanPham::findOrFail($id); 
        
        $hinh_anh = $request->hinh_anh;
        $hinh_anh_moi = time() . $hinh_anh->getClientOriginalName();
        $hinh_anh->move('upload/', $hinh_anh_moi);

        $sanpham->hinh_anh='upload/'.$hinh_anh_moi;
        $sanpham->ten_sp= $request->ten_sp;
        $sanpham->mo_ta=$request->mo_ta;
        $sanpham->gia=$request->gia;
        $sanpham->id_danhmuc = $request->id_danhmuc;
        $sanpham->so_luong=$request->so_luong;

        $sanpham->save();

    
        Session::flash('success', 'Cập nhật thành công!');
        return redirect()->route('sanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $co_hinh_anh = $sanpham->hinh_anh;
        if (File::exists($co_hinh_anh)) {
            File::delete($co_hinh_anh);
        }

        $sanpham->delete();
        Session::flash('success', 'Xóa thành công.');
        return redirect()->route('sanpham.index');
    }
}
