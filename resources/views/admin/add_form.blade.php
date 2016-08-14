@extends('admin.admin')

@section('title')
    创建表单
@endsection

@section('content')
    <style type="text/css">
        .gridly {
            position: relative;
            width: 960px;
        }
        .brick.small {
            width: 500px;
            height: 140px;
            background-color: #2ca02c;
        }
    </style>
    <div class="gridly">
        <div class="brick small">1</div>
        <div class="brick small">2</div>
        <div class="brick small">3</div>
        <div class="brick small">4</div>
    </div>

@endsection

@section('script')
    <script>
        $('.gridly').gridly({
            gutter: 20, // px
            columns: 1
        });
    </script>

@endsection