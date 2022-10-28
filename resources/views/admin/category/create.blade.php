@extends('admin.layout.app')
@section('content')
<div class="container">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục</a></li>
                        <li class="breadcrumb-item active">Thêm danh mục</li>
                    </ol>
                </div>
                <h4 class="page-title">Thêm danh mục</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
<form action="{{route('danhmuc.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="simpleinput" class="form-label">Tên Danh Mục</label>
        <input type="text" id="simpleinput" class="form-control" name="ten_danh_muc">
        @error('ten_danh_muc')
        <span class="text-danger">{{$message}}</span>
            
        @enderror
    </div>
    <button class="btn btn-success" type="submit">Thêm Danh Mục</button>
</form>
@endsection