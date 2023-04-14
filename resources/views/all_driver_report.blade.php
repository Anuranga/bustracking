<!DOCTYPE html>
<html>
<head>
    <title>All Drivers</title>
    <head>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 2px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
</head>
<body>
<div class="row">
    <div>
        <div>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th> Driver Id </th>
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
                            <td width="10px"> {{ $data->id }} </td>
                            <td> {{ $data->name }} </td>
                            <td> {{ $data->email }} </td>
                            <td> {{ $data->vehicle_number }} </td>
                            <td> {{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }} </td>
                            <td> {{ $data->phone }} </td>
                            <td>
                                @if($data->status == 1)
                                    <span>Active</span>
                                @elseif($data->status == 0)
                                    <span>Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
