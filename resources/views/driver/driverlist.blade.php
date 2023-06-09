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
                <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">

                   <h5 class="mb-0 font-weight-medium d-none d-lg-flex"></h5>
                    <ul class="navbar-nav navbar-nav-right ml-auto">
                    </ul>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf

                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                    {{--@auth
                        <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
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
                            <h3 class="page-title">Driver List </h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb"></ol>
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
                                                {{--<th> Registered Date </th>--}}
                                                <th> Phone </th>
                                                <th> Status </th>
                                                <th> Status Change </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($allData as $key  => $data)
                                                <tr>
                                                    <td width="10px"> {{ $data->id }} </td>
                                                    <td width="10px"> {{ $data->name }} </td>
                                                    <td width="10px"> {{ $data->email }} </td>
                                                    <td width="10px"> {{ $data->vehicle_number }} </td>
                                                    {{--<td width="10px"> {{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</td>--}}
                                                    <td width="10px"> {{ $data->phone }} </td>
                                                    <td width="10px">
                                                        @if($data->status == 1)
                                                            <span>Approved</span>
                                                        @elseif($data->status == 2)
                                                            <span>Pending</span>
                                                        @elseif($data->status == 3)
                                                            <span>Rejected</span>
                                                        @endif
                                                    </td>
                                                    <td style="min-width: 200px;">
                                                    <select class="form-control" name="driverStatus" id="driverStatus{{$data->id}}" onchange="getCompanyName({{ $data->id }})">
                                                        <option value="{{1}}">Approve</option>
                                                        <option value="{{2}}">Pending</option>
                                                        <option value="{{3}}">Reject</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div id="div1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @include('layouts.footer')

                </div>

            </div>

        </div>
        @endauth
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function getCompanyName(id)
    {
        var driverStatus = document.getElementById("driverStatus"+id).value;
        console.log('driver status1', driverStatus);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, Change Status',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var driverStatus = document.getElementById("driverStatus"+id).value;
                console.log('driver status', driverStatus);
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "{{URL::to('update_driver_status')}}",
                    data: {
                        'id': id,
                        'driverStatus': driverStatus
                    },
                    success:function(data){
                        swalWithBootstrapButtons.fire(
                            'Done!',
                            'Driver status has been changed.',
                            'success'
                        )
                        location.reload();
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Driver status not changed',
                    'error'
                )
                location.reload();
            }
        })
    }
</script>
</html>
