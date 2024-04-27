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
        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('admin_assets/images/favicon.png') }}">
        <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
        <!-- bootstrap 5  -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- message toastr -->
        <!-- <link rel="stylesheet" href="{{ asset('admin_assets/css/toastr.min.css') }}"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    </head>
    <body class="vh-100">
        <div class="authincation h-100">
            <div class="container h-100">
                <!-- Main Wrapper -->
                @yield('content')
                <!-- /Main Wrapper -->
            </div>
        </div>

    <!-- cdn scripts -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>  

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
    
    
    <script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>
    @yield('script')
</body>
</html>
