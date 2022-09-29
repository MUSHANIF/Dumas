@extends('admin.home') @section('search')
<form action="{{ url('admin/pengaduan/') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
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
<a href="{{ route('index-sudah.index') }}" class="d-inline-block btn btn-sm text-white shadow-sm" style="background-color: #256d85"> Sedang di proses</a>
@endsection 

@section('isi')
<div>
   @if ($coba->isNotEmpty())

   <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">List Aduan</h2>
   <table class="table mt-3" cellpadding="10" cellspace="0">
      <thead class="align-self-center text-center">
         <th class="text-light">Foto</th>
         <th class="text-light">Nama</th>
         <th class="text-light">Tanggal</th>
         <th class="text-light">Status</th>
         <th class="text-light">Action</th>
      </thead>

      @foreach ($pengaduan as $key) 
      <tbody>
      @if ($key->status == "belum di proses")
         <tr class="align-self-center text-center" style="border: 1px solid black">
            <td data-label="images"><img src="/assets/images/bukti/{{ $key->image }}" style="height: 100px; width: 150px" /></td>
            <td data-label="Name">{{ $key->name }}</td>
            <td data-label="Tanggal">{{ date('d-M-Y', strtotime($key->created_at)) }}</td>
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
               <form method="GET" action="{{ route('pengaduan.show', $key->id )}}">
                  <button class="btn btn-info">lihat detail</button>
               </form>
            </td>
         </tr>
        @else 
        @endif 
    </tbody>
    @endforeach 
   </table>
   
   @else
   <div id="error">
      <div class="container text-center">
         <div class="pt-8">
            <h1 class="errors-titles">404</h1>
            <p>Data Kosong, tidak ada pengaduan</p>
         </div>
      </div>
   </div>
   @endif
</div>

@endsection
