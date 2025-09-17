<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pakan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2gBHPc43z/3d0tTf+L3b/d8F/3c/6uJgC13g8K9gY70g+xR6lVj+vL3p+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="container mx-auto p-4 md:p-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Pakan</h1>
            <a href="{{ route('pakan.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 flex items-center space-x-2">
                <i class="fa-solid fa-plus"></i>
                <span>Tambah Pakan Baru</span>
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                {{ $message }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pakan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Pakan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Beli</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Jual</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if(count($pakans) > 0)
                        @php $i = 1; @endphp
                        @foreach ($pakans as $pakan)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $i++ }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pakan->nama_pakan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pakan->jenisPakan->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pakan->stok }} kg</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp{{ number_format($pakan->harga_beli, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp{{ number_format($pakan->harga_jual, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center justify-center space-x-2">
                                <a href="{{ route('pakan.edit', $pakan->id) }}" class="px-3 py-1 bg-blue-500 text-white text-sm rounded-lg hover:bg-blue-600 transition duration-300">Edit</a>
                                <form id="delete-form-{{ $pakan->id }}" action="{{ route('pakan.destroy', $pakan->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $pakan->id }})" class="px-3 py-1 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition duration-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data pakan.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan bisa mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

</body>
</html>
