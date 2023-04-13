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
                                            <h3 class="page-title"> Passenger List </h3>
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
                                @include('layouts.footer')
                                    <!-- partial -->
                                </div>
                                <!-- main-panel ends -->
                            </div>
                            <!-- page-body-wrapper ends -->
                        </div>


                    @endauth
                </div>
        </div>

</body>
</html>
