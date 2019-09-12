<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/Font-Awesome/css/all.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
<script type="text/javascript" src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }} "></script>

<script type="text/javascript" src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
        $(function () {
            $('#datetimepicker9').datetimepicker({
                viewMode: 'years'
            });
        });
</script>
