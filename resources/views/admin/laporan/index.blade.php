<?php
$tanggal = date("Y-m-d");
?>
@extends('admin.home') 

@section('search')
<form action="{{ url('admin/product/'.Auth::user()->StoreID) }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
   @csrf
   <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="cari" value="{{ request('cari') }}" />
      <div class="input-group-append">
         <button class="btn" style="background-color: #256d85" type="submit">
            <i class="fas fa-search fa-sm text-white"></i>
         </button>
      </div>
   </div>
</form>
@endsection 

@section("button")
<div class="container">
   <div class="row">
      <div class="col-md-6">
         <form action="{{ url('/admin/pdf') }}" method="GET">
            @csrf
            <br />
            <div class="container-fluid">
               <div class="form-group row">
                  <div class="col-lg-6">
                     <input type="date" class="form-control input-sm" name="tgl" id="toDate" value="{{ $tanggal }}" required />
                  </div>
                  <div class="col-lg-6 mt-lg-0 mt-2">
                     <button type="submit" class="btn btn-primary" name="search" title="Search">Download Data</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="col-md-6">
         <form action="{{ url('/admin/laporan') }}" method="GET">
            @csrf
            <br />

            <div class="container-fluid">
               <div class="form-group row">
                  <div class="col-lg-6">
                     <input type="date" class="form-control input-sm" name="tgl" id="toDate" value="{{ $_GET['tgl'] ?? $tanggal }}" required />
                  </div>
                  <div class="col-lg-6 mt-lg-0 mt-2">
                     <button type="submit" class="btn btn-primary" name="search" title="Search">Cari Data</button>
                  </div>
               </div>
            </div>
         </form>
      </div>

      @endsection 

      @section('isi')
      <div class="container">
         <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 text-capitalize">List aduan sudah selesai
            {{-- {{ !empty($_GET["tgl"]) ? "pada " . $_GET['tgl'] : '' }} --}}
            {{ !empty($_GET["tgl"]) ? "pada " . date('d-M-Y', strtotime($_GET['tgl'])) : 'hari ini' }}
         </h2>
         <table class="table mt-3" cellpadding="10" cellspace="0">
            <thead class="align-self-center text-center">
               <th class="text-light">Foto</th>
               <th class="text-light">Nama</th>
               <th class="text-light">Tanggal</th>
               <th class="text-light">Status</th>
               <th class="text-light">Action</th>
            </thead>

            @foreach ($pengaduan as $key) 
            @if ($key->status == "sudah di proses")
            <tbody>
               <tr class="align-self-center text-center" style="border: 1px solid black">
                  <td data-label="images"><img src="/assets/images/bukti/{{ $key->image }}" style="height: 100px; width: 150px" /></td>

                  <td data-label="Name">{{ $key->name }}</td>
                  <td data-label="Tanggal">{{ date('d-M-Y', strtotime($key->update)) }}</td>
                  <td data-label="Cost">
                     @if($key->status == 'belum di proses')
                     <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700"> {{ $key->status }} </span>
                     @elseif ($key->status == 'sedang di proses')
                     <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600"> {{ $key->status }} </span>
                     @else
                     <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100"> {{ $key->status }} </span>
                     @endif
                  </td>
                  <td class="text-center justify-content-center align-self-center">
                     <div class="row">
                        <div class="col">
                           <form method="GET" action="{{ route('index-sudah.show', $key->id )}}">
                              <button class="btn btn-info">Lihat Detail</button>
                           </form>
                        </div>
                     </div>
                  </td>
               </tr>
               @empty($key)
               <tr>
                  <td colspan="7" class="text-center text-gray-400">Data Kosong</td>
               </tr>
               @endempty
            </tbody>
            @else 
            @endif 
            @endforeach
         </table>
      </div>

      @endsection
   </div>
</div>
