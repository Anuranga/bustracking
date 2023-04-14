<!DOCTYPE html>
<html>
<head>
    <title>Driver Routes</title>
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
<body>
<div class="row">
    <div>
        <div>
            <div>
                <table class="table">
                    <thead>
                    <tr>
                        <th> Id </th>
                        <th> Driver Name </th>
                        <th> Route Name </th>
                        <th> Vehicle Number </th>
                        <th> Registered Date </th>
                        <th> Phone </th>
                        <th> Trip Date </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key  => $data)
                        <tr>
                            <td width="10px"> {{ $key + 1 }} </td>
                            <td style="width: 50px"> {{ $data->driver->name }} </td>
                            <td> {{ $data->routes->route_name }} </td>
                            <td> {{ $data->vehicle_number }} </td>
                            <td> {{ \Carbon\Carbon::parse($data->driver->created_at)->format('d/m/Y') }} </td>
                            <td> {{ $data->driver->phone }} </td>
                            <td>{{ $data->created_at }}</td>
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
