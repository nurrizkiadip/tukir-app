@extends('admin.layouts.main')

@push('style')
  <style>
    .menu-title {
      font-size: 1.25rem;
      font-weight: 500;
    }

    .menu__photo_path-preview {
      width: 512px;
    }
  </style>
@endpush

@section('header-content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col">
          <a href="{{ route('admin.menu.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left mr-1"></i>Kembali</a>
        </div>
      </div>
      <div class="row mb-2">
        <div class="col">
          <h1 class="m-0">Detail Menu</h1>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('main-content')
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="menu__category">
          <h2 class="menu-title">Kategori</h2>
          <p>{{ $menu->category->name }}</p>
        </div>
        <div class="menu__name">
          <h2 class="menu-title">Nama</h2>
          <p>{{ $menu->name }}</p>
        </div>
        <div class="menu__price">
          <h2 class="menu-title">Harga</h2>
          <p>
            Rp {{
                    strlen((string)$menu->price) > 3 ?
                        str($menu->price)->substr(0, strlen((string)$menu->price)-3) . "K" :
                        $menu->price
                }}
          </p>
        </div>
        <div class="menu__description">
          <h2 class="menu-title">Deskripsi</h2>
          <p>{{ $menu->description }}</p>
        </div>
        <div class="menu__is_special">
          <h2 class="menu-title">Apakah spesial</h2>
          <p>{{ $menu->is_special ? 'Ya' : 'Tidak' }}</p>
        </div>
        <div class="menu__photo_path">
          <h2 class="menu-title">Gambar Menu</h2>
          <div>
            @if (is_file_exists($menu->photo_path))
              <img class="menu__photo_path-preview" src="{{ Storage::disk('public')->url($menu->photo_path) }}"
                   alt="{{ $menu->name }}">
            @else
              <img class="menu__photo_path-preview" src="{{ $menu->photo_path }}" alt="{{ $menu->name }}">
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
@endpush
