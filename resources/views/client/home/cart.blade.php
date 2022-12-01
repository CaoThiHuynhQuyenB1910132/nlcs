@extends('client.layout.app')
@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table id="cart" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-total">Thành tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td class="product-thumbnail">
                                                <img src="{{ $details['image'] }}" alt="Image" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $details['name'] }}</h2>
                                            </td>
                                            <td>{{ $details['price'] }} VND</td>
                                            <td>
                                                <div class="input-group mb-3" style="max-width: 120px;">
                               
                                                    <input type="text"
                                                        class="form-control text-center quantity update-cart"
                                                        value="{{ $details['quantity'] }}" placeholder=""
                                                        aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1">
                                                   
                                                </div>

                                            </td>
                                            <td>{{ $details['quantity'] * $details['price'] }}</td>
                                            <td><a href="#" class="btn btn-primary btn-sm remove-from-cart">X</a></td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="/" class="btn btn-outline-primary btn-sm btn-block">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Tổng tiền:</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Tổng tiền:</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">${{ $total }} VND</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg py-3 btn-block"
                                        onclick="window.location='checkout.html'">Thanh Toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.quantity-change-btn').click(function() {
            $(".update-cart").trigger('change');
        });
        $(".update-cart").on('change', function(e) {
            e.preventDefault();
            var ele = $(this);
            console.log(ele.parents("tr").attr("data-id") + ' - ' + ele.parents("tr").find(".quantity").val())

            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Xác nhận xóa khỏi giỏ hàng?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
