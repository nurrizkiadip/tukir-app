@extends('admin.layouts.main')

@push('style')
@endpush

@section('header-content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0">Edit Kategori Menu {{ str($category->name)->title() }}</h1>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('main-content')
  <div class="container-fluid">
    <div class="row mb-4">
      <div class="col">
        <form action="{{ route('admin.category.update', [$category->id]) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="form-control" placeholder="Nama">

            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group mb-3 d-flex justify-content-end" style="gap: .5rem">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('admin.menu.index') }}" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
@endpush