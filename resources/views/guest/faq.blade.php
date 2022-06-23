@extends('guest.layouts.main')

@section('title', 'FAQ')

@section('main-content')
  <!--Page header & Title-->
  <section id="page_header">
    <div class="page_title">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="title">Jawa Timur</h2>
            <p>Memiliki banyak makanan khas yang harus dilestarikan keberadaanya</p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="faq" class="padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="heading">Frequently ask Questions</h2>
          <hr class="heading_space">
          <div class='faq_wrapper'>
            <ul class='items'>
              <li>
                <a href='#'> Kenapa tidak ada cabang lain?</a>
                <ul class='sub-items'>
                  <li>
                    <p class="half_space">Belum adanya tempat yang layak dan strategis untuk dijadikan cabang kedua.</p>
                    <p>sebelumnya pernah ada cabang, hanya saja sulitnya mendapatkan orang yang bisa dipercaya untuk
                      mengelolanya..</p>
                  </li>
                </ul>
              </li>
              <li>
                <a href='#'>Tidak ada website yang terpampang di google</a>
                <ul class='sub-items'>
                  <li>
                    <p>Dikarenakan kendala personil pada periode sebelumnya yang belum terpenuhi</p>
                  </li>
                </ul>
              </li>
              <li>
                <a href='#'>Harga yang berubah - ubah</a>
                <ul class='sub-items'>
                  <li>
                    <p class="half_space">Tergantung dari harga bahan - bahan pasaran, sebisa mungkin kami mencari harga
                      terbaik dengan kualitas terbaik.</p>
                    <p>Mengikuti harga pasaran yang sedang berlangsung di daerah berjualan.</p>
                  </li>
                </ul>
              </li>
              <li>
                <a href='#'>Kenapa sambelnya pedas?</a>
                <ul class='sub-items'>
                  <li>
                    <p>sudah citarasa khas langsung dari Madiun bahwa sambel pecelnya kaya akan rasa pedas yang
                      khas.</p>
                  </li>
                </ul>
              </li>
              <li>
                <a href='#'>Tempat yang berada dipojokan</a>
                <ul class='sub-items'>
                  <li>
                    <p>Mengambil tempat yang strategis dan juga rindang agar terasa sejuk saat terkena paparan
                      matahari.</p>
                  </li>
                </ul>
              </li>
              <li>
                <a href='#'>Kenapa layanan pengantaran harus dengan mitra lain?</a>
                <ul class='sub-items'>
                  <li>
                    <p>untuk saat ini masih bekerjasama dengan mitra seperti gojek dan shopee agar bisa membantu sesama
                      dan memanfaatkan teknologi sebaik mungkin.</p>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
