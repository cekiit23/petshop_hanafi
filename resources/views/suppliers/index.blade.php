<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Supplier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2gBHPc43z/3d0tTf+L3b/d8F/3c/6uJgC13g8K9gY70g+xR6lVj+vL3p+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="container mx-auto p-4 md:p-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Daftar Supplier</h2>
            <a href="{{ route('suppliers.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 flex items-center space-x-2">
                <i class="fa fa-plus"></i>
                <span>Tambah Supplier Baru</span>
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Supplier</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Telepon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-60">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if(count($suppliers) > 0)
                        @php
                            $i = ($suppliers->currentPage() - 1) * $suppliers->perPage();
                        @endphp
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ ++$i }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $supplier->nama_supplier }}</td>
                            <td class="px-6 py-4 whitespace-normal break-words">{{ $supplier->alamat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $supplier->no_telepon }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2">
                                <a class="px-3 py-1 bg-blue-500 text-white text-sm rounded-lg hover:bg-blue-600 transition duration-300" href="{{ route('suppliers.edit',$supplier->id) }}">Edit</a>
                                <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data supplier.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            {!! $suppliers->links() !!}
        </div>
    </div>
</div>

</body>
</html>
