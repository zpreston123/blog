@extends('layouts.master')

@section('content')
    <p id="power">0</p>
@endsection

@section('scripts')
    <script src="js/socket.io.js"></script>
    <script>
        var socket = io('http://localhost:3000');
        socket.on('test-channel:Blog\\Events\\EventName', function(message) {
            console.log(message);
            $("#power").text(parseInt($("#power").text()) + parseInt(message.data.power));
        });
    </script>
@stop
