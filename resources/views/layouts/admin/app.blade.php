<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="/assets/images/logo.svg" rel="icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Dashboard - Simpedak</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="/assets/css/app.css" />
        <script src="{{ asset("assets/sweetalert2/dist/sweetalert2.all.min.js") }}"></script>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        @include('components.admin.sidebar-mobile')
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            @include('components.admin.sidebar')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    @include('components.admin.breadcrumb')
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Account Menu -->
                    @include('components.admin.account')
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                @yield('content')
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        @stack('script')
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="/assets/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>