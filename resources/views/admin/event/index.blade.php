@extends('admin.layouts.main')

@push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('main-content')
<div class="row mb-4">
  <div class="col">
    <a href="{{ route('admin.event.create') }}" class="btn btn-primary">
      Tambah Event
    </a>
  </div>
</div>

<div class="row mb-4">
  <div class="col">
    @if (session()->has('status') && session()->has('message'))
      <div class="alert alert-{{session()->get('status')}} alert-dismissible fade show" role="alert">
        <span>{!! session()->get('message') !!}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  </div>
</div>

<div class="row">
  <div class="col"> 
    <table id="events-table" class="table table-sm" style="width: 100%">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Judul</th>
          <th class="text-center">Deskripsi</th>
          <th class="text-center">Foto</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($events as $event)
          <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $event->title }}</td>
            <td>{{ $event->description }}</td>
            <td>
              @if (is_file_exists($event->photo_path))
                <img src="{{ Storage::disk('public')->url($event->photo_path) }}" alt="{{ $event->title }}" width="120">
              @else
                Tidak ada Gambar
              @endif
            </td>
            <td class="text-right d-flex justify-content-center align-items-center flex-wrap" style="gap:0.5rem;">
              <a href="{{ route('admin.event.edit', [$event->id]) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-pen mr-1"></i>
                Edit
              </a>
              <form action="{{ route('admin.event.destroy', [$event->id]) }}" class="d-none" method="POST">
                @csrf
                @method('DELETE')
              </form>
              <a href="{{ route('admin.event.destroy', [$event->id]) }}" class="btn btn-sm btn-danger"
                onclick="event.preventDefault();event.target.previousElementSibling.submit();"
              ><i class="fas fa-trash mr-1"></i>Delete
              </a>
            </td>
          </tr>
        @empty
        @endforelse
        
      </tbody>
    </table>
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
  $('document').ready(function() {
    $('#events-table').DataTable({
      "info": true,
      "autoWidth": true,
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