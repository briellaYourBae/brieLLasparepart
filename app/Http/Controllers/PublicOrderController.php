<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class PublicOrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'nama_pemesan' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'jumlah' => 'required|integer|min:1',
            'metode_pengambilan' => 'required|in:ambil_sendiri,diantar',
            'alamat' => 'required_if:metode_pengambilan,diantar',
            'bukti_pembayaran' => 'required_if:metode_pengambilan,diantar|image|mimes:jpeg,jpg,png,webp|max:5120',
            'tanggal_ambil' => 'required_if:metode_pengambilan,ambil_sendiri|date',
        ]);

        $sparepart = Sparepart::findOrFail($request->produk_id);
        
        if ($sparepart->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        $total_harga = $sparepart->harga * $request->jumlah;
        $dp_dibayar = 0;
        $bukti_path = null;

        if ($request->metode_pengambilan == 'diantar') {
            $dp_dibayar = ceil($total_harga / 2);
            if ($request->hasFile('bukti_pembayaran')) {
                $bukti_path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            }
        }

        Order::create([
            'nama_pemesan' => $request->nama_pemesan,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat ?? '-',
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total_harga,
            'metode_pengambilan' => $request->metode_pengambilan,
            'metode_pembayaran' => $request->metode_pengambilan == 'diantar' ? 'transfer' : 'tunai',
            'dp_dibayar' => $dp_dibayar,
            'bukti_pembayaran' => $bukti_path,
            'tanggal_ambil' => $request->tanggal_ambil,
            'status' => 'pending',
        ]);

        return redirect()->route('sparepart')->with('success', 'Pesanan berhasil! Kami akan menghubungi Anda segera.');
    }
}
