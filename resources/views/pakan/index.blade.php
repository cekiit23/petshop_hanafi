<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pakan</title>
</head>
<body>
    <h1>Daftar Pakan</h1>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    <a href="{{ route('pakan.create') }}">Tambah Pakan Baru</a>

    <table>
        <thead>
            <tr>
                <th>Nama Pakan</th>
                <th>Jenis Pakan</th>
                <th>Stok</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pakans as $pakan)
            <tr>
                <td>{{ $pakan->nama_pakan }}</td>
                <td>{{ $pakan->jenisPakan->name }}</td>
                <td>{{ $pakan->stok }} kg</td>
                <td>Rp{{ number_format($pakan->harga_beli, 2) }}</td>
                <td>Rp{{ number_format($pakan->harga_jual, 2) }}</td>
                <td>
                    <a href="{{ route('pakan.edit', $pakan->id) }}">Edit</a>
                    <form action="{{ route('pakan.destroy', $pakan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
