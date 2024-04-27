<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="admin, dashboard">
        <meta name="author" content="DexignZone">
        <meta name="robots" content="index, follow">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Admin">
        <meta property="og:title" content="Admin">
        <meta property="og:description" content="Admin">
        <meta property="og:image" content="https://dompet.dexignlab.com/xhtml/social-image.png">
        <meta name="format-detection" content="telephone=no">
        <!-- PAGE TITLE HERE -->
        <title>@yield('title')</title>
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('admin_assets/images/favicon.png') }}">
        <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('admin_assets/css/dashboard.css') }}" rel="stylesheet">
        <!-- bootstrap 5  -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- message toastr -->
        <!-- <link rel="stylesheet" href="{{ asset('admin_assets/css/toastr.min.css') }}"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
        <!-- datatables yajra -->
        <!-- Datatable CSS -->
	    <link rel="stylesheet" href="{{ asset('admin_assets/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/js/simple-datatable/style.css')}}">

    </head>
    <body class="vh-100">
        <!-- Preloader start -->
            <div id="preloader" class="fadout">
                <div class="spinner"></div>
{{--                <img class="loader-img" src="{{ asset('admin_assets/images/loader.gif') }}">--}}
            </div>
        <!-- Preloader end -->

        <!-- Main wrapper start -->
            <div id="main-wrapper">
                 <!-- Sidebar start -->

                 @include('layouts.dashboard.sidebar')
                <!-- Sidebar end  -->

                <div class="main-container" style="margin-top:73px;">
                    <div class="wrapper">
                        <!-- header start -->
                        @include('layouts.dashboard.header')

                        <!-- header end -->

                        <!-- Content body start -->
                        @yield('content')
                        <!-- Content body end -->
                    </div>
                </div>

            </div>
        <!-- Main wrapper end -->
    <!-- cdn scripts -->
    <!-- <script src="//code.jquery.com/jquery-1.12.3.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
    <!-- Datatable JS -->
	<script src="{{ asset('admin_assets/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin_assets/js/dataTables.bootstrap4.min.js') }}"></script>


    @if(Session::has('success'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
            "showMethod": "slideDown",
            "hideMethod": "slideUp",
        }
        toastr.success("<span style='font-size:13px;'>{{ Session::get('success') }}" ,{timeOut:12000});
    </script>
    @elseif(Session::has('error'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton" : true,
        }
        toastr.error("{{ Session::get('error') }}" ,{timeOut:12000});
    </script>
    @endif

    <!-- preloader... -->
    <script>
        window.onbeforeunload = function() {
            const preloader = document.getElementById("preloader");
            preloader.classList.remove("fadeOut");
        };

        window.addEventListener("load",(function() {
            const t = document.getElementById("preloader");
            setTimeout((function() {
                t.classList.add("fadeOut")}),1500)}));
    </script>

    <!-- datatables  -->
    <script>
        // $(document).ready(function() {
        //     $('#table').DataTable();
        // } );

        // var table = $('.datatable').DataTable();

        // table.order([0, 'asc']).draw();

        if($('.datatable').length > 0) {
            $('.datatable').DataTable({
                "bFilter": true,
                "order": [],
                "columnDefs": [
                        {
                            "targets": 'no-sort',
                            "orderable": false
                        }
                ]
            });
	    }
    </script>

    <script>
        const searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // Prevent the default behavior of the 'Enter' key

                const searchData = searchInput.value;

                axios.get('/search', {
                    params: {
                        search: searchData
                    }
                })
                .then(function (response) {
                    // Handle the response data here
                    console.log(response.data);

                })
                .catch(function (error) {
                    // Handle any errors here
                    console.error(error);
                });


                // window.location.href = 'viewmembers?search=' + searchData;
            }
    });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- <script src="{{asset('admin_assets/js/simple-datatable/simple-datatable.js')}}"></script> -->
    <script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
    @yield('script')
</body>
</html>
