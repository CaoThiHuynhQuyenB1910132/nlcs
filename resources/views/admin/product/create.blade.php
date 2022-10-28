@extends('admin.layout.app')
@section('content')
<form action="{{route('sanpham.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="simpleinput" class="form-label">Tên Sản Phẩm</label>
        <input type="text" id="simpleinput" class="form-control" name="ten_sp">
        @error('ten_sp')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="simpleinput" class="form-label">Mô Tả</label>
        <input type="text" id="simpleinput" class="form-control" name="mo_ta">
        @error('mo_ta')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="simpleinput" class="form-label">Hình Ảnh</label>
        <input type="file" accept="image/*" id="simpleinput" class="form-control" name="hinh_anh">
        @error('hinh_anh')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="simpleinput" class="form-label">Giá</label>
        <input type="text" id="simpleinput" class="form-control" name="gia">
        @error('gia')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="simpleinput" class="form-label">Số Lượng</label>
        <input type="text" id="simpleinput" class="form-control" name="so_luong">
        @error('so_luong')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <button class="btn btn-success" type="submit">Thêm Sản Phẩm</button>
</form>
@endsection