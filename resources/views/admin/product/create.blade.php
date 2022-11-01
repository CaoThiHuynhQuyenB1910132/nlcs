@extends('admin.layout.app')
@section('content')
   <div class="container"><!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Sản Phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm sản phẩm</li>
                    </ol>
                </div>
                <h4 class="page-title">Thêm sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('sanpham.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Tên Sản Phẩm</label>
            <input type="text" id="simpleinput" class="form-control" name="ten_sp">
            @error('ten_sp')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Mô Tả</label>
            <input type="text" id="simpleinput" class="form-control" name="mo_ta">
            @error('mo_ta')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Hình Ảnh</label>
            <input type="file" accept="image/*" id="simpleinput" class="form-control" name="hinh_anh">
            @error('hinh_anh')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="simpleinput" class="form-label">Giá</label>
            <input type="text" id="simpleinput" class="form-control" name="gia">
            @error('gia')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Số Lượng</label>
            <input type="text" id="simpleinput" class="form-control" name="so_luong">
            @error('so_luong')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="simpleinput" class="form-label">Chọn Danh Mục</label>
            <select class="form-control mb-3 select2" data-toggle="select2" name="id_danhmuc" id="danhmuc">
                @foreach ($danhmucs as $danhmuc)
                    <option value="{{ $danhmuc->id }}">{{ $danhmuc->ten_danh_muc }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">Thêm Sản Phẩm</button>
        </div>
    </form>
   </div>
@endsection
