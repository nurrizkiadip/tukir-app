@extends('admin.layouts.main')

@push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('main-content')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <b style="font-size:1.2rem">Daftar Menu</b>
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
              <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i>Menu
              </a>
            </div>
          </div>

          <table id="menus-table" class="table table-sm" style="width: 100%">
            <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Kategori</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Spesial</th>
              <th class="text-center">Harga</th>
              <th class="text-center">Dibuat pada</th>
              <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($menus as $menu)
              <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $menu->category->name }}</td>
                <td>{{ $menu->name }}</td>
                <td class="text-center">{{ $menu->is_special ? 'Ya' : 'Tidak' }}</td>
                <td class="text-center">
                  Rp {{ strlen((string)$menu->price) > 3 ? str($menu->price)->substr(0, strlen((string)$menu->price)-3) . "K" : $menu->price }}</td>
                <td class="text-center">
                  {{ parse_date_to_iso_format($menu->created_at) }}
                </td>
                <td class="text-right d-flex justify-content-center align-items-center flex-wrap" style="gap:0.5rem;">
                  <a href="{{ route('admin.menu.show', [$menu->id]) }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="{{ route('admin.menu.edit', [$menu->id]) }}" class="btn btn-sm btn-warning">
                    <i class="fas fa-pen"></i>
                  </a>
                  <form action="{{ route('admin.menu.destroy', [$menu->id]) }}" class="d-none" method="POST">
                    @csrf
                    @method('DELETE')
                  </form>
                  <a href="{{ route('admin.menu.destroy', [$menu->id]) }}" class="btn btn-sm btn-danger"
                     onclick="event.preventDefault();event.target.previousElementSibling.submit();"
                  ><i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
            @empty
            @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <!-- DataTables  & Plugins -->
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
      $('#menus-table').DataTable({
        "info": true,
        "scrollX": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "autoWidth": true,
        "responsive": true,

        pageLength: 15,
      });
      $('#menu-category-table').DataTable({
        "info": true,
        "scrollX": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "autoWidth": true,
        "responsive": true,

        pageLength: 5,
      });
    });
  </script>
@endpush
