<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
<div >
    @if (Route::has('login'))
    <div>
        <div>
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex align-items-center">
                    <a class="navbar-brand brand-logo" href="../../index.html"></a>
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
                            <h3 class="page-title">Driver List </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    {{-- <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                     <li class="breadcrumb-item active" aria-current="page">Basic tables</li>--}}
                                </ol>
                            </nav>
                        </div>
                        <div class="row">
                            <div class="col-lg-13 grid-margin stretch-card">
                                <div class="card" style="min-width: 1050px; max-width: 1050px">
                                    <div>
                                        <table class="table" style="width: 600px">
                                            <thead>
                                            <tr>
                                                <th> Id </th>
                                                <th> Name </th>
                                                <th> Email </th>
                                                <th> Vehicle Number </th>
                                                <th> Registered Date </th>
                                                <th> Phone </th>
                                                <th> Status </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allData as $key  => $data)
                                                <tr>
                                                    <td width="10px">  {{ $data->id }} </td>
                                                    <td width="10px"> {{ $data->name }} </td>
                                                    <td width="10px"> {{ $data->email }} </td>
                                                    <td width="10px"> {{ $data->vehicle_number }} </td>
                                                    <td width="10px"> {{ $data->created_at }} </td>
                                                    <td width="10px"> {{ $data->phone }} </td>
                                                    <td width="10px"> <button type="button" class="btn px-0"><i class="icon-book-open mr-2"></i>View</button></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                @include('layouts.footer')
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
