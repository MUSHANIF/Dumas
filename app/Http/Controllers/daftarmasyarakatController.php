<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use App\Models\pengaduanadmin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class daftarmasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  DB::table('users')->where('level', '=', 'USER')->where('name', 'like', "%" . $cari . "%")->get();

        return view('superadmin.masyarakat.index', [
            'datas' => $datas,
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new User;
        $password = $request->password;
        $encrypted_password = bcrypt($password);
        $model->nik = $request->nik;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->hp = $request->hp;
        $model->level = $request->level;
        $model->password = $encrypted_password;

        $model->save();
        toastr()->success('Berhasil di buat!', 'Sukses');
        return redirect('superadmin/daftar-masyarakat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function show(pengaduanadmin $pengaduanadmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = User::find($id);
        return view('superadmin.masyarakat.ubah', compact('datas'), [
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $model = User::find($id);
        $model->nik = $request->nik;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->hp = $request->hp;
        $model->level = $request->opsi;

        $validasi = Validator::make($data, [
            'nik' => 'required|max:16|min:16',
            'name' => 'required|max:20',
            'email' => 'required|email|max:255',
            'hp' => 'required|max:15',



        ]);
        if ($validasi->fails()) {
            return redirect()->route('daftar-masyarakat.edit', [$id])->withInput()->withErrors($validasi);
        }
        $model->save();
        toastr()->success('Berhasil di terupdate!', 'Sukses');
        return redirect('superadmin/daftar-masyarakat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaduanadmin  $pengaduanadmin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kantin = User::find($id);
        $kantin->delete();
        toastr()->success('Berhasil di hapus!', 'Sukses');
        return redirect('superadmin/daftar-masyarakat');
    }
}
