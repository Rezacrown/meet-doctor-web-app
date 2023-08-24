<!DOCTYPE html>
<html lang="en">
<head>
    {{-- meta data untuk SEO --}}
    @include('includes.frontsite.meta')

    {{-- @yield untuk buat/menambah content yg dibuthkan sama seperti @section di framework adonis js --}}
    {{-- title dinamis --}}
    <title> @yield('title') | Meet Doctor </title>


    {{-- @stack berfungsi untuk melakukan include script/style tertentu, contohnya jika setiap page butuh script atau style yang berbeda maka dengan @stack kita bisa menambahkan script/style yang dibutuhkan page tersebut tanpa harus membuat isi di page lainnya  --}}
    {{-- style --}}
    @stack('before-style')
        @include('includes.frontsite.style')
    @stack('after-style')

</head>
<body>

    {{-- header --}}
    @include('components.frontsite.header')

    {{-- isi content --}}
        @yield('content')

        {{-- footer --}}
    @include('components.frontsite.footer')

    {{-- modal --}}
    {{-- if you have a modals, create here --}}

    {{-- script --}}
    @stack('before-script')
        @include('includes.frontsite.script')
    @stack('after-script')

</body>
</html>
