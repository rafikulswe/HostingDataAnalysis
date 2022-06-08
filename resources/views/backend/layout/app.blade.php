<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('public/backend/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/minified/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/minified/core.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/minified/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/backend/assets/css/minified/colors.min.css') }}" rel="stylesheet" type="text/css">
    {{-- fontawsome --}}
    <link href="{{ asset('public/backend/assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    {{-- fontawsome --}}
    <!-- /global stylesheets -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <script src="https://bossanova.uk/jspreadsheet/v4/jexcel.js"></script>
    <link rel="stylesheet" href="https://bossanova.uk/jspreadsheet/v4/jexcel.css" type="text/css" />
    
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />

    <style>
        .add-new {
            color: #fff !important;
        }

        .add-new:hover {
            opacity: 1 !important;
        }

        .panel>.dataTables_wrapper .table-bordered,
        .panel-body>.dataTables_wrapper .table-bordered {
            border: 1px solid #ddd;
        }

        .dataTables_length {
            margin: 20px 0 20px 20px;
        }

        .dataTables_filter {
            margin: 20px 0 20px 20px;
        }

        .dataTables_info {
            margin-bottom: 20px;
        }

        .dataTables_paginate {
            margin: 20px 0 20px 20px;
        }

        .action-icon {
            padding: 0px 10px 0 0;
        }

        .kv-fileinput-upload {
            display: none;
        }

        .dataTables_length>label {
            margin-right: 10px;
        }

        .dataTables_info {
            margin-left: 20px;
        }
        .jexcel_overflow {
            width: 100%!important;
        }
    </style>
</head>

<body>

    @include('backend.layout.menu')

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            @include('backend.layout.topbar')
            {{-- @include('backend.layout.sidebar') --}}
            <!-- /main sidebar -->

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    @yield('content')

                    <!-- Footer -->
                    @include('backend.layout.footer')
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backendassets\js\core\libraries/sweetalert.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/visualization/d3/d3_tooltip.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/switch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_layouts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/datatables/datatables.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/validation/validate.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/form_validation.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/uploaders/fileinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/uploader_bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/libraries/jquery_ui/interactions.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/selects/selectboxit.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/editable/editable.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/extensions/contextmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/visualization/sparkline.min.js') }}">
    </script>


    <script type="text/javascript"
        src="{{ asset('public/backend/assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>

    {{-- <script type="text/javascript" src="{{ asset('public/backendassets\js\plugins\notifications\sweet_alert.min.js') }}"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('public/backendassets\js\pages\extra_sweetalert.js') }}"></script> --}}

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/table_responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/tables/footable/footable.min.js') }}">
    </script>

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/datatables_basic.js') }}"></script>

    {{-- this is not workable --}}
    {{-- <script type="text/javascript" src="{{ asset('public/backend/assets/js/pages/table_elements.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/backend/assets/js/plugins/forms/styling/switchery.min.js') }}"></script> --}}

    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script type="text/javascript" src="{{ asset('public/backend/assets/js/custom.js') }}"></script>

    <!-- /theme JS files -->

    <!-- component JS -->
    @stack('script')
    <!-- /component JS -->

</body>

</html>
