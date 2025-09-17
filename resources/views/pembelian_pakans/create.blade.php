<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembelian Pakan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="container mx-auto p-4 md:p-8">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Tambah Pembelian Pakan</h2>
            <a href="{{ route('pembelian_pakans.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300">
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembelian_pakans.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="supplier_id" class="block text-gray-700 font-medium mb-2">Supplier:</label>
                <select name="supplier_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="">Pilih Supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="pakan_id" class="block text-gray-700 font-medium mb-2">Pakan:</label>
                <select name="pakan_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                    <option value="">Pilih Pakan</option>
                    @foreach($pakans as $pakan)
                        <option value="{{ $pakan->id }}">{{ $pakan->nama_pakan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="jumlah" class="block text-gray-700 font-medium mb-2">Jumlah:</label>
                <input type="number" name="jumlah" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="harga_total" class="block text-gray-700 font-medium mb-2">Harga Total:</label>
                <input type="number" name="harga_total" step="0.01" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="tanggal_pembelian" class="block text-gray-700 font-medium mb-2">Tanggal Pembelian:</label>
                <input type="date" name="tanggal_pembelian" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
