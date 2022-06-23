@extends('admin.layouts.main')

@push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <style>
    #customer-photo {
      width: 80px !important;
      height: 80px !important;

      object-fit: cover;
      object-position: center;
    }
  </style>
@endpush

@section('main-content')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          Daftar Testimoni Pelanggan
        </div>
        <div class="card-body">
          @if (session()->has('status') && session()->has('message'))
            <div class="alert alert-{{ session()->get('status') }} alert-dismissible fade show mb-4" role="alert">
              <span>{!! session()->get('message') !!}</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="card-tools mb-4">
            <div class="d-flex justify-content-end" style="gap: 1rem">
              <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i>Testimoni
              </a>
            </div>
          </div>

          <table id="testimonials-table" class="table table-sm" style="width: 100%">
            <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Komentar</th>
              <th class="text-center">Foto Pelanggan</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($testimonials as $testimonial)
              <tr>
                <th class="text-center">{{ $loop->iteration }}</th>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->comment }}</td>
                <td class="text-center">
                  @if (str($testimonial->customer_photo_path)->trim()->isNotEmpty() && is_file_exists($testimonial->customer_photo_path))
                    <img id="customer-photo" src="{{ Storage::disk('public')->url($testimonial->customer_photo_path) }}"
                         alt="{{ $testimonial->name }}">
                  @else
                    Tidak ada
                  @endif
                </td>
                <td class="text-right d-flex justify-content-center align-items-center flex-wrap" style="gap:0.5rem;">
                  <a href="{{ route('admin.testimonial.edit', [$testimonial->id]) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-pen mr-1"></i>Edit
                  </a>
                  <form action="{{ route('admin.testimonial.destroy', [$testimonial->id]) }}" class="d-none"
                        method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                  <a href="{{ route('admin.testimonial.destroy', [$testimonial->id]) }}" class="btn btn-sm btn-danger"
                     onclick="event.preventDefault();event.target.previousElementSibling.submit();"
                  ><i class="fas fa-trash mr-1"></i>Delete
                  </a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <!-- DataTables & Plugins -->
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

  <script>
    $('document').ready(function () {
      $('#testimonials-table').DataTable({
        "info": true,
        "scrollX": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>
@endpush
