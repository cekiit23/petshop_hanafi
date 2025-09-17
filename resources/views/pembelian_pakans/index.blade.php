<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian Pakan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2gBHPc43z/3d0tTf+L3b/d8F/3c/6uJgC13g8K9gY70g+xR6lVj+vL3p+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="container mx-auto p-4 md:p-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Daftar Pembelian Pakan</h2>
            <a href="{{ route('pembelian_pakans.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 flex items-center space-x-2">
                <i class="fa fa-plus"></i>
                <span>Tambah Pembelian Baru</span>
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Supplier</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pakan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga Total</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if(count($pembelianPakans) > 0)
                        @php
                            $i = ($pembelianPakans->currentPage() - 1) * $pembelianPakans->perPage();
                        @endphp
                        @foreach ($pembelianPakans as $pembelianPakan)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ ++$i }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pembelianPakan->supplier->nama_supplier }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pembelianPakan->pakan->nama_pakan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $pembelianPakan->jumlah }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">Rp. {{ number_format($pembelianPakan->harga_total, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($pembelianPakan->tanggal_pembelian)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center space-x-2">
                                <a class="px-3 py-1 bg-blue-500 text-white text-sm rounded-lg hover:bg-blue-600 transition duration-300" href="{{ route('pembelian_pakans.edit', $pembelianPakan->id) }}">Edit</a>
                                <form id="delete-form-{{ $pembelianPakan->id }}" action="{{ route('pembelian_pakans.destroy', $pembelianPakan->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $pembelianPakan->id }})" class="px-3 py-1 bg-red-500 text-white text-sm rounded-lg hover:bg-red-600 transition duration-300">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data pembelian pakan.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            {!! $pembelianPakans->links() !!}
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
