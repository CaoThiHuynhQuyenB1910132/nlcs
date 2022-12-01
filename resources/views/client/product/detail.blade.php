@extends('client.layout.app')
@section('content')
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{$chitiet_sp->hinh_anh}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{$chitiet_sp->ten_sp}}</h2>
          <p>{{$chitiet_sp->mo_ta}}</p>
          <p><strong class="text-primary h4">{{$chitiet_sp->gia}} VNĐ</strong></p>
          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 120px;">
            <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">

          </div>

          </div>    
          <p><a href="{{ route('add.to.cart', $chitiet_sp->id) }}" class="buy-now btn btn-sm btn-primary">Thêm vào giỏ hàng</a></p>

        </div>
      </div>
    </div>
  </div>
@endsection