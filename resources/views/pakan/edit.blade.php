{{-- @dd($jenis_pakans); --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pakan</title>
</head>
<body>
    <h1>Edit Pakan</h1>

    <a href="{{ route('pakan.index') }}">Kembali ke Daftar Pakan</a>

    <form action="{{ route('pakan.update', $pakan->id) }}" method="POST">
        @csrf
        @method('PUT')
        Nama Pakan: <input type="text" name="nama_pakan" value="{{ $pakan->nama_pakan }}"><br>
        <select name="jenis_pakan_id" id="jenis_pakan_id">
            @foreach ($jenis_pakans as $jenis_pakan)
            {{-- @dd($jenis_pakans) --}}
                <option value="{{ $jenis_pakan->id }}"
                    @if ($jenis_pakan->id == $pakan->jenis_pakan_id)
                        selected
                    @endif>
                    {{ $jenis_pakan->name }}
                </option>
            @endforeach
        </select>
        Stok: <input type="number" name="stok" value="{{ $pakan->stok }}"><br>
        Harga Beli: <input type="number" name="harga_beli" value="{{ $pakan->harga_beli }}" step="0.01"><br>
        Harga Jual: <input type="number" name="harga_jual" value="{{ $pakan->harga_jual }}" step="0.01"><br>
        <button type="submit">Perbarui</button>
    </form>
</body>
</html>
