<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">FuckExcel</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li @if(isset($home)) class="active @endif"><a href="/admin/home">主页<span class="sr-only">(current)</span></a></li>
                <li @if(isset($forms)) class="active" @endif><a href="/admin/forms">表单管理</a></li>
                <li @if(isset($users)) class="active" @endif><a href="/admin/users">用户管理</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user['username'] }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/logout">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
