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
        Painter Name:
        <select name="stop_1">
            <option value="">Choose Painter Name</option>
            @foreach ($datas as $data)
            <option value="{{ $data->id }}" {{ $painting->id_painter == $data->id ? 'selected' : ''}}>{{ $data->name }}</option>
            @endforeach
        </select>
        <br>
        Painting Name:
        <input type="text" value="{{ $painting->name }}" name="name">
        <br>
        Year:
        <input type="number" value="{{ $painting->year }}" name="year">
        <br>
        Description:
        <textarea name="description" cols="30" rows="10">{{ $painting->description }}</textarea>
        <br>
        <button type="submit">Edit</button>
    </form>
    @if (session('fail'))
    {{ session('fail') }}
    @endif
</body>
</html>
