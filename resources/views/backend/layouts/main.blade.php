<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{config('app.name')}}</title>
    @include('backend.layouts.css.css')
    @yield('style')
</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed ">
    @include('sweetalert::alert')
    <div class="wrapper">
        @include('backend.layouts.navbar')
        @include('backend.layouts.body')
        @include('backend.layouts.controlsidebar')
        @include('backend.layouts.footer')
    </div>
    {{-- Javascript File --}}
    @include('backend.layouts.js.js')
    @yield('script')
</body>
</html>
