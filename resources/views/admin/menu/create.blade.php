@extends('admin.layouts.main')

@push('style')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <style>
    .form-control-file {
      margin-block-start: 1rem;
    }

    #image-preview {
      width: 400px;
      height: 400px;

      display: block;
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
    }
  </style>
@endpush

@section('header-content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col">
        <h1 class="m-0">Tambah Menu</h1>
      </div>
    </div>
  </div>
</div>
@endsection

@section('main-content')
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
    
          <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nama">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
    
          <div class="form-group mb-3">
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" 
              value="{{ old('price') }}" class="form-control" placeholder="Harga"
            >
            @error('price')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
    
          <div class="form-group mb-3">
            <label for="name">Deskripsi</label>
            <textarea type="text" name="description" rows="4"
              id="name" value="{{ old('description') }}"
              class="form-control" placeholder="Deskripsi"
            ></textarea>
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
    
          <div class="form-group mb-3">
            <label for="category">Kategori</label>
            <select class="form-control select2bs4" name="category" 
              id="category" style="width: 100%"
            >
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
    
            @error('category')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
    
          <div class="form-group mb-3">
            <div>
              <label for="photo" class="d-block mb-0">Foto</label>
              <small class="d-block text-muted">Ukuran gambar: lebar minimal 1200px dan tinggi minimal 600px</small>
            </div>
            <div class="image-preview" hidden>
              <span id="image-preview"></span>
            </div>
    
            <input type="file" id="photo" name="photo" class="form-control-file" 
              placeholder="Foto" accept="image/png, image/jpeg">
    
            @error('photo')
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

        if (! photo) return;

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