<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;


class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduanReview = Pengaduan::where('status', 'masuk')->get();
        if ($pengaduanReview->isEmpty()) {
            $Status = 'not_found';
        } else {
            $Status = 'success';
        }
        return view('web.formulir_pengaduan', [
            "title" => "Formulir Pengaduan",
            "pengaduanReview" => $pengaduanReview,
            "Status" => $Status,

        ]);
    }

    public function cariPengaduan(Request $request)
    {
        $ticketNumber = $request->input('ticket_number');
        $pengaduan = Pengaduan::where('ticket_number', $ticketNumber)->get();

        if ($pengaduan->isEmpty()) {
            $Status = 'not_found';
        } else {
            $Status = 'success';
        }

        return view('web.cari-tiket', [
            "title" => "Cari Pengaduan",
            "pengaduan" => $pengaduan,
            "Status" => $Status,
        ]);
    }



    public function submit(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string',
            'no_hp' => 'required|string',
            'opd' => 'required|string',
            'isi-pengaduan' => 'required|string',
            'lampiran' => 'file|mimes:pdf,doc,docx,jpg,jpeg,png',
            'status' => 'in:masuk,proses,selesai',
        ]);

        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $lampiran = $request->file('lampiran');
            $lampiranPath = time() . '.' . $lampiran->extension();
            $lampiran->move(public_path('storage/pengaduan'), $lampiranPath);
        }
        $ticketNumber = 'TIKET-' . date('Y') . '-' . str_pad(Pengaduan::count() + 1, 3, '0', STR_PAD_LEFT);

        // Membuat pengaduan baru
        Pengaduan::create([
            'ticket_number' => $ticketNumber,
            'name' => $request->input('name'),
            'no_hp' => $request->input('no_hp'),
            'opd' => $request->input('opd'),
            'isi_pengaduan' => $request->input('isi-pengaduan'),
            'lampiran' => $lampiranPath,
            'status' => $request->input('status'),
        ]);
        session(['pengaduan_terkirim' => true]);
        return redirect('formulir_pengaduan')->with('sukses', 'Pengaduan berhasil dikirim.', 'error', 'Gagal, Silahkan Coba Lagi');
    }

    public function updateStatus($id, $status)
    {
        // Cari pengaduan berdasarkan ID
        $pengaduan = Pengaduan::find($id);

        // Periksa apakah pengaduan ditemukan
        if (!$pengaduan) {
            return redirect()->back()->with('error', 'Pengaduan tidak ditemukan');
        }

        // Update status pengaduan
        $pengaduan->status = $status;
        $pengaduan->save();

        return redirect()->back()->with('sukses', 'Status berhasil diperbarui');
    }

    public function viewPengaduan()
    {
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', [
            "title" => "Pengaduan",
            "pengaduan" => $pengaduan,
        ]);
    }
}
