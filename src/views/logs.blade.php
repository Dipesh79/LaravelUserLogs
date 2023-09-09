<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <title>Laravel User Logs</title>
    <link rel="stylesheet" href="{{asset('css/logs/'.config('user-logs.theme').'.css')}}">
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col sidebar mb-3">
            <h3>Laravel User Logs</h3>
            <p class="text-muted"><a href="https://github.com/Dipesh79" target="_blank"><i>by Dipesh Khanal</i></a></p>
            <br>
            <a href="{{config('user-logs.return_page.route_type') == 'route' ? route(config('user-logs.return_page.url')) : config('user-logs.return_page.url')}}">Back</a>

        </div>
        <div class="col-10 table-container">
            <table id="table-log" class="table table-striped" data-ordering-index="2">
                <thead>
                <tr>
                    <th>Log ID</th>
                    <th>Model</th>
                    <th>Model Id</th>
                    <th>Action</th>
                    <th>User</th>
                    <th>IP Address</th>
                    <th>Device</th>
                    <th>Action At</th>
                </tr>
                </thead>
                <tbody>

                @foreach($logs as $log)
                    <tr>
                        <td class="nowrap">
                            {{$log->id}}
                        </td>
                        <td class="text">{{$log->loggable_type}}</td>
                        <td class="text">{{$log->loggable_id}}</td>
                        <td class="text">{{$log->action}}</td>
                        <td class="text">{{$log->user[config('user-logs.user_identifier')]}}</td>
                        <td class="text">{{$log->ip_address}}</td>
                        <td class="text">{{$log->device}}</td>
                        <td class="text">{{$log->created_at->format('Y-m-d h:i a')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$logs->links('pagination::'.config('user-logs.theme').'-5')}}
        </div>
    </div>
</div>
</body>
</html>
