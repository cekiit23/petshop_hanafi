<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2gBHPc43z/3d0tTf+L3b/d8F/3c/6uJgC13g8K9gY70g+xR6lVj+vL3p+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="container mx-auto p-4 md:p-8">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Edit Supplier</h2>
            <a href="{{ route('suppliers.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition duration-300">
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

        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama_supplier" class="block text-gray-700 font-medium mb-2">Nama Supplier:</label>
                <input type="text" name="nama_supplier" value="{{ $supplier->nama_supplier }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="Nama Supplier">
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat:</label>
                <textarea name="alamat" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" style="height:100px" placeholder="Alamat">{{ $supplier->alamat }}</textarea>
            </div>

            <div class="mb-4">
                <label for="no_telepon" class="block text-gray-700 font-medium mb-2">No. Telepon:</label>
                <input type="text" name="no_telepon" value="{{ $supplier->no_telepon }}" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" placeholder="No. Telepon">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
