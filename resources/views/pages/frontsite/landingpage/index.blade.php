{{-- extend fungsi nya dalah untuk melakukan render terhadap layout yang dipilih, mirip seperti @layout() pada adonis js --}}
@extends('layouts.default')


{{-- @section() adalah pasangan untuk @yield, yang fungsi untuk render komponen atau data isi kontent --}}
{{-- 2 parameter untuk rendering/pasing  data  --}}
@section('title', 'Landing')

{{-- @section dengan @endsection untuk masukan konten / kodingan / komponen --}}
@section('content')
    
@endsection

