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
                                    <a class="navbar-brand brand-logo" href="../../index.html">

                                    </a>
                                </div>
                                <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
                                    <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome To Bus Tracking Dashboard!</h5>
                                    <ul class="navbar-nav navbar-nav-right ml-auto">
                                    </ul>
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf

                                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>
                                    {{--@auth
                                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log In</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                        @endif
                                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                                        <span class="icon-menu"></span>
                                    </button>--}}
                                </div>
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
                                                        {{--<h4 class="card-title">Striped Table</h4>
                                                        <p class="card-description"> Add class <code>.table-striped</code>
                                                        </p>
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th> User </th>
                                                                <th> First name </th>
                                                                <th> Progress </th>
                                                                <th> Amount </th>
                                                                <th> Deadline </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <img src="../../images/faces-clipart/pic-1.png" alt="image" />
                                                                </td>
                                                                <td> Herman Beck </td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td> $ 77.99 </td>
                                                                <td> May 15, 2015 </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <img src="../../images/faces-clipart/pic-2.png" alt="image" />
                                                                </td>
                                                                <td> Messsy Adam </td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td> $245.30 </td>
                                                                <td> July 1, 2015 </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <img src="../../images/faces-clipart/pic-3.png" alt="image" />
                                                                </td>
                                                                <td> John Richards </td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td> $138.00 </td>
                                                                <td> Apr 12, 2015 </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <img src="../../images/faces-clipart/pic-4.png" alt="image" />
                                                                </td>
                                                                <td> Peter Meggik </td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td> $ 77.99 </td>
                                                                <td> May 15, 2015 </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <img src="../../images/faces-clipart/pic-1.png" alt="image" />
                                                                </td>
                                                                <td> Edward </td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td> $ 160.25 </td>
                                                                <td> May 03, 2015 </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <img src="../../images/faces-clipart/pic-2.png" alt="image" />
                                                                </td>
                                                                <td> John Doe </td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td> $ 123.21 </td>
                                                                <td> April 05, 2015 </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <img src="../../images/faces-clipart/pic-3.png" alt="image" />
                                                                </td>
                                                                <td> Henry Tom </td>
                                                                <td>
                                                                    <div class="progress">
                                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </td>
                                                                <td> $ 150.00 </td>
                                                                <td> June 16, 2015 </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>--}}
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


                </div>
            @endif
        </div>

</body>
</html>
