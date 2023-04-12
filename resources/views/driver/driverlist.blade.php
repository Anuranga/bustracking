<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bus Tracking System</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('css/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>
</head>
    <body>
        <div >
            @if (Route::has('login'))
                <div>

                        <div>
                            <!-- partial:../../partials/_navbar.html -->
                            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                                <div class="navbar-brand-wrapper d-flex align-items-center">
                                    <a class="navbar-brand brand-logo" href="../../index.html">

                                    </a>
                                </div>
                                {{--<div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
                                    <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome To Bus Tracking Dashboard!</h5>
                                    <ul class="navbar-nav navbar-nav-right ml-auto">
                                    </ul>
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log In</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        @endif
                                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                                        <span class="icon-menu"></span>
                                    </button>
                                </div>--}}
                            </nav>
                            <!-- partial -->
                            <div class="container-fluid page-body-wrapper">
                                <!-- partial:../../partials/_sidebar.html -->
                            @include('layouts.nav')
                            <!-- partial -->
                                <div class="main-panel">
                                    <div class="content-wrapper">
                                        <div class="page-header">
                                            <h3 class="page-title"> Basic Graphs </h3>
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                                     <li class="breadcrumb-item active" aria-current="page">Basic tables</li>--}}
                                                </ol>
                                            </nav>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Striped Table</h4>
                                                        <p class="card-description"> Add class <code>.table-striped</code>
                                                        </p>
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th> Name </th>
                                                                <th> Email </th>
                                                                <th> Address </th>
                                                                <th> Vehicle Number </th>
                                                                <th> Phone </th>
                                                                <th> Status </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td> Herman Beck </td>
                                                                <td> HermanBeck@gmail.com </td>
                                                                <td> 34/123/1, Rajagalatanna, Ampara </td>
                                                                <td> Ep BBD-2828 </td>
                                                                <td> 087-12321122</td>
                                                                <td> Active</td>
                                                            </tr>
                                                            <tr>
                                                                <td> Pradeep </td>
                                                                <td> Pradeep@gmail.com </td>
                                                                <td> 112/1, Uhana </td>
                                                                <td> Ep SSD-2828 </td>
                                                                <td> 0778990427</td>
                                                                <td> Pending</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- content-wrapper ends -->
                                    <!-- partial:../../partials/_footer.html -->
                                    <footer class="footer">
                                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Ravindu.com 2020</span>
                                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Assignment</span>
                                        </div>
                                    </footer>
                                    <!-- partial -->
                                </div>
                                <!-- main-panel ends -->
                            </div>
                            <!-- page-body-wrapper ends -->
                        </div>
                        <!-- container-scroller -->
                        <!-- plugins:js -->

                    @endauth
                </div>
        </div>

</body>
</html>
