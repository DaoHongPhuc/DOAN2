<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DOAN2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" href="{{asset('template')}}/assets/images/favicon.ico">

        <!-- DataTables -->
        <link href="{{asset('template')}}/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('template')}}/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('template')}}/assets/plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('template')}}/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('template')}}/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{asset('template')}}/assets/plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="{{asset('template')}}/assets/plugins/morris/morris.css">

        <link href="{{asset('template')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{asset('template')}}/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="{{asset('template')}}/assets/css/style.css" rel="stylesheet" type="text/css">

        <!-- Sweet Alert -->
        <link href="{{asset('template')}}/assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <script src="{{asset('template')}}/assets/plugins/ckeditor/ckeditor.js"></script>
    </head>

<body>
