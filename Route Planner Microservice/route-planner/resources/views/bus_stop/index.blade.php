<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Index Bus Stop</h1>
    <a href="{{ route('bus-stop.create') }}">Tambah</a>
    <a href="{{ route('main') }}">Kembali</a>
    <table>
        @if (!empty($datas))
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama Halte</td>
                    <td>Aksi</td>
                </tr>
            </thead>
        @endif
        @forelse ($datas as $data)
            <tbody>
                <tr>
                    <td>{{ $datas->firstItem() + $loop->index }}</td>
                    <td>{{ $data->bus_stop_name }}</td>
                    <form action="{{ route('bus-stop.destroy', $data) }}" method="POST"
                        onsubmit="return confirm('Yakin?')">
                        <td>
                            <a href="{{ route('bus-stop.edit', $data) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        @empty
            <p>Kosong</p>
        @endforelse
    </table>
</body>
</html>
