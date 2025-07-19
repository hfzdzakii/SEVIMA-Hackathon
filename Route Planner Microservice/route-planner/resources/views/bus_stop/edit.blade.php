<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Edit Bus Stop</h1>
    <a href="{{ route('bus-stop.index') }}">Kembali</a>
    <form action="{{ route('bus-stop.update', $bus_stop) }}" method="POST">
        @csrf
        @method('PUT')
        Nama Halte:
        <input type="text" value="{{ $bus_stop->bus_stop_name }}" name="bus_stop_name">
        <br>
        <button type="submit">Edit</button>
    </form>
    @if (session('fail'))
    {{ session('fail') }}
    @endif
</body>
</html>
