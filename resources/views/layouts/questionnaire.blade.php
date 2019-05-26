<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    @if(!Request::get('print'))
        <link href="//fonts.googleapis.com/css?family=Mukta:400,700|Open+Sans:400,700" rel="stylesheet">
    @endif
    <link href="{{ url(mix('css/agreement-style.css', 'hotel-agreement')) }}" rel="stylesheet">
    <!-- Vue Component Styles -->
    <link href="{{ url(mix('css/agreement.css', 'hotel-agreement')) }}" rel="stylesheet">

    @if(!Request::get('print'))
        <style type="text/css" media="screen">
            #app .container-fluid {
                max-width: 790px;
            }
        </style>
    @else
        <link href="{{ url(mix('css/print.css', 'hotel-agreement')) }}" rel="stylesheet" media="screen">
    @endif

</head>
<body>
@yield('content')
<!-- Polyfills for wkhtmltopdf -->
{{--<script src="/bower_components/es5-shim/es5-shim.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/json3/3.3.2/json3.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-sham.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/es7-shim/6.0.0/es7-shim.min.js"></script>--}}

<script type="text/javascript">
    var print = @json(Request::get('print'));
{{--    var trip = @json($trip);--}}
    var FULLURL = @json(url('/'));
    var data = @json($doc_values);
    window.Laravel = @json(['csrfToken' => csrf_token(), 'url' => url('/')]);
</script>
<script type="text/javascript" src="{{ url(mix('js/polyfill.js', 'hotel-agreement')) }}"></script>
<script type="text/javascript" src="{{ url(mix('js/runtime.js', 'hotel-agreement')) }}"></script>
{{--<script type="text/javascript" src="{{ url(mix('js/questionnaire-style.js', 'hotel-agreement')) }}"></script>--}}
<script type="text/javascript" src="{{ url(mix('js/questionnaire.js', 'hotel-agreement')) }}"></script>
@if(Request::get('print'))
<script type="text/javascript" src="{{ url(mix('js/print-style.js', 'hotel-agreement')) }}"></script>
@endif
<script type="text/javascript">
    setTimeout(function () { window.status = "done"; }, 4000);
</script>
</body>
</html>
