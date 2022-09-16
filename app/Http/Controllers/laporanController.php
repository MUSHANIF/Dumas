<?php


namespace App\Http\Controllers;

use PDF;
use App\Models\pengaduan;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use App\Models\pengaduanadmin;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class laporanController extends Controller
{
    public function index(Request $request)
    {
        // Alert::info('Pemberitahuan!', 'Jika ingin mencari data,klik cari data terlebih dahulu  sesuai tanggal yang benar!,dan setelah itu akan muncul data nya.')->autoClose(false);
        $tgl = $request->tgl;
        $data = DB::table('tanggapans')->get();

        if ($request->tgl) {
            $pengaduan =  DB::table('users')
                ->where('pengaduans.update', '=', $tgl)
                ->join('pengaduans', 'pengaduans.userID', '=', 'users.id')
                ->orderBy('pengaduans.update', 'ASC')
                ->get();
        } else {
            $pengaduan =  DB::table('users')
                ->join('pengaduans', 'pengaduans.userID', '=', 'users.id')
                ->orderBy('pengaduans.update', 'ASC')
                ->get();
        }

        return view('admin.laporan.index', [
            'pengaduan' => $pengaduan,
            'data' => $data,
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
        ]);

        // $pdf = PDF::loadview('admin.laporan.pdf', compact('pengaduan')) ;
        // return $pdf->download('laporan.pdf');
        // return view('admin.laporan.pdf', [
        //     'pengaduan' => $pengaduan,
        //     'datas' => $datas,
        //     'data' => $data,
        //     'success' => pengaduan::where('status', 'sudah di proses')->count(),
        //     'pending' => pengaduan::where('status', 'belum di Proses')->count(),
        // ]);
    }
    public function pdf(Request $request)
    {
        $tgl = $request->tgl;
        $success = pengaduan::where('status', 'sudah di proses')->count();
        $pending = pengaduan::where('status', 'belum di Proses')->count();
        $pengaduan = pengaduan::where('update', '=', $tgl)->get();

        $pdf = PDF::loadview('admin.laporan.pdf', compact('pengaduan', 'pending', 'success'));
        return $pdf->download('laporan.pdf');
    }
}
