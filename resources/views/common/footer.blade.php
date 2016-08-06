@if(($msg = Session::get('msg', null)) != null)
    <script type="text/javascript">
        Info.{{ isset($msg['type'])?$msg['type']:'alert' }}('{{ $msg['msg'] }}');
    </script>
    <?php Session::remove('msg'); ?>
@endif