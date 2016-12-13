<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <div class="container-fluid main">
        <div class="row">
            <div class="col-md-2 sidebar affix">
                @include('admin.layouts.nav')
            </div>
            <div class="col-md-10 col-md-offset-2 content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="/js/jquery.min.js"></script>

</body>
</html>
