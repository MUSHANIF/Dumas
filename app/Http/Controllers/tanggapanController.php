<?php

namespace App\Http\Controllers;

use App\Models\tanggapan;
use App\Models\pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.tanggapan.index',[
        //     'pending' => pengaduan::where('status', 'belum di Proses')->count(),
        //     'success' => pengaduan::where('status', 'sudah di proses')->count(),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('pengaduans')->where('id', $request->pengaduanID)->update([
            'status' => $request->opsi,
            'update' => $request->tgl,
            'created_at' => $request->tgl,
        ]);

        if (empty(pengaduan::find($request->pengaduanID)->tanggapans)) {
            $model = new tanggapan;
            $model->pengaduanID = $request->pengaduanID;
            $model->tanggapan = $request->laporan;
            $model->image = $request->image;
            $model->update = $request->tgl;
            if ($image = $request->file('image')) {
                $destinationPath = 'assets/images/tanggapan';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $model['image'] = "$profileImage";
            }
            $model->save();
        }
       
        $datas =   pengaduan::find($request->pengaduanID)->tanggapans;

        $datas->tanggapan = $request->laporanbaru;
    
        $datas->update = $request->tgl;
     
  
    if ($image = $request->file('imagebaru')) {
        $destinationPath = 'assets/images/tanggapan';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $datas['image'] = "$profileImage";
    }
    $datas->save();

        toastr()->success('Berhasil di tanggapi!', 'Selamat');
        return redirect('admin/pengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $tanggapan =  DB::table('tanggapans')->get();

        $datas = pengaduan::findOrFail($id);

        // return $datas->tanggapans;

        return view('admin.tanggapan.index', compact('datas'), [
            'pending' => pengaduan::where('status', 'belum di Proses')->count(),
            'success' => pengaduan::where('status', 'sudah di proses')->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = tanggapan::find($id);
        return view('admin.tanggapan.index', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $model = tanggapan::find($id);
        // $model->tanggapan = $request->laporan;
        // $model->update = $request->tgl;



        // $model->save();
        DB::table('pengaduans')->where('id', $request->id)->update([
            'status' => $request->opsi,
            'update' => $request->tgl,
            'created_at' => $request->tgl,
        ]);
      $datas =   tanggapan::where('pengaduanID', $request->id);

            $datas->laporan = $request->laporan;
            $datas->image = $request->imagebaru;
            $datas->update = $request->tgl;
         
      
        if ($image = $request->file('imagebaru')) {
            $destinationPath = 'assets/images/tanggapan';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $datas['image'] = "$profileImage";
        }
        $datas->save();
        toastr()->success('Berhasil di tanggapi!', 'Selamat');
        return redirect('admin/index-sudah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(tanggapan $tanggapan)
    {
        //
    }
}
