<?php

namespace App\Http\Controllers;
use App\Models\pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class daftaradminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  DB::table('users')->where('level', '=', 'ADMIN')->where('name','like',"%".$cari."%")->get();
       
        return view('superadmin.admin.index', [
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
        return view('superadmin.admin.create',[
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $model = new User;
        $password = $request->password;
        $encrypted_password = bcrypt($password);
        $model->nik = $request->nik;
        $model->name = $request->name;
        $model->email = $request->email;
        $model->hp = $request->hp;
        $model->level = $request->level;
        $model->password = $encrypted_password;
        
        $validasi = Validator::make($data,[
            'nik'=>'required|max:16|min:16|unique:users',
            'name'=>'required|max:20',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:8',
            'hp'=>'required|max:15',

        ]);
        if($validasi->fails())
        {
            return redirect()->route('daftar-admin.create')->withInput()->withErrors($validasi);
        }
        $model->save();
        toastr()->success('Berhasil di buat!', 'Sukses');
        return redirect('superadmin/daftar-admin');
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
    public function edit( $id)
    {
        $datas = User::find($id);
        return view('superadmin.admin.ubah', compact('datas'),[
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
        
        $validasi = Validator::make($data,[
            'nik'=>'required|max:16|min:16',
            'name'=>'required|max:20',
            'email'=>'required|email|max:255',
            'hp'=>'required|max:15',
           

        ]);
        if($validasi->fails())
        {
            return redirect()->route('daftar-admin.edit',[$id])->withInput()->withErrors($validasi);
        }
        $model->save();
        toastr()->success('Berhasil di terupdate!', 'Sukses');
        return redirect('superadmin/daftar-admin');
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
        toastr()->info('Berhasil di hapus!', 'Sukses');
        return redirect('superadmin/daftar-admin');
    }
}
