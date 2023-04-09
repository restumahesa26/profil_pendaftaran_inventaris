<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
    @include('includes.admin.style')
    @stack('addon-style')
    <style>
        * {
            font-family: 'Fira Sans', sans-serif;
        }
        .form-control {
            height: 40px !important;
        }
        select.form-control, select.asColorPicker-input, .dataTables_wrapper select, .select2-container--default select.select2-selection--single, .select2-container--default .select2-selection--single select.select2-search__field, select.typeahead, select.tt-query, select.tt-hint {
            color: #000000;
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        @include('includes.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- partial -->
            @include('includes.admin.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
                @include('includes.admin.footer')
            </div>
        </div>
    </div>
    @include('includes.admin.script')
    @stack('addon-script')
</body>

</html>
