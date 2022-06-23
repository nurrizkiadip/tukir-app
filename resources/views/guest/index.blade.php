@extends('guest.layouts.main')

@section('title', 'Beranda')

@push('style')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin=""/>
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
          integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
          crossorigin=""></script>
  <style>
    .testimonial-image {
      width: 250px !important;
      height: 250px !important;

      object-fit: cover;
      object-position: center;
    }

    #locations #location-map {
      height: 600px;
    }

    /* MENU KAMI */
    #services .menu_widget {
      height: 300px;
      overflow-y: auto;
    }

    /* width */
    #services .menu_widget::-webkit-scrollbar {
      width: 5px;
    }

    /* Track */
    #services .menu_widget::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    #services .menu_widget::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    #services .menu_widget::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    /* UNGGULAN KAMI */
    #services #service-slider .image img {
      width: 290px !important;
      height: 250px !important;

      object-fit: cover;
      object-position: center;
    }

    #gallery .menu-image {
      width: 350px !important;
      height: 300px !important;

      object-fit: cover;
      object-position: center;
    }
  </style>
@endpush

@section('main-content')
  <!-- REVOLUTION SLIDER -->
  <div id="rev_slider_34_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="news-gallery34"
       style="margin:0px auto;background-color:#ffffff;padding:0px;margin-top:0px;margin-bottom:0px;">
    <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
    <div id="rev_slider_34_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
      <!-- SLIDE -->
      <ul>
        @foreach ($events as $event)
          <li data-index="rs-129" data-transition="fade" data-slotamount="default" data-rotate="0"
              data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-title="Pecel &nbsp; Madiun"
              data-description="Pecel dengan bumbu Madiun asli">
            <!-- MAIN IMAGE -->
            @if (is_file_exists($event->photo_path))
              <img src="{{ Storage::url($event->photo_path) }}" data-bgposition="center center" data-bgfit="contain"
                   data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
            @else
              <img src="{{ asset('images/banner1.jpg') }}" data-bgposition="center center" data-bgfit="contain"
                   data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
            @endif

            <!-- LAYER NR. 2 -->
            <h1 class="tp-caption tp-resizeme"
                data-x="left" data-hoffset="15"
                data-y="70"
                data-transform_idle="o:1;"
                data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                data-start="500"
                data-splitin="none"
                data-splitout="none"
                style="z-index: 6;">
              <span class="small_title">Pecel Madiun Mbok Mi</span><br>
              Rasa &nbsp; Madiun &nbsp; Asli &nbsp;<span class="color">Terbaik</span>
            </h1>

            <!-- LAYER NR. 2 -->
            <p class="tp-caption tp-resizeme"
               data-x="left" data-hoffset="15"
               data-y="210"
               data-transform_idle="o:1;"
               data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
               data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
               data-mask_out="x:0;y:0;s:inherit;e:inherit;"
               data-start="800"
               style="z-index: 9;">
              Dibuat dari Bumbu Pecel Terbaik di Madiun<br>Dengan Olahan Yang Segar Setiap Saatnya.
            </p>

            <div class="tp-caption fade tp-resizeme"
                 data-x="left" data-hoffset="15"
                 data-y="280"
                 data-width="full"
                 data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                 data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
                 data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                 data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                 data-start="1200"
                 style="z-index: 12;">
            </div>
          </li>
        @endforeach

        <li data-index="rs-129" data-transition="fade" data-slotamount="default" data-rotate="0"
            data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-title="Pecel &nbsp; Madiun"
            data-description="Pecel dengan bumbu Madiun asli">
          <!-- MAIN IMAGE -->
          <img src="images/pecel-bener.png" alt="" data-bgposition="center center" data-bgfit="contain"
               data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
          <!-- LAYER NR. 2 -->
          <h1 class="tp-caption tp-resizeme"
              data-x="left" data-hoffset="15"
              data-y="70"
              data-transform_idle="o:1;"
              data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
              data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
              data-mask_out="x:0;y:0;s:inherit;e:inherit;"
              data-start="500"
              data-splitin="none"
              data-splitout="none"
              style="z-index: 6;">
            <span class="small_title">Pecel Madiun Mbok Mi</span><br>
            Rasa &nbsp; Madiun &nbsp; Asli &nbsp;<span class="color">Terbaik</span>
          </h1>
          <!-- LAYER NR. 2 -->
          <p class="tp-caption tp-resizeme"
             data-x="left" data-hoffset="15"
             data-y="210"
             data-transform_idle="o:1;"
             data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
             data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
             data-mask_out="x:0;y:0;s:inherit;e:inherit;"
             data-start="800"
             style="z-index: 9;">
            Dibuat dari Bumbu Pecel Terbaik di Madiun<br>Dengan Olahan Yang Segar Setiap Saatnya.
          </p>
          <div class="tp-caption fade tp-resizeme"
               data-x="left" data-hoffset="15"
               data-y="280"
               data-width="full"
               data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
               data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
               data-mask_out="x:0;y:0;s:inherit;e:inherit;"
               data-start="1200"
               style="z-index: 12;">
          </div>
        </li>

        <li class="text-center" data-index="rs-130" data-transition="slideleft" data-slotamount="default"
            data-rotate="0" data-title="Rujak &nbsp; Cingur" data-description="Rujak Cingur dengan Bumbu Khas">
          <img src="images/pecel-bener-3.png" alt="" data-bgposition="center center" data-bgfit="contain"
               data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
          <h1 class="tp-caption tp-resizeme"
              data-x="center" data-hoffset="15"
              data-y="70"
              data-transform_idle="o:1;"
              data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
              data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
              data-mask_out="x:0;y:0;s:inherit;e:inherit;"
              data-start="500"
              data-splitin="none"
              data-splitout="none"
              style="z-index: 6;">
            <span class="small_title">Delicious Bakery Items</span><br>
            Coconut &nbsp; with &nbsp; <span class="color">Lemon &nbsp; Grass</span>
          </h1>
          <p class="tp-caption tp-resizeme"
             data-x="center" data-hoffset="15"
             data-y="210"
             data-transform_idle="o:1;"
             data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
             data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
             data-mask_out="x:0;y:0;s:inherit;e:inherit;"
             data-start="800"
             style="z-index: 9;">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit,<br>sed diam nonummy nibh euismod.
          </p>
          <div class="tp-caption fade tp-resizeme"
               data-x="center" data-hoffset="15"
               data-y="280"
               data-width="full"
               data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
               data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
               data-mask_out="x:0;y:0;s:inherit;e:inherit;"
               data-start="1200"
               style="z-index: 12;">
          </div>
        </li>

        <li class="text-right" data-index="rs-131" data-transition="slideleft" data-rotate="0"
            data-title="Tumpeng & &nbsp; Brokohan" data-description="Menerima Pesanan Tumpeng, Nasi box, dan Brokohan">
          <img src="images/pecel-bener-2.png" alt="" data-bgposition="center center" data-bgfit="contain"
               data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
          <h1 class="tp-caption tp-resizeme"
              data-x="right" data-hoffset=""
              data-y="70"
              data-transform_idle="o:1;"
              data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
              data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
              data-mask_out="x:0;y:0;s:inherit;e:inherit;"
              data-start="500"
              data-splitin="none"
              data-splitout="none"
              style="z-index: 6;">
            <span class="small_title">We Prepare</span> <br> Fresh &nbsp; Food &nbsp; <span class="color">Vegies</span>
          </h1>
          <p class="tp-caption tp-resizeme"
             data-x="right"
             data-hoffset=""
             data-y="210"
             data-transform_idle="o:1;"
             data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
             data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
             data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
             data-mask_out="x:0;y:0;s:inherit;e:inherit;"
             data-start="800"
             style="z-index: 9;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit,<br>sed diam nonummy nibh
            euismod.
          </p>

          <div class="tp-caption fade tp-resizeme"
               data-x="right" data-hoffset=""
               data-y="280"
               data-width="full"
               data-transform_idle="o:1;"
               data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
               data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;"
               data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
               data-mask_out="x:0;y:0;s:inherit;e:inherit;"
               data-start="1200"
               style="z-index: 12;">
          </div>
        </li>
        <!-- SLIDE -->
      </ul>
    </div>
  </div>
  <!-- END REVOLUTION SLIDER -->


  <!--Features Section-->
  <section class="feature_wrap padding-half" id="specialities">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="heading">Sajian&nbsp;Kami</h2>
          <hr class="heading_space">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6 feature text-center">
          <i class="icon-glass"></i>
          <h3><a href="services.html">Minuman</a></h3>
          <!-- Dinner &amp; Dessert-->
          <p> tersedia berbagai minuman hangat maupun dingin untuk memanjakan lidah pembeli.</p>
        </div>
        <div class="col-md-3 col-sm-6 feature text-center">
          <i class="icon-coffee"></i>
          <h3><a href="services.html">Makanan Sehat</a></h3>
          <p> Makanan yang rendah kalori serta baik untuk kesehatan tubuh tersedia dalam ciri khasnya tersendiri.</p>
        </div>
        <div class="col-md-3 col-sm-6 feature text-center">
          <i class="icon-glass"></i>
          <h3><a href="services.html">Gorengan</a></h3>
          <p> aneka gorengan dan sate sebagai lauk tambahan atau sekedar cemilan ringan.</p>
        </div>
        <div class="col-md-3 col-sm-6 feature text-center">
          <i class="icon-coffee"></i>
          <h3><a href="services.html">Makanan Khas Jatim</a></h3>
          <p> Makanan asli jawa timur yang khas akan bummbu asli jawa timuran.</p>
        </div>
      </div>
    </div>
  </section>


  <!--Services plus working hours-->
  <section id="services" class="padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h2 class="heading">Unggulan&nbsp;Kami</h2>
          <hr class="heading_space">
          <div class="slider_wrap">
            <div id="service-slider" class="owl-carousel">
              @foreach ($menus as $menu)
                <div class="item">
                  <div class="item_inner">
                    <div class="image">
                      @if (is_file_exists($menu->photo_path))
                        <img src="{{ Storage::disk('public')->url($menu->photo_path) }}" alt="{{ $menu->name }}"
                             width="120">
                      @else
                        <img src="images/food-1.jpg" alt="Services Image">
                      @endif
                    </div>
                    <h3>
                      <span>
                        {{ $menu->name }} ({{ strlen((string)$menu->price) > 3 ? str($menu->price)->substr(0, strlen((string)$menu->price)-3) . "K" : $menu->price }})
                      </span>
                    </h3>
                    <p>{{ $menu->description }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h2 class="heading">Menu&nbsp;kami</h2>
          <hr class="heading_space">
          <ul class="menu_widget">
            @foreach ($menus as $menu)
              <li>{{ $menu->name }}
                <span>{{ strlen((string)$menu->price) > 3 ? str($menu->price)->substr(0, strlen((string)$menu->price)-3) . "K" : $menu->price }}</span>
              </li>
            @endforeach
          </ul>
          <h3>Menu Special lainya</h3>
          <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse <strong>molestie consequat</strong>,
            vel illum dolore nulla facilisis.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- image with content -->
  <section class="info_section paralax">
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="text-center">
            <h2 class="heading_space">Paket Terlaris</h2>
            <p class="heading_space detail">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse
              molestie consequat, vel illum dolore nulla facilisis. velit esse molestie consequat, vel illum dolore
              nulla facilisis.</p>

          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>

  <!-- Food Gallery -->
  <section id="gallery" class="padding">
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

              @foreach ($menusGroupedByCat['makanan']->splice(0,3) as $menu)
                <div class="col-1-3 mix work-item foods heading_space">
                  <div class="wrap-col">
                    <div class="item-container">
                      <div class="image">
                        @if (Storage::disk('public')->exists($menu->photo_path))
                          <img class="menu-image" src="{{ Storage::url($menu->photo_path) }}" alt="cook"/>
                        @else
                          <img class="menu-image" src="{{ $menu->photo_path }}" alt="cook"/>
                        @endif
                        <div class="overlay">
                          <a class="fancybox overlay-inner" href="#" data-fancybox-group="gallery"><i
                              class=" icon-eye6"></i></a>
                        </div>
                      </div>
                      <div class="gallery_content">
                        <h3><a href="recepi_detail.html">{{ $menu->name }}</a></h3>
                        <p>{{ $menu->category->name }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

              @foreach ($menusGroupedByCat['minuman']->splice(0,3) as $menu)
                <div class="col-1-3 mix work-item drinks heading_space">
                  <div class="wrap-col">
                    <div class="item-container">
                      <div class="image">
                        @if (Storage::disk('public')->exists($menu->photo_path))
                          <img class="menu-image" src="{{ Storage::url($menu->photo_path) }}" alt="cook"/>
                        @else
                          <img class="menu-image" src="{{ $menu->photo_path }}" alt="cook"/>
                        @endif
                        <div class="overlay">
                          <a class="fancybox overlay-inner" href="#" data-fancybox-group="gallery"><i
                              class=" icon-eye6"></i></a>
                        </div>
                      </div>
                      <div class="gallery_content">
                        <h3><a href="recepi_detail.html">{{ $menu->name }}</a></h3>
                        <p>{{ $menu->category->name }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

              @foreach ($menusGroupedByCat['katering']->splice(0,3) as $menu)
                <div class="col-1-3 mix work-item caterings heading_space">
                  <div class="wrap-col">
                    <div class="item-container">
                      <div class="image">
                        @if (Storage::disk('public')->exists($menu->photo_path))
                          <img class="menu-image" src="{{ Storage::url($menu->photo_path) }}" alt="cook"/>
                        @else
                          <img class="menu-image" src="{{ $menu->photo_path }}" alt="cook"/>
                        @endif
                        <div class="overlay">
                          <a class="fancybox overlay-inner" href="#" data-fancybox-group="gallery"><i
                              class=" icon-eye6"></i></a>
                        </div>
                      </div>
                      <div class="gallery_content">
                        <h3><a href="recepi_detail.html">{{ $menu->name }}</a></h3>
                        <p>{{ $menu->category->name }}</p>
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

  <!-- Our cheffs -->
  <section id="cheffs" class="padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="heading">Testimoni &nbsp;Paket &nbsp;Kami</h2>
          <hr class="heading_space">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="cheffs_wrap_slider">
            <div id="our-cheffs" class="owl-carousel">
              @forelse ($testimonials as $testimonial)
                <div class="item">
                  <div class="cheffs_wrap">
                    @if (str($testimonial->customer_photo_path)->trim()->isNotEmpty() && is_file_exists($testimonial->customer_photo_path))
                      <img class="testimonial-image" id="customer-photo"
                           src="{{ Storage::disk('public')->url($testimonial->customer_photo_path) }}"
                           alt="{{ $testimonial->name }}">
                    @else
                      <img class="testimonial-image" src="images/our-cheffs2.jpg" alt="Pemesan Tak Dikenal">
                    @endif

                    <h3>{{ $testimonial->name }}</h3>
                    <small>Pemesan</small>
                    <p>{{ $testimonial->comment }}</p>
                  </div>
                </div>
              @empty

              @endforelse
              <div class="item">
                <div class="cheffs_wrap">
                  <img src="images/our-cheffs2.jpg" alt="Kitchen Staff">
                  <h3>Omah Michelle</h3>
                  <small>Pemesan</small>
                  <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                </div>
              </div>
              <div class="item">
                <div class="cheffs_wrap">
                  <img src="images/our-cheffs3.jpg" alt="Kitchen Staff">
                  <h3>Bapa bayu</h3>
                  <small>Pemesan</small>
                  <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                </div>
              </div>
              <div class="item">
                <div class="cheffs_wrap">
                  <img src="images/our-cheffs1.jpg" alt="Kitchen Staff">
                  <h3>Ibu Dina</h3>
                  <small>Pemesan</small>
                  <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                </div>
              </div>
              <div class="item">
                <div class="cheffs_wrap">
                  <img src="images/our-cheffs2.jpg" alt="Kitchen Staff">
                  <h3>Opah Kusnadi</h3>
                  <small>Pemesan</small>
                  <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                </div>
              </div>
              <div class="item">
                <div class="cheffs_wrap">
                  <img src="images/our-cheffs3.jpg" alt="Kitchen Staff">
                  <h3>Kale Barep</h3>
                  <small>Pemesan</small>
                  <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Lokasi -->
  <section id="locations" class="padding">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2 class="heading">Lokasi</h2>
          <hr class="heading_space">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div id="location-map"></div>
        </div>
      </div>
    </div>
  </section>
@endsection


@push('script')
  <!-- Leaflet -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
          integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
          crossorigin=""></script>
  {{-- <script src="{{ asset('leaflet/leaflet.ajax.min.js') }}"></script> --}}

  <script type="text/javascript">
    const mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>';
    const accessToken = '{!! config('app.mb_access_token') !!}';
    const mbUrl = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}';

    const grayscale = L.tileLayer(mbUrl, {
      id: 'mapbox/light-v9',
      tileSize: 512,
      zoomOffset: -1,
      attribution: mbAttr,
      accessToken: accessToken
    });
    const streets = L.tileLayer(mbUrl, {
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      attribution: mbAttr,
      accessToken: accessToken
    });
    const satellite = L.tileLayer(mbUrl, {
      id: 'mapbox/satellite-v9',
      tileSize: 512,
      zoomOffset: -1,
      attribution: mbAttr,
      accessToken: accessToken
    });
    const dark = L.tileLayer(mbUrl, {
      id: 'mapbox/dark-v10',
      tileSize: 512,
      zoomOffset: -1,
      attribution: mbAttr,
      accessToken: accessToken
    });
    const openStreetMap = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution: "&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors",
    });

    // Create Layer group for all kelurahan
    const baseMaps = {
      "<span style='color: gray'>Grayscale</span>": grayscale,
      "Streets": streets,
      "Satellite": satellite,
      "OpenStreetMap": openStreetMap,
      "Dark": dark
    };

    // Define instance of map
    const map = L.map('location-map', {
      center: [-6.275659740442136, 106.97481421274584],
      zoom: 16.5,
      layers: [openStreetMap]
    });
    L.marker([-6.275659740442136, 106.97481421274584]).addTo(map);

    const layerControl = L.control.layers(baseMaps).addTo(map);

  </script>
@endpush
