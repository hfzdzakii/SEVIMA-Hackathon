<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Create Rute</h1>
    <a href="{{ route('rute.index') }}">Kembali</a>
    <form method="POST" action="{{ route('rute.store') }}">
        @csrf
        Halte 1 :
        <select name="stop_1">
            <option value="">Pilih nama halte 1</option>
            @foreach ($bis_datas as $data)
            <option value="{{ $data->id }}" {{ old('stop_1') == $data->id ? 'selected' : '' }}>{{ $data->bus_stop_name }}</option>
            @endforeach
        </select>
        <br>
        Halte 2 :
        <select name="stop_2">
            <option value="">Pilih nama halte 2</option>
            @foreach ($bis_datas as $data)
            <option value="{{ $data->id }}" {{ old('stop_2') == $data->id ? 'selected' : '' }}>{{ $data->bus_stop_name }}</option>
            @endforeach
        </select>
        <br>
        Jarak :<input value="{{ old('distance') }}" type="number" name="distance">
        <br>
        <button type="submit">Tambah</button>
    </form>
    @if (session('fail'))
    {{ session('fail') }}
    @endif
</body>
</html>
