<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
      <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
      <!-- Custom styles for this template-->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
      <link rel="icon" href="{{ asset('img/favicon.svg')}}" />
      <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
      <style>
         body {
            margin: 0;
            background-color: #3e7dbc;
         }
         canvas {
            display: block;
            vertical-align: bottom;
         }
         /* ---- particles.js container ---- */
         #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            /* background-color: #2b4865; */
            background-image: url("");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 50% 50%;
         } /* ---- stats.js ---- */
         .count-particles {
            background: #000022;
            position: absolute;
            top: 48px;
            left: 0;
            width: 80px;
            color: #0078aa;
            font-size: 0.8em;
            text-align: left;
            text-indent: 4px;
            line-height: 14px;
            padding-bottom: 2px;
            font-family: Helvetica, Arial, sans-serif;
            font-weight: bold;
         }
         .js-count-particles {
            font-size: 1.1em;
         }
         #stats,
         .count-particles {
            -webkit-user-select: none;
            margin-top: 5px;
            margin-left: 5px;
         }
         #stats {
            border-radius: 3px 3px 0 0;
            overflow: hidden;
         }
         .count-particles {
            border-radius: 0 0 3px 3px;
         }

         .navbar > .container > .navbar-brand {
            color: white;
            text-shadow: 1px 1px 5px #0078aa;
         }
      </style>
      <title>Dumas | Detail Pengaduan</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
         <div class="container">
            <a class="navbar-brand" href="#">Dumas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Selamat Datang,{{ Auth::user()->name }} </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/tanggapanuser">Kembali</a></li>

                        <li>
                           <a
                              class="dropdown-item"
                              href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"
                           >
                              {{ __('Logout') }}
                           </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

      <div class="container">
         <div class="row">
            <div class="col">
               <div class="container-grid px-6">
                  <h4 class="m-3 font-semibold text-center text-white dark:text-gray-200">Detail Pengaduan</h4>

                  <div class="w-full mb-8">
                     <div class="w-full overflow-x-auto">
                        @foreach($item->details as $ite)
                        <div class="text-white px-4 py-4 mb-3 rounded-lg" style="background-color: #2f5463">
                           <h5>Nama : {{ $ite->name }}</h5>
                           {{--
                           <h2 class="mt-4">NIK : {{ $ite->nik }}</h2>
                           --}}
                           <h5 class="mt-4">No Telepon : {{ $item->user->hp }}</h5>
                           <h5 class="mt-4">Tanggal : {{ $ite->created_at->format('l, d F Y - H:i:s') }}</h5>
                           <h5 class="mt-4">
                              Status : @if($ite->status == 'belum di proses')
                              <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700"> {{ $ite->status }} </span>
                              @elseif ($ite->status == 'sedang di proses')
                              <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-900"> {{ $ite->status }} </span>
                              @else
                              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100"> {{ $ite->status }} </span>
                              @endif
                           </h5>
                        </div>

                        <div class="px-4 py-3 mb-4 text-white rounded-lg text-center" style="background-color: #2f5463">
                           <div class="relative hidden me-3 md:block dark:text-gray-400">
                              <h5 class="text-center mb-3 font-semibold">Foto Bukti</h5>
                              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"> <img class="w-100 mb-2" src="/assets/images/bukti/{{ $ite->image }}" style="height: 300px; max-width: 450px; min-width: 100px;" /></a>
                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <h5 class="modal-title text-center justify-content-center text-dark" id="exampleModalLabel">Detail Foto</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                          <img class="h-32 w-35" src="/assets/images/bukti/{{ $ite->image }}" style="height: 100%; width: 100%" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="text-center flex dark:text-white-400 my-2">
                              <h5 class="mb-8 font-semibold">Keterangan</h5>
                              <p class="text-white dark:text-white m-auto">{{ $ite->laporan}}</p>
                           </div>
                        </div>

                        <div class="px-4 py-3 mb-3 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" style="background-color: #2f5463">
                           <div class="text-center d-flex flex-column justify-content-center align-items-center">
                              <h5 class="text-center text-white mb-3">Tanggapan</h5>
                              <p class="text-light dark:text-gray-400 m-auto bg-dark px-2 py-1 rounded">@foreach ($pengaduan as $adu) {{ $adu->tanggapan }} @endforeach</p>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
