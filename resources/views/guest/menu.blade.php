@extends('guest.layouts.main')

@section('title', 'Daftar Menu')

@section('main-content')
  <!--Page header & Title-->
  <section id="page_header">
    <div class="page_title">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title">Menu</h2>
            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Pricings-->
  <section id="pricing" class="padding-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="heading">Makanan</h2>
          <hr class="heading_space">
        </div>
        <div class="col-sm-6">
          <div class="price padding-bottom">
            <div class="price_body">
              <ul class="pricing_feature">
                @foreach ($menus['makanan'] as $food)
                  <li>
                    {{ $food->name }}
                    <strong>Rp {{ strlen((string)$food->price) > 3 ? str($food->price)->substr(0, strlen((string)$food->price)-3) . "K" : $food->price }}</strong>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h2 class="heading">Minuman</h2>
          <hr class="heading_space">
        </div>
        <div class="col-sm-6">
          <div class="price padding-bottom">
            <div class="price_body">
              <ul class="pricing_feature">
                @foreach ($menus['minuman'] as $drink)
                  <li>
                    {{ $drink->name }}
                    <strong>Rp {{ strlen((string)$drink->price) > 3 ? str($drink->price)->substr(0, strlen((string)$drink->price)-3) . "K" : $drink->price }}</strong>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <h2 class="heading">Menu Katering</h2>
          <hr class="heading_space">
        </div>
        <div class="col-sm-6">
          <div class="price padding-bottom">
            <div class="price_body">
              <ul class="pricing_feature">
                @foreach ($menus['katering'] as $catering)
                  <li>
                    {{ $catering->name }}
                    <strong>Rp {{ strlen((string)$catering->price) > 3 ? str($catering->price)->substr(0, strlen((string)$catering->price)-3) . "K" : $catering->price }}</strong>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
