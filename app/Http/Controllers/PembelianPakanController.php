<?php

namespace App\Http\Controllers;

use App\Models\PembelianPakan;
use App\Models\Supplier;
use App\Models\Pakan;
use Illuminate\Http\Request;

class PembelianPakanController extends Controller
{
    public function index()
    {
        $pembelianPakans = PembelianPakan::with('supplier', 'pakan')->latest()->paginate(10);
        return view('pembelian_pakans.index', compact('pembelianPakans'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $pakans = Pakan::all();
        return view('pembelian_pakans.create', compact('suppliers', 'pakans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'pakan_id' => 'required|exists:pakans,id',
            'jumlah' => 'required|integer|min:1',
            'harga_total' => 'required|numeric|min:0',
            'tanggal_pembelian' => 'required|date',
        ]);

        PembelianPakan::create($request->all());

        return redirect()->route('pembelian_pakans.index')
                         ->with('success', 'Data pembelian berhasil ditambahkan.');
    }

    public function show(PembelianPakan $pembelianPakan)
    {
        return view('pembelian_pakans.show', compact('pembelianPakan'));
    }

    public function edit(PembelianPakan $pembelianPakan)
    {
        $suppliers = Supplier::all();
        $pakans = Pakan::all();
        return view('pembelian_pakans.edit', compact('pembelianPakan', 'suppliers', 'pakans'));
    }

    public function update(Request $request, PembelianPakan $pembelianPakan)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'pakan_id' => 'required|exists:pakans,id',
            'jumlah' => 'required|integer|min:1',
            'harga_total' => 'required|numeric|min:0',
            'tanggal_pembelian' => 'required|date',
        ]);

        $pembelianPakan->update($request->all());

        return redirect()->route('pembelian_pakans.index')
                         ->with('success', 'Data pembelian berhasil diperbarui.');
    }

    public function destroy(PembelianPakan $pembelianPakan)
    {
        $pembelianPakan->delete();

        return redirect()->route('pembelian_pakans.index')
                         ->with('success', 'Data pembelian berhasil dihapus.');
    }
}
