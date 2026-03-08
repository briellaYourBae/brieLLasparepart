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
            'nama_pemesan' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
            'metode_pengambilan' => 'required|in:ambil_sendiri,diantar',
            'alamat' => 'required_if:metode_pengambilan,diantar|nullable|string',
            'metode_pembayaran' => 'required_if:metode_pengambilan,diantar|nullable|in:tunai,transfer',
            'bukti_pembayaran' => 'required_if:metode_pengambilan,diantar|nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'tanggal_ambil' => 'required_if:metode_pengambilan,ambil_sendiri|nullable|date|after_or_equal:today',
        ]);

        $sparepart = Sparepart::findOrFail($request->produk_id);
        
        if ($sparepart->stok < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        $totalHarga = $sparepart->harga * $request->jumlah;
        $alamat = $request->metode_pengambilan == 'ambil_sendiri' 
            ? 'Ambil Sendiri di Lokasi' 
            : $request->alamat;
        
        $metodePembayaran = $request->metode_pengambilan == 'ambil_sendiri' ? 'tunai' : $request->metode_pembayaran;
        $dpDibayar = ($request->metode_pengambilan == 'diantar' && $request->metode_pembayaran == 'transfer') 
            ? ceil($totalHarga / 2) 
            : 0;

        $buktiBayar = null;
        if ($request->hasFile('bukti_pembayaran')) {
            $buktiBayar = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        }

        Order::create([
            'nama_pemesan' => $request->nama_pemesan,
            'no_telepon' => $request->no_telepon,
            'alamat' => $alamat,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'total_harga' => $totalHarga,
            'metode_pengambilan' => $request->metode_pengambilan,
            'metode_pembayaran' => $metodePembayaran,
            'dp_dibayar' => $dpDibayar,
            'bukti_pembayaran' => $buktiBayar,
            'tanggal_ambil' => $request->tanggal_ambil,
            'status' => 'pending',
        ]);

        $message = $request->metode_pengambilan == 'diantar' 
            ? 'Pesanan berhasil! Bukti pembayaran Anda sedang diverifikasi. Kami akan menghubungi Anda.'
            : 'Pesanan berhasil! Silakan ambil pesanan pada tanggal ' . date('d F Y', strtotime($request->tanggal_ambil)) . '. Kami akan menghubungi Anda.';

        return redirect()->route('sparepart')->with('success', $message);
    }
}
