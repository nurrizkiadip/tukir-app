@extends('guest.layouts.main')

@section('title', 'Geleri')

@push('style')
  <style>
    #gallery .menu-image {
      width: 350px !important;
      height: 300px !important;

      object-fit: cover;
      object-position: center;
    }
  </style>
@endpush

@section('main-content')
  <!--Page header & Title-->
  <section id="page_header">
    <div class="page_title">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title">Gallery</h2>
            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="gallery" class="padding-top">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="work-filter">
            <ul class="text-center">
              <li><a href="javascript:;" data-filter="all" class="active filter">Semua</a></li>
              <li><a href="javascript:;" data-filter=".foods" class="filter">Makanan</a></li>
              <li><a href="javascript:;" data-filter=".drinks" class="filter">Minuman</a></li>
              <li><a href="javascript:;" data-filter=".caterings" class="filter">Katering</a></li>
              {{-- <li><a href="javascript:;" data-filter=".dinner" class="filter">Lauk Tambahan</a></li>
              <li><a href="javascript:;" data-filter=".lunch" class="filter">Minuman Sehat</a></li> --}}
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="zerogrid">
          <div class="wrap-container">
            <div class="wrap-content clearfix">

              @foreach ($menus['makanan'] as $food)
                <div class="col-1-3 mix work-item foods heading_space">
                  <div class="wrap-col">
                    <div class="item-container">
                      <div class="image">
                        @if (Storage::disk('public')->exists($food->photo_path))
                          <img class="menu-image" src="{{ Storage::url($food->photo_path) }}" alt="{{ $food->name }}"/>
                        @else
                          <img class="menu-image" src="{{ $food->photo_path }}" alt="{{ $food->name }}"/>
                        @endif
                        <div class="overlay">
                          <a class="fancybox overlay-inner" href="#" data-fancybox-group="gallery"><i
                              class=" icon-eye6"></i></a>
                        </div>
                      </div>
                      <div class="gallery_content">
                        <h3><a href="recepi_detail.html">{{ $food->name }}</a></h3>
                        <p>{{ $food->category->name }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

              @foreach ($menus['minuman'] as $drink)
                <div class="col-1-3 mix work-item drinks heading_space">
                  <div class="wrap-col">
                    <div class="item-container">
                      <div class="image">
                        @if (Storage::disk('public')->exists($drink->photo_path))
                          <img class="menu-image" src="{{ Storage::url($drink->photo_path) }}"
                               alt="{{ $drink->name }}"/>
                        @else
                          <img class="menu-image" src="{{ $drink->photo_path }}" alt="{{ $drink->name }}"/>
                        @endif
                        <div class="overlay">
                          <a class="fancybox overlay-inner" href="#" data-fancybox-group="gallery"><i
                              class=" icon-eye6"></i></a>
                        </div>
                      </div>
                      <div class="gallery_content">
                        <h3><a href="recepi_detail.html">{{ $drink->name }}</a></h3>
                        <p>{{ $drink->category->name }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

              @foreach ($menus['katering'] as $catering)
                <div class="col-1-3 mix work-item caterings heading_space">
                  <div class="wrap-col">
                    <div class="item-container">
                      <div class="image">
                        @if (Storage::disk('public')->exists($catering->photo_path))
                          <img class="menu-image" src="{{ Storage::url($catering->photo_path) }}"
                               alt="{{ $catering->name }}"/>
                        @else
                          <img class="menu-image" src="{{ $catering->photo_path }}" alt="{{ $catering->name }}"/>
                        @endif
                        <div class="overlay">
                          <a class="fancybox overlay-inner" href="#" data-fancybox-group="gallery"><i
                              class=" icon-eye6"></i></a>
                        </div>
                      </div>
                      <div class="gallery_content">
                        <h3><a href="recepi_detail.html">{{ $catering->name }}</a></h3>
                        <p>{{ $catering->category->name }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@push('script')
  <script>
    $(document).ready(function () {

    });
  </script>
@endpush
