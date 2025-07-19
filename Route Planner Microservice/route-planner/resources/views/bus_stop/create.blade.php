<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Create Bus Stop</h1>
    <a href="{{ route('bus-stop.index') }}">Kembali</a>
    <form method="POST" action="{{ route('bus-stop.store') }}">
        @csrf
        Name Halte:<input value="{{ old('bus_stop_name') }}" type="text" name="bus_stop_name">
        <br>
        <button type="submit">Tambah</button>
    </form>
    @if (session('fail'))
    {{ session('fail') }}
    @endif
</body>
</html>
