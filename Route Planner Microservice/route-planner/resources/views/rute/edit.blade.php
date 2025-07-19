<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Edit Rute</h1>
    <a href="{{ route('rute.index') }}">Kembali</a>
    <form action="{{ route('rute.update', $rute) }}" method="POST">
        @csrf
        @method('PUT')
        Halte 1 :
        <select name="stop_1">
            <option value="">Pilih nama halte 1</option>
            @foreach ($nama_haltes as $data)
            <option value="{{ $data->id }}" {{ old('stop_1') == $data->stop_1 ? 'selected' : '' }}>{{ $data->but_stop_name }}</option> {{-- $kamus[$rute->stop_1] --}}
            @endforeach
        </select>
        <br>
        Halte 2 :
        <select name="stop_2">
            <option value="">Pilih nama halte 2</option>
            @foreach ($nama_haltes as $data)
            <option value="{{ $data->id }}" {{ old('stop_2') == $data->stop_2 ? 'selected' : '' }}>{{ $kamus[$rute->stop_2] }}</option>
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
