
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('back/css/metro-all.css') }}">
    <title>Messagess</title>

</head>

<body >

<div style="padding:2rem;">

<table class="table table-border cell-border" >
<thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Number</th>
        <th>Message</th>
        <th>Date</th>
    </tr>
</thead>

<tbody>
    @foreach($messages as $message)
    <tr>
        <td>{{$message->name}}</td>
        <td>{{$message->email}}</td>
        <td>{{$message->sub}}</td>
        <td>{{$message->detail}}</td>
        <td>{{$message->created_at}}</td>
    </tr>
    @endforeach
</tbody>
</table>

</div>
<script src="{{ asset('common/js/jquery.js') }}"></script>
<script src="{{ asset('back/js/metro.js') }}"></script>

</body>
</html>
