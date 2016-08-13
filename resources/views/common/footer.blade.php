@if(($msg = Session::get('msg')) != null)
    <script type="text/javascript">
        Info.{{ isset($msg['type'])?$msg['type']:'alert' }}('{{ $msg['msg'] }}');
    </script>
    <?php Session::remove('msg'); ?>
@endif

@if (count($errors) > 0)
    <script type="text/javascript">
        @foreach ($errors->all() as $error)
            Info.error('{{ $error }}');
        @endforeach
    </script>
@endif