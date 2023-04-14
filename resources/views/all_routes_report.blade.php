    <!DOCTYPE html>
<html>
<head>
    <title>All Routes</title>
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
                        <th> Route Id </th>
                        <th> Route Name </th>
                        <th> Start Point </th>
                        <th> End Point </th>
                        <th> Status </th>
                        <th> Created Date </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key  => $data)
                        <tr>
                            <td> {{ $data->route_id }} </td>
                            <td> {{ $data->route_name }} </td>
                            <td> {{ $data->route_start_point->route_start_name }} </td>
                            <td> {{ $data->route_end_point->route_end_name }} </td>
                            <td>
                                @if($data->status == 1)
                                    <span>Active</span>
                                @elseif($data->status == 0)
                                    <span>Pending</span>
                                @endif
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y')}}
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
