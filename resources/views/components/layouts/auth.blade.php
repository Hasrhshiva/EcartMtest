<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.head')

<body id="body" class="antialiased 2xl:container mx-auto">
    @yield('content')
    @include('components.script')
</body>

</html>