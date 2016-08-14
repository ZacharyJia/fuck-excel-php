<html>
<head>
    <title>
        FuckExcel - @yield('title')
    </title>

    @include('common.include')
</head>

<body>
@include('admin.nav')

@yield('content')

@yield('script')
@include('common.footer')
</body>

</html>