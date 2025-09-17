<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pakan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="card-title h3 mb-0">Tambah Pakan</h1>
            <a href="{{ route('pakan.index') }}" class="btn btn-secondary">
                Kembali ke Daftar Pakan
            </a>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pakan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_pakan" class="form-label">Nama Pakan:</label>
                    <input type="text" name="nama_pakan" value="{{ old('nama_pakan') }}" class="form-control" placeholder="Masukkan Nama Pakan" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_pakan_id" class="form-label">Jenis Pakan:</label>
                    <select name="jenis_pakan_id" class="form-select" required>
                        <option value="">Pilih Jenis Pakan</option>
                        @foreach ($jenis_pakans as $jenis_pakan)
                            <option value="{{ $jenis_pakan->id }}" @if (old('jenis_pakan_id') == $jenis_pakan->id) selected @endif>
                                {{ $jenis_pakan->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok:</label>
                    <input type="number" name="stok" value="{{ old('stok') }}" class="form-control" placeholder="Masukkan Stok" required>
                </div>
                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli:</label>
                    <input type="number" name="harga_beli" value="{{ old('harga_beli') }}" step="0.01" class="form-control" placeholder="Masukkan Harga Beli" required>
                </div>
                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual:</label>
                    <input type="number" name="harga_jual" value="{{ old('harga_jual') }}" step="0.01" class="form-control" placeholder="Masukkan Harga Jual" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
