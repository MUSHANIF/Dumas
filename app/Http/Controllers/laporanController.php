<?php


namespace App\Http\Controllers;
use App\Models\pengaduan;
use App\Models\pengaduanadmin;
use App\Models\tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laporanController extends Controller
{
    public function index()
    {
        $datas = DB::table('pengaduans')->get();
        $pengaduan =  DB::table('users')
        ->join('pengaduans', 'pengaduans.userID', '=', 'users.id')
        ->orderBy('pengaduans.created_at','ASC')
        ->get();
        return view('admin.laporan.index', [
            'pengaduan' => $pengaduan,
            'datas' => $datas,
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
        ]);
       
    }
}
