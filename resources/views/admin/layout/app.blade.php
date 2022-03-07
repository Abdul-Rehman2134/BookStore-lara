<!DOCTYPE html>
<html>
@include('admin.layout.app-header')

<body>
    @include('admin.layout.app-nav')
    @yield('content')
    @include('admin.layout.app-scripts')
</body>

</html>
