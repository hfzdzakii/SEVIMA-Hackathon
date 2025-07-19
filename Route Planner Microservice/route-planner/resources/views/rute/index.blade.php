<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman Index Rute</h1>
    <a href="{{ route('rute.create') }}">Tambah</a>
    <a href="{{ route('main') }}">Kembali</a>
    <table>
        @if (!empty($datas))
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Halte 1</td>
                    <td>Halte 2</td>
                    <td>Jarak</td>
                    <td>Aksi</td>
                </tr>
            </thead>
        @endif
        @forelse ($datas as $data)
            <tbody>
                <tr>
                    {{-- dd($nama_haltes[0]['id']); --}}
                    <td>{{ $datas->firstItem() + $loop->index }}</td>
                    <td>{{ $kamus[$data->stop_1] }}</td>
                    <td>{{ $kamus[$data->stop_2] }}</td>
                    <td>{{ $data->distance }}</td>
                    <form action="{{ route('rute.destroy', $data) }}" method="POST"
                        onsubmit="return confirm('Yakin?')">
                        <td>
                            <a href="{{ route('rute.edit', $data) }}">Edit</a>
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
    {{ $datas->links()}}
</body>
</html>
