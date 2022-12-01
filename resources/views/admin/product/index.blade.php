@extends('admin.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sản Phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Thêm Sản Phẩm</h4>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route('sanpham.create') }}" class="text-white"><button class="btn btn-success sm"><i
                        class="uil-plus"></i>
                    Thêm sản phẩm mới</button></a>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-bordered border-primary table-centered mb-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Mô Tả</th>
                        <th>Hình Ảnh</th>
                        <th>Giá</th>
                        <th>Danh Mục</th>
                        <th>Số Lượng</th>
                        {{-- <th class="text-center">Chỉnh Sửa</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if ($sanphams->count() > 0)
                        @foreach ($sanphams as $sanpham)
                            <tr>
                                <td>{{ $sanpham->id }}</td>
                                <td>{{ $sanpham->ten_sp }}</td>
                                <td>{{ $sanpham->mo_ta }}</td>
                                <td><img src="{{ $sanpham->hinh_anh }}" width="150px" height="70px"></td>
                                <td>{{ $sanpham->gia }}</td>
                                <td>{{ $sanpham->danhmuc->ten_danh_muc }}</td>
                                <td>{{ $sanpham->so_luong }}</td>
                                <td class="table-action text-center">
                                    <a href="{{ route('sanpham.edit', ['id' => $sanpham->id]) }}" class="action-icon"> <i
                                            class=" uil-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="7">Chưa có sản phẩm nào.</td>
                        </tr>
                    @endif

                </tbody>
            </table>
            {{ $sanphams->links() }}
        </div>
    </div>
@endsection
@section('script')
    <script>
        /* Delete confirmation script */
        $('#confirm-delete').on(
            'show.bs.modal',
            function(e) {
                $(this).find('#confirm-header').text(
                    "Xác nhận xóa \"" +
                    $(e.relatedTarget).data('label') +
                    "\"");
                $(this).find('.btn-ok').attr(
                    'href',
                    '/sanpham/delete/' +
                    ;
            });
    </script>
@endsection
