@extends('admin.layouts.main')

@push('style')
  <style>
    .form-control-file {
      margin-block-start: 1rem;
    }

    #image-preview {
      width: 400px;
      height: 400px;

      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      display: block;
    }
  </style>
@endpush

@section('header-content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0">Edit Event {{ str($event->title)->title() }}</h1>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('main-content')
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <form action="{{ route('admin.event.update', [$event->id]) }}" name="event-form" method="POST"
              enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" class="form-control"
                   placeholder="Judul Event">

            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control-file"
                      placeholder="Deskripsi" rows="3" style="resize: vertical"
            >{{ old('description', $event->description) }}</textarea>

            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mb-3">
            <div>
              <label for="photo" class="d-block">Foto</label>
              <small class="d-block text-muted">Ukuran gambar: lebar minimal 1200px dan tinggi minimal 600px</small>
            </div>
            <div class="image-preview" hidden>
              <span id="image-preview"></span>
            </div>
            <div class="input-file">
              <input type="file" id="photo" name="photo" class="form-control-file"
                     placeholder="Foto" accept="image/png, image/jpeg">
            </div>

            @error('photo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mb-3 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('admin.event.index') }}" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>

    </div>
  </div>
@endsection

@push('script')
  <script>
    $('document').ready(function () {
      const imagePreview = document.getElementById('image-preview');

      // Show Current Image
      @if (is_file_exists($event->photo_path))
      imagePreview.parentElement.removeAttribute('hidden');
      imagePreview.style.backgroundImage = `url('{{ Storage::url($event->photo_path) }}')`;
      @endif

      // Show New Selected Image
      $('#photo').change((event) => {
        const photo = event.target.files[0];

        if (!photo) return;

        const reader = new FileReader();
        reader.onload = (e) => {

          imagePreview.parentElement.removeAttribute('hidden');
          imagePreview.style.backgroundImage = `url('${e.target.result}')`;
        }

        reader.readAsDataURL(photo);
      });
    });
  </script>
@endpush
