@extends('admin.admin')

@section('title')
    用户信息
@endsection

@section('content')
    <div class="container">
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    基本信息
                </div>
                <div class="panel-body">
                    <p>用户名: <span id="username" datatype="text">{{ $user['username'] }}</span></p>
                    <p>
                        标签:
                        <a class="editable editable-click" id="edit_tags" href="#"><span class=" glyphicon glyphicon-pencil"></span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script type="text/javascript">

        $('#edit_tags').editable({
            ajaxOptions: {
                type: 'post',
                dataType: 'json'
            },
            pk: '{{ $user['id'] }}',
            url: '/admin/users/ajax_save_tags',
            type: 'select2',
            value: "{{ implode($user['tags'], ',') }}",
            select2: {
                allowClear: true,
                tags: [@foreach($login_user['tags'] as $tag) "{{ $tag }}", @endforeach],
                width: 200,
                placeholder: '用户标签'
            },
            success: function (response, newValue) {
                if (response.code !== 0) {
                    return "出现错误,请稍后重试";
                }
                else {
                    return {newValue: newValue};
                }
            }
        });
    </script>

@endsection