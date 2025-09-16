<?php

namespace App\Http\Controllers;

use App\Models\JenisPakan;
use Illuminate\Http\Request;

class JenisPakanController extends Controller
{
    /**
     * Menampilkan daftar semua jenis pakan.
     */
    public function index()
    {
        $jenis_pakans = JenisPakan::all();
        return view('jenis_pakan.index', compact('jenis_pakans'));
    }

    /**
     * Menampilkan formulir untuk membuat jenis pakan baru.
     */
    public function create()
    {
        return view('jenis_pakan.create');
    }

    /**
     * Menyimpan jenis pakan baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_pakan,nama_jenis'
        ]);

        JenisPakan::create($request->only('nama_jenis'));

        return redirect()->route('jenis_pakan.index')
                         ->with('success', 'Jenis pakan berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit jenis pakan.
     */
    public function edit(JenisPakan $jenis_pakan)
    {
        return view('jenis_pakan.edit', compact('jenis_pakan'));
    }

    /**
     * Memperbarui jenis pakan di database.
     */
    public function update(Request $request, JenisPakan $jenis_pakan)
    {
        $request->validate([
            'nama_jenis' => 'required|string|max:255|unique:jenis_pakan,nama_jenis,' . $jenis_pakan->id
        ]);

        $jenis_pakan->update($request->only('nama_jenis'));

        return redirect()->route('jenis_pakan.index')
                         ->with('success', 'Jenis pakan berhasil diperbarui.');
    }

    /**
     * Menghapus jenis pakan dari database.
     */
    public function destroy(JenisPakan $jenis_pakan)
    {
        $jenis_pakan->delete();

        return redirect()->route('jenis_pakan.index')
                         ->with('success', 'Jenis pakan berhasil dihapus.');
    }
}
