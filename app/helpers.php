<?php

if (!function_exists('parse_date_to_iso_format')) {
  function parse_date_to_iso_format(string $stringDate): string
  {
    return \Carbon\Carbon::parse($stringDate)
      ->locale(config('app.locale'))
      ->timezone(config('app.timezone'))
      ->isoFormat('LL');
  }
}

if (!function_exists('parse_date_to_sql_date_format')) {
  function parse_date_to_sql_date_format(string $stringDate): string
  {
    return \Carbon\Carbon::parse($stringDate)
      ->locale(config('app.locale'))
      ->timezone(config('app.timezone'))
      ->format('Y-m-d');
  }
}

if (!function_exists('is_file_exists')) {
  function is_file_exists(string $path, string $disk = 'public'): string
  {
    return Illuminate\Support\Facades\Storage::disk($disk)->exists($path);
  }
}

if (!function_exists('parse_date_to_iso_format')) {
  function parse_date_to_iso_format(string $stringDate): string
  {
    return \Carbon\CarbonImmutable::parse($stringDate)
      ->locale(config('app.locale'))
      ->timezone(config('app.timezone'))
      ->isoFormat('LL');
  }
}