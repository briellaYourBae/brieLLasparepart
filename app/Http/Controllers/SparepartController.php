<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SparepartController extends Controller
{
    public function index()
    {
        $spareparts = Sparepart::latest()->get();
        return view('admin.sparepart.index', compact('spareparts'));
    }

    public function create()
    {
        return view('admin.sparepart.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_produk')) {
            $data['foto_produk'] = $request->file('foto_produk')->store('sparepart', 'public');
        }

        Sparepart::create($data);

        return redirect()->route('admin.sparepart.index')->with('success', 'Sparepart berhasil ditambahkan');
    }

    public function edit(Sparepart $sparepart)
    {
        return view('admin.sparepart.edit', compact('sparepart'));
    }

    public function update(Request $request, Sparepart $sparepart)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto_produk')) {
            if ($sparepart->foto_produk) {
                Storage::disk('public')->delete($sparepart->foto_produk);
            }
            $data['foto_produk'] = $request->file('foto_produk')->store('sparepart', 'public');
        }

        $sparepart->update($data);

        return redirect()->route('admin.sparepart.index')->with('success', 'Sparepart berhasil diperbarui');
    }

    public function destroy(Sparepart $sparepart)
    {
        if ($sparepart->foto_produk) {
            Storage::disk('public')->delete($sparepart->foto_produk);
        }
        $sparepart->delete();
        return redirect()->route('admin.sparepart.index')->with('success', 'Sparepart berhasil dihapus');
    }
}
