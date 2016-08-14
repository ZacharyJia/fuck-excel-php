<html>
<head>
    @include('common.include')

    <title>
        FuckExcel -@yield('title')
    </title>
</head>
<body>
@include('sa.nav')

@yield('content')

@yield('script')

@include('common.footer')
</body>
</html>