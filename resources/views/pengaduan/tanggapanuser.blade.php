<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />

      <title>Dumas | List aduan</title>

      <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
      <link rel="icon" href="{{ asset('img/favicon.svg')}}" />
      <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
      <style>
        * {
           box-sizing: border-box;
        }
     
        .navbar {
           color: white;
           padding-bottom: 20px;
        }
        .nav-link {
           color: white;
        }
        .container label {
           color: white;
        }
     
        .table {
           width: 100%;
        }
     
        .table td,
        .table th {
           text-align: center;
           color: white;
        }
     
        .table th {
           /* background-color: #00bfff; */
           border: none;
        }
     
     
        /* Ini Responsivenya */
        @media (max-width: 768px) {
           .table thead {
              display: none;
           }
     
           .table,
           .table tbody,
           .table tr,
           .table td {
              display: block;
              width: 100%;
           }
     
           .table tr {
              margin-bottom: 15px;
           }
     
           .table td {
              text-align: right;
              position: relative;
           }
     
           .table td::before {
              content: attr(data-label);
              position: absolute;
              left: 0;
              width: 50%;
              padding-left: 15px;
              font-size: 15px;
              font-weight: bold;
              text-align: left;
           }
        }
     
        @media (max-width: 500px) {
           .table thead {
              display: none;
           }
     
           .table,
           .table tbody,
           .table tr,
           .table td {
              display: block;
              width: 100%;
           }
     
           .table tr {
              margin-bottom: 15px;
           }
     
           .table td {
              text-align: right;
              position: relative;
           }
     
           .table td::before {
              content: attr(data-label);
              position: absolute;
              left: 0;
              width: 50%;
              padding-left: 15px;
              font-size: 15px;
              font-weight: bold;
              text-align: left;
           }
        }
     
        /* End Responsive */
     
        .title {
           color: #adadad;
           text-align: center;
        }
     
        .subtitle a {
           color: white;
           text-decoration: none;
           float: left;
           padding-top: 1px;
        }
     
        .subtitle a:hover {
           color: #dbd7e6;
           text-decoration: none;
        }
     
        @media (max-width: 500px) {
           .subtitle a {
              font-size: 15px;
              padding-top: 3px;
           }
        }
     
        @media (max-width: 768px) {
           .subtitle a {
              padding-top: 1px;
           }
        }
     
        .btn {
           background-color: #2b87a6;
           color: white;
        }

        .btn:hover {
           background-color: #227895;
        }
     
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
           background-color: #ffffff;
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
      <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
   </head>

   <body id="page-top">
      @include('sweetalert::alert')

      <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
         <div class="container">
            <a class="navbar-brand" href="/"><span><img src="/assets/logo1.png" alt="" style="width: 100px;"></span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
               <ul class="navbar-nav ms-auto">
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Selamat Datang,{{ Auth::user()->name }} </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/pengaduan/home">Kembali</a></li>

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

      <section id="bg">
         <div class="container">
            <div class="table-responsive">
               <div class="container">
                  <h2 class="text-light text-center">List Aduan Anda</h2>
                  <table class="table mt-3 table-striped text-light table-dark" cellpadding="10" cellspace="0">
                     <thead class="">
                        <th class="text-light">Foto</th>
                        <th class="text-light">Nama</th>
                        <th class="text-light">Tanggal</th>
                        <th class="text-light">Status</th>
                        <th class="text-light" colspan="2">Action</th>
                     </thead>
                     @foreach ($datas as $key)

                     <tbody>
                        <tr class="" style="border: 1px solid black">
                           <td data-label="images"><img src="/assets/images/bukti/{{ $key->image }}" style="height: 100px; width: 150px" /></td>

                           <td data-label="Name">{{ $key->name }}</td>
                           <td data-label="Tanggal">{{ $key->created_at }}</td>
                           
                              @if($key->status == 'belum di proses')
                              <td data-label="Status">
                              <span class="px-2 py-1 rounded-md  text-white bg-danger"> {{ $key->status }} </span>
                           </td>
                              @elseif ($key->status == 'sedang di proses')
                              <td data-label="Status">
                              <span class="px-2 py-1 rounded-md  text-white bg-warning"> {{ $key->status }} </span>
                           </td>
                              @else
                              <td data-label="Status">
                              <span class="px-2 py-1 rounded-md  text-white bg-success"> {{ $key->status }} </span>
                           </td>
                              @endif
                           
                           <td class="">
                              <form method="GET" action="{{ route('tanggapanuser.show', $key->id )}}">
                                 <button class="btn btn-info">lihat detail</button>
                              </form>
                           </td>
                        </tr>
                        @empty($key)
                        <tr>
                           <td colspan="7" class="text-center">Data Kosong</td>
                        </tr>
                        @endempty
                     </tbody>

                     @endforeach
                  </table>
               </div>
            </div>
         </div>

         <!-- End of Content Wrapper -->
      </section>
      <!-- End of Page Wrapper -->

      <!-- Bootstrap core JavaScript-->
      <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
      <script src="/vendor/jquery/jquery.min.js"></script>
      <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <!-- Core plugin JavaScript-->
      <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="/js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="/vendor/chart.js/Chart.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="/js/demo/chart-area-demo.js"></script>
      <script src="/js/demo/chart-pie-demo.js"></script>
   </body>
</html>
