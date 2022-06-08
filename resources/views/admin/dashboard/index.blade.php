@extends('admin.layouts.main')

@push('style')
  <link rel="stylesheet" href="{{ asset('plugins/chart.js/Chart.min.css') }}">
@endpush

@section('header-content')

@endsection

@section('main-content')
  <div class="container-fluid">
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row" style="gap:1.5rem">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <b style="font-size:1.2rem">Statistik Menu</b>
          </div>
          <div class="card-body">
            <canvas id="menu-statistic" width="400" height="400"></canvas>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <b style="font-size:1.2rem">Statistik Event</b>
          </div>
          <div class="card-body">
            <canvas id="event-statistic" width="400" height="400"></canvas>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <b style="font-size:1.2rem">Statistik Testimonial</b>
          </div>
          <div class="card-body">
            <canvas id="testimonial-statistic" width="400" height="400"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

  <script>
    $('document').ready(function () {
      const menuStatistic = document.getElementById('menu-statistic').getContext('2d');
      const eventStatistic = document.getElementById('event-statistic').getContext('2d');
      const testimonialStatistic = document.getElementById('testimonial-statistic').getContext('2d');
      
      // Chart of Menu
      const menuChartData = {
        labels: [
          '{{ $months[0] }}', '{{ $months[1] }}', '{{ $months[2] }}', 
          '{{ $months[3] }}', '{{ $months[4] }}', '{{ $months[5] }}', 
          '{{ $months[6] }}',
        ],
        datasets: [
          {
            label: 'Digital Goods',
            fill: false,

            backgroundColor: 'dodgerblue',
            borderColor: 'dodgerblue',
            borderWidth: 4,
            tension: 0.1,

            pointBorderWidth: 7,
            pointHoverBorderWidth: 5,
            pointColor: 'blue',
            pointStrokeColor: 'blue',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'blue',
            data: [
              '{{ $menusCountPerMonth[0] }}', '{{ $menusCountPerMonth[1] }}', '{{ $menusCountPerMonth[2] }}', 
              '{{ $menusCountPerMonth[3] }}', '{{ $menusCountPerMonth[4] }}', '{{ $menusCountPerMonth[5] }}', 
              '{{ $menusCountPerMonth[6] }}',
            ],
          },
        ],
      };
      const menuChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: { display: false },
        scales: {
          xAxes: [{ gridLines: { display: false } }],
          yAxes: [{ gridLines: { display: false } }],
        },
      };
      const menuChart = new Chart(menuStatistic, {
        type: 'line',
        data: menuChartData,
        options: menuChartOptions,
      });
      
      // Chart of Event
      const eventChartData = {
        labels: [
          '{{ $months[0] }}', '{{ $months[1] }}', '{{ $months[2] }}', 
          '{{ $months[3] }}', '{{ $months[4] }}', '{{ $months[5] }}', 
          '{{ $months[6] }}',
        ],
        datasets: [
          {
            label: 'Digital Goods',
            fill: false,

            backgroundColor: 'dodgerblue',
            borderColor: 'dodgerblue',
            borderWidth: 4,
            tension: 0.1,

            pointBorderWidth: 7,
            pointHoverBorderWidth: 5,
            pointColor: 'blue',
            pointStrokeColor: 'blue',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'blue',
            data: [
              '{{ $eventsCountPerMonth[0] }}', '{{ $eventsCountPerMonth[1] }}', '{{ $eventsCountPerMonth[2] }}', 
              '{{ $eventsCountPerMonth[3] }}', '{{ $eventsCountPerMonth[4] }}', '{{ $eventsCountPerMonth[5] }}', 
              '{{ $eventsCountPerMonth[6] }}',
            ],
          },
        ],
      };
      const eventChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: { display: false },
        scales: {
          xAxes: [{ gridLines: { display: false } }],
          yAxes: [{ gridLines: { display: false } }],
        },
      };
      const eventChart = new Chart(eventStatistic, {
        type: 'line',
        data: eventChartData,
        options: eventChartOptions,
      });
      
      // Chart of testimonial
      const testimonialChartData = {
        labels: [
          '{{ $months[0] }}', '{{ $months[1] }}', '{{ $months[2] }}', 
          '{{ $months[3] }}', '{{ $months[4] }}', '{{ $months[5] }}', 
          '{{ $months[6] }}',
        ],
        datasets: [
          {
            label: 'Digital Goods',
            fill: false,

            backgroundColor: 'dodgerblue',
            borderColor: 'dodgerblue',
            borderWidth: 4,
            tension: 0.1,

            pointBorderWidth: 7,
            pointHoverBorderWidth: 5,
            pointColor: 'blue',
            pointStrokeColor: 'blue',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'blue',
            data: [
              '{{ $testimonialsCountPerMonth[0] }}', '{{ $testimonialsCountPerMonth[1] }}', '{{ $testimonialsCountPerMonth[2] }}', 
              '{{ $testimonialsCountPerMonth[3] }}', '{{ $testimonialsCountPerMonth[4] }}', '{{ $testimonialsCountPerMonth[5] }}', 
              '{{ $testimonialsCountPerMonth[6] }}',
            ],
          },
        ],
      };
      const testimonialChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: { display: false },
        scales: {
          xAxes: [{ gridLines: { display: false } }],
          yAxes: [{ gridLines: { display: false } }],
        },
      };
      const testimonialChart = new Chart(testimonialStatistic, {
        type: 'line',
        data: testimonialChartData,
        options: testimonialChartOptions,
      });
    });
  </script>
@endpush