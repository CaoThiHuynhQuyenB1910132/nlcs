@extends('admin.layout.app')
@section('content')
<a href="{{ route('danhmuc.create') }}" class="text-white"><button class="btn btn-success sm"><i
    class="uil-plus"></i> Thêm danh mục mới</button></a>
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
    <div class="table-responsive-sm">
        <table class="table table-bordered border-primary table-centered mb-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Danh Mục</th>
                    <th class="text-center">Chỉnh Sửa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($danhmucs as $danhmuc)
                <tr>
                    <td>{{$danhmuc->id}}</td>
                    <td>{{$danhmuc->ten_danh_muc}}</td>
                    <td class="table-action text-center">
                        <a href="{{ route('danhmuc.edit', ['id'=>$danhmuc->id])}}" class="action-icon"> <i class=" uil-edit"></i></a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{$danhmucs->links()}}
    </div> <!-- end table-responsive-->
@endsection