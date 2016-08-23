@extends('admin.admin')

@section('title')
    用户管理
@endsection

@section('content')
    <div class="container">
        <div class="col-sm-2"><a href="#" class="btn btn-primary btn-block">创建新用户</a></div>
        <div class="col-sm-2"><a href="#" class="btn btn-primary btn-block">批量导入用户</a></div>
        <br /><br /><br /><br />
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                <th>用户名</th>
                <th>标签</th>
                <th>操作</th>
                </thead>
                <tbody>

                @foreach ($user_list as $one)
                    <tr>
                        <td>{{ $one['username'] }}</td>
                        <td>
                            @foreach($one['tags'] as $tag)
                                <span class="label label-success">{{ $tag }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="/admin/users/detail?id={{$one['id']}}" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></a>
                            <a href="/admin/users/delete?id={{$one['id']}}" class="btn btn-default" onclick="return deleteConfirm()"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $user_list->links() }}

        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function deleteConfirm() {
            return confirm("删除后不可恢复,确定要删除吗?");
        }
    </script>
@endsection