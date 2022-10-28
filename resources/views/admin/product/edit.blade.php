@extends('admin.layout.app')
@section('content')
    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sản Phẩm</a></li>
                            <li class="breadcrumb-item active">Chỉnh Sửa Sản Phẩm:{{$sanpham->ten_sp}} </li>
                        </ol>
                    </div>
                    <h4 class="page-title">Chỉnh Sửa Sản Phẩm:{{$sanpham->ten_sp}} </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <form  action="{{ route('sanpham.update', ['id' => $sanpham->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
            <label for="simpleinput" class="form-label">Tên Sản Phẩm</label>
            <input value="{{$sanpham->ten_sp}} " type="text" id="simpleinput" class="form-control" name="ten_sp">
            @error('ten_sp')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Mô Tả</label>
            <input value="{{$sanpham->mo_ta}}" type="text" id="simpleinput" class="form-control" name="mo_ta">
            @error('mo_ta')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Hình Ảnh</label>
            <input value="" type="file" accept="image/*" id="simpleinput" class="form-control" name="hinh_anh">
            @error('hinh_anh')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Giá</label>
            <input value="{{$sanpham->gia}}" type="text" id="simpleinput" class="form-control" name="gia">
            @error('gia')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Số Lượng</label>
            <input value="{{$sanpham->so_luong}}" type="text" id="simpleinput" class="form-control" name="so_luong">
            @error('so_luong')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <button class="btn btn-success" type="submit">Cập Nhật Sản Phẩm</button>
        </form>


        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sản Phẩmn</a></li>
                            <li class="breadcrumb-item active">Xóa Sản Phẩm:{{$sanpham->ten_sp}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Xóa Sản Phẩm: {{$sanpham->ten_sp}}</h4>
                </div>
            </div>
        </div>
        <form action="{{ route('sanpham.destroy', $sanpham->id) }}" id="form-delete{{ $sanpham->id }}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit" data-id="{{ $sanpham->id }}">Xoá</button>
        </form>
    @endsection
