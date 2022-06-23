@extends('admin.layouts.main')

@push('style')
  <style>
    .form-control-file {
      margin-block-start: 1rem;
    }

    #image-preview {
      width: 350px;
      height: 350px;

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
          <h1 class="m-0">Edit Testimoni {{ str($testimonial->name)->title() }}</h1>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('main-content')
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <form action="{{ route('admin.testimonial.update', [$testimonial->id]) }}" method="POST"
              enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $testimonial->name) }}"
                   class="form-control" placeholder="Nama">

            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mb-3">
            <label for="comment">Komentar</label>
            <textarea type="number" name="comment" id="comment"
                      class="form-control" placeholder="Komentar"
            >{{ old('comment', $testimonial->comment) }}</textarea>

            @error('comment')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mb-3">
            <div>
              <label for="photo" class="d-block">Foto</label>
              <small>Ukuran gambar kotak</small>
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

          <div class="form-group mb-3 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-danger">Batal</a>
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
      @if (str($testimonial->customer_photo_path)->trim()->isNotEmpty && is_file_exists($testimonial->customer_photo_path))
      imagePreview.parentElement.removeAttribute('hidden');
      imagePreview.style.backgroundImage = `url('{{ Storage::url($testimonial->customer_photo_path) }}')`;
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
