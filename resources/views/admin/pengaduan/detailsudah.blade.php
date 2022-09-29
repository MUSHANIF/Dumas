@extends('admin.home') 
@section('isi')
<main class="">
   <div class="container-grid px-6">
      <h4 class="m-3 font-semibold text-center text-gray-700 dark:text-gray-200">Detail Pengaduan</h4>

      <div class="w-full mb-8">
         <div class="w-full overflow-x-auto">
            <div class="text-gray-800 text-sm font-semibold px-4 py-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-200 dark:text-gray-100">
               <h5>Nama : {{ $item->name }}</h5>
               <h5 class="mt-4">No Telepon : {{ $item->user->hp }}</h5>
               <h5 class="mt-4">Tanggal : {{ $item->created_at->format('l, d F Y') }}</h5>
               <h5 class="mt-4">
                  Status : @if($item->status == 'belum di proses')
                  <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700"> {{ $item->status }} </span>
                  @elseif ($item->status == 'sedang di proses')
                  <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-900"> {{ $item->status }} </span>
                  @else
                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100"> {{ $item->status }} </span>
                  @endif
               </h5>
            </div>

            <div class="px-4 py-3 mb-8 flex block flex-wrap text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
               <div class="relative mr-3 dark:text-gray-400">
                  <h5 class="text-center mb-8 font-semibold">Foto Bukti</h5>
                  <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"> <img src="/assets/images/bukti/{{ $item->image }}" style="height: 300px; width: 450px" alt="Bukti Pengguna"/></a>
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">Detail Foto</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <img src="/assets/images/bukti/{{ $item->image }}" style="height: 100%; width: 100%" />
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="text-center flex-1 mx-auto mt-3 mt-lg-0">
                  <h5 class="mb-8 font-semibold">Keterangan</h5>
                  <p class="text-gray-800 dark:text-gray-400">{{ $item->laporan}}</p>
               </div>
            </div>

            @if (!empty($item->tanggapans))

            <div class="px-4 py-3 mb-8 flex block flex-wrap text-gray-800 bg-white rounded-lg shadow-md dark:bg-gray-800">
               @if (!empty($item->tanggapans->image))
               <div class="relative mr-3 dark:text-gray-400">
                  <h5 class="text-center mb-8 font-semibold">Foto Bukti dari Petugas</h5>
                  <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal1"> <img src="/assets/images/tanggapan/{{ $item->tanggapans->image }}" style="height: 300px; width: 450px" alt="Bukti Petugas"/></a>
                  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">Detail Foto</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <img src="/assets/images/tanggapan/{{ $item->tanggapans->image }}" style="height: 100%; width: 100%" />
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               @endif
               <div class="text-center flex-1 mx-auto mt-3 md:mt-0">
                  <h5 class="mb-8 font-semibold">Tanggapan</h5>
                  <p class="text-gray-800 dark:text-gray-400">{{ $pengaduan->tanggapan }}</p>
               </div>
            </div>
            
         </div>
      </div>
      @endif {{--
      <div class="flex justify-center my-4">
         <a href="" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Export ke PDF
         </a>
      </div>
      --}}
   </div>
</main>
@if ($item->status == "sudah di proses")
@else
<div class="text-center justify-center my-6">
   <a href="{{ route('tanggapan.show',$item->id) }}" class="btn btn-warning px-3 py-3"> Berikan Tanggapan </a>
</div>
@endif
@endsection
