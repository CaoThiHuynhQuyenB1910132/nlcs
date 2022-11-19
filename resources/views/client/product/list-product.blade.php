@extends('client.layout.app')
@section('content')
<div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <a class="dropdown-item" href="#">Men</a>
                    <a class="dropdown-item" href="#">Women</a>
                    <a class="dropdown-item" href="#">Children</a>
                  </div>
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                    <a class="dropdown-item" href="#">Relevance</a>
                    <a class="dropdown-item" href="#">Name, A to Z</a>
                    <a class="dropdown-item" href="#">Name, Z to A</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Price, low to high</a>
                    <a class="dropdown-item" href="#">Price, high to low</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">

            @foreach ($sanphams as $sanpham)
            <div class="col-sm-6 col-lg-4 mb-4 aos-init aos-animate" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="{{ route('productDetail', ['id'=>$sanpham->id]) }}"><img src="{{$sanpham->hinh_anh}}" alt="Image placeholder" class="img-fluid"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="{{ route('productDetail', ['id'=>$sanpham->id]) }}">{{$sanpham->ten_sp}}</a></h3>
                    <p class="mb-0">{{$sanpham->mo_ta}}</p>
                    <p class="text-primary font-weight-bold">{{$sanpham->gia}} VNĐ</p>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
          <div class="row aos-init" data-aos="fade-up">
            {{-- <div class="col-md-12 text-center">
              <div class="site-block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
            </div> --}}
            {{$sanphams->links()}}
          </div>
        </div>

        @include('client.layout.left-sidebar')
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="site-section site-blocks-2">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 site-section-heading pt-4">
                  <h2>Categories</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0 aos-init" data-aos="fade" data-aos-delay="">
                  <a class="block-2-item" href="#">
                    <figure class="image">
                      <img src="images/women.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">Collections</span>
                      <h3>Women</h3>
                    </div>
                  </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0 aos-init" data-aos="fade" data-aos-delay="100">
                  <a class="block-2-item" href="#">
                    <figure class="image">
                      <img src="images/children.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">Collections</span>
                      <h3>Children</h3>
                    </div>
                  </a>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0 aos-init" data-aos="fade" data-aos-delay="200">
                  <a class="block-2-item" href="#">
                    <figure class="image">
                      <img src="images/men.jpg" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                      <span class="text-uppercase">Collections</span>
                      <h3>Men</h3>
                    </div>
                  </a>
                </div>
              </div>
            
          </div>
        </div>
      </div>
      
    </div>
  </div>
@endsection