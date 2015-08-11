@extends('layouts.master')

@section('content')
    <p id="power">0</p>
@endsection

@section('scripts')
    <script src="{{ asset('js/socket.io.js') }}"></script>
    <script>
        var socket = io('http://192.168.10.10:3000');
        socket.on('test-channel:Blog\\Events\\EventName', function(message) {
            // increase the power everytime we load test route
            $("#power").text(parseInt($("#power").text()) + parseInt(message.data.power));
        });
    </script>
@stop
