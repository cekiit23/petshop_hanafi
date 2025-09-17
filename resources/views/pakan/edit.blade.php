<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pakan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="container mx-auto p-4 md:p-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Edit Pakan</h1>
            <a href="{{ route('pakan.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition duration-300">
                Kembali ke Daftar Pakan
            </a>
        </div>

        <form action="{{ route('pakan.update', $pakan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_pakan" class="block text-gray-700 text-sm font-bold mb-2">Nama Pakan:</label>
                <input type="text" name="nama_pakan" value="{{ $pakan->nama_pakan }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="jenis_pakan_id" class="block text-gray-700 text-sm font-bold mb-2">Jenis Pakan:</label>
                <div class="relative">
                    <select name="jenis_pakan_id" id="jenis_pakan_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach ($jenis_pakans as $jenis_pakan)
                            <option value="{{ $jenis_pakan->id }}" @if ($jenis_pakan->id == $pakan->jenis_pakan_id) selected @endif>
                                {{ $jenis_pakan->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 6.757 7.586 5.343 9l4.95 4.95z"/></svg>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <label for="stok" class="block text-gray-700 text-sm font-bold mb-2">Stok:</label>
                <input type="number" name="stok" value="{{ $pakan->stok }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="harga_beli" class="block text-gray-700 text-sm font-bold mb-2">Harga Beli:</label>
                <input type="number" name="harga_beli" value="{{ $pakan->harga_beli }}" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="harga_jual" class="block text-gray-700 text-sm font-bold mb-2">Harga Jual:</label>
                <input type="number" name="harga_jual" value="{{ $pakan->harga_jual }}" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                    Perbarui
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
