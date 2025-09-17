<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\JenisPakan;
use Illuminate\Http\Request;

class PakanController extends Controller
{
    /**
     * Menampilkan daftar semua pakan.
     */
    public function index()
    {
        $pakans = Pakan::all();
        return view('pakan.index', compact('pakans'));
    }

    /**
     * Menampilkan form untuk membuat pakan baru.
     */
    public function create()
    {
            // Ambil semua data jenis pakan
        $jenis_pakans = JenisPakan::all();

        // Kirim data ke view
        return view('pakan.create', compact('jenis_pakans'));
    }

    /**
     * Menyimpan pakan baru ke database.
     */
   public function store(Request $request)
{
    // ... validasi data

    // Simpan hanya data yang dibutuhkan dari request
    Pakan::create($request->only([
        'nama_pakan',
        'jenis_pakan_id',
        'stok',
        'harga_beli',
        'harga_jual'
    ]));

    return redirect()->route('pakan.index')
                     ->with('success', 'Data pakan berhasil ditambahkan.');
}

    /**
     * Menampilkan form untuk mengedit pakan.
     */
    public function edit(Pakan $pakan)
    {
        $jenis_pakans = JenisPakan::all();
        // dd($jenis_pakans);
        return view('pakan.edit', compact('pakan','jenis_pakans'));
    }

    /**
     * Memperbarui pakan yang ada di database.
     */
    public function update(Request $request, Pakan $pakan)
    {
        // Validasi data
        $request->validate([
            'nama_pakan' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
        ]);

        $pakan->update($request->all());

        return redirect()->route('pakan.index')
                         ->with('success', 'Data pakan berhasil diperbarui.');
    }

    /**
     * Menghapus pakan dari database.
     */
    public function destroy(Pakan $pakan)
    {
        $pakan->delete();

        return redirect()->route('pakan.index')
                         ->with('success', 'Data pakan berhasil dihapus.');
    }
}
