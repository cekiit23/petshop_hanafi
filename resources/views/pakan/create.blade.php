<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pakan</title>
</head>
<body>
    <h1>Tambah Pakan</h1>

    <a href="{{ route('pakan.index') }}">Kembali ke Daftar Pakan</a>

    <form action="{{ route('pakan.store') }}" method="POST">
        @csrf
        Nama Pakan: <input type="text" name="nama_pakan"><br>
        Jenis Pakan: <select id="cars" name="jenis_pakan_id">
            <option value="1">Pakan Kucing</option>
            <option value="2">Pakan Anjing</option>
            <option value="3">Pakan Burung</option>
            <option value="4">Pakan Tupai</option>
            </select>
        Stok: <input type="number" name="stok"><br>
        Harga Beli: <input type="number" name="harga_beli" step="0.01"><br>
        Harga Jual: <input type="number" name="harga_jual" step="0.01"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
