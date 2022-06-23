@extends('admin.layouts.main')

@push('style')
@endpush

@section('header-content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0">Tambah Kategori Menu</h1>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('main-content')
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <form action="{{ route('admin.category.store') }}" method="POST">
          @csrf

          <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nama">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mb-3 d-flex justify-content-end" style="gap: .5rem">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('admin.menu.index') }}" class="btn btn-danger">
              Batal
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <!-- Select2 -->
  <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

  <script>
    $('document').ready(function () {
      const imagePreview = document.getElementById('image-preview');

      $('#photo').change((event) => {
        const photo = event.target.files[0];

        if (!photo) return;

        const reader = new FileReader();
        reader.onload = (e) => {
          console.log(imagePreview.parentElement.nodeName);
          imagePreview.parentElement.removeAttribute('hidden');
          imagePreview.style.backgroundImage = `url('${e.target.result}')`;
        };
        reader.readAsDataURL(photo);
      });


      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });
  </script>
@endpush
