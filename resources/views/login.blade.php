<html>
<head>
    <title>信息采集系统登录</title>
    @include('common.include')
</head>
<body>
<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
        <h1 class="text-center">信息采集系统登录</h1>
    </div>
    <div class="col-sm-6 col-sm-offset-3">
        <form action="/doLogin" method="post">
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="用户名">
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="密码">
            </div>
            {{ csrf_field() }}
            <div class="form-group">
                <button type="submit" class="btn btn-default">登录</button>
            </div>
        </form>
    </div>

</div>
@include('common.footer')
</body>
</html>
