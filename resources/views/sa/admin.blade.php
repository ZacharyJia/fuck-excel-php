@extends('sa.sa')

@section('title')
    管理员管理
@endsection

@section('script')
    <script type="text/javascript">
        function deleteConfirm() {
            return confirm("删除后不可恢复,确定要删除吗?");
        }

        function ajax_get_admin_info(id) {
            $.ajax({
                url     : "/sa/admins/get",
                type    : "post",
                data    : {
                    id: id
                },
                dataType: "json",
                async   : false,
                success : function(data) {
                    $("#new_username").val(data.username);
                    $("#new_tags").val(data.tags);
                    $("#admin_id").val(data._id);
                },
                error   : function() {

                }
            })
        }
    </script>
@endsection

@section('content')
<div class="container">
    <div class="col-sm-2">
        <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#addAdminModal">增加管理员</button>
    </div>
    <br /><br /><br />
    <!-- 增加管理员的模态框 -->
    <div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addAdminModalLabel">增加管理员</h4>
                </div>
                <form action="/sa/admins/add" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">用户名</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">密码(英文、数字和特殊符号)</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="tags">标签(多个标签以英文逗号隔开)</label>
                            <input type="text" class="form-control" id="tags" name="tags">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">增加</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- 编辑管理员的模态框 -->
    <div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="editAdminModalLabel">编辑管理员</h4>
                </div>
                <form action="/sa/admins/edit" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="admin_id" name="admin_id">
                        <div class="form-group">
                            <label for="username">用户名</label>
                            <input type="text" class="form-control" id="new_username" disabled="disabled">
                        </div>
                        <div class="form-group">
                            <label for="password">密码(英文、数字和特殊符号)</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="不改请留空">
                        </div>
                        <div class="form-group">
                            <label for="tags">标签(多个标签以英文逗号隔开)</label>
                            <input type="text" class="form-control" id="new_tags" name="new_tags">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-primary">修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <table class="table table-hover">
            <thead>
            <th>用户名</th>
            <th>标签</th>
            <th>操作</th>
            </thead>
            <tbody>

            @foreach ($adminList as $one)
                <tr>
                    <td>{{ $one['username'] }}</td>
                    <td>
                        @foreach($one['tags'] as $tag)
                            <span class="label label-success">{{ $tag }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="#" class="btn btn-default" data-toggle="modal" data-target="#editAdminModal" onclick="ajax_get_admin_info('{{ $one['_id'] }}')"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="/sa/admins/delete?id={{$one['_id']}}" class="btn btn-default" onclick="return deleteConfirm()"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $adminList->links() }}

    </div>
</div>

@endsection