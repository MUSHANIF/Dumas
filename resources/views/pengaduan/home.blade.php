<?php
$tanggal = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
      <style>
         body {
            margin: 0;
            background-color: #3b75af;
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
            background-color: #3b75af;
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

         .navbar > .container > .navbar-brand {
            color: white;
            text-shadow: 1px 1px 5px #0078aa;
         }

         .buttonS:hover {
            background-color: #32a270 !important;
         }
      </style>
      <title>Dumas | Form Pengaduan</title>
   </head>
   <body class="position-relative">
      @include('sweetalert::alert')
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
         <div class="container">
            <a class="navbar-brand fs-3" href="/"><span><img src="/assets/logo1.png" alt="" style="width: 100px;"></span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">

               @if ($data->isNotEmpty())
               <a href="/" class="nav-container me-3 offset-lg-4" style="text-decoration: none; color: white;">Home</a>
               |
               <a href="{{ route('tanggapanuser.index') }}" class="nav-container ms-3" style="text-decoration: none; color: white;">List Pengaduan Anda</a>

               @endif

               <ul class="navbar-nav ms-auto">
                  <li class="nav-item dropdown">
                     <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Selamat Datang,{{ Auth::user()->name }} </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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

      <div id="particles-js"></div>

      <div class="container position-relative mt-5">
         <form action="{{ url('pengaduan/home') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row shadow-md dark:bg-gray-800">
               <input class="form-control" type="hidden" name="id" value="{{ Auth::user()->id }}" id="formFile" />
               <input class="form-control" type="hidden" name="name" value="{{ Auth::user()->name }}" id="formFile" />
               <input class="form-control" type="hidden" name="tgl" value="{{ $tanggal }}" id="formFile" />

               <div class="row mb-3 ms-1">
                  <div class="col-md-6">
                     <label for="exampleFormControlTextarea1" class="form-label">NIK</label>
                     <input class="form-control text-muted bg-grey" type="text" disabled name="nik" value="{{ Auth::user()->nik }}" id="formFile" />
                  </div>
                  <div class="col-md-6">
                     <label for="exampleFormControlTextarea1" class="form-label">Nama</label>
                     <input class="form-control text-muted bg-grey"" type="text" disabled value="{{ Auth::user()->name }}" id="formFile" />
                  </div>
               </div>

               <div class="row mb-3 ms-1">
                  <div class="col-md-6">
                     <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                     <input class="form-control text-muted bg-grey"" type="text" disabled name="nik" value="{{ Auth::user()->email }}" id="formFile" />
                  </div>
                  <div class="col-md-6">
                     <label for="exampleFormControlTextarea1" class="form-label">No Handphone</label>
                     <input class="form-control text-muted bg-grey"" type="text" disabled name="hp" value="{{ Auth::user()->hp }}" id="formFile" />
                     <input class="form-control" type="hidden" name="status" value="belum di proses" id="formFile" />
                  </div>
               </div>
               <div class="row mb-3 ms-1">
                  <div class="col">
                     <label for="exampleFormControlTextarea1" class="form-label">Keluhan</label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" name="pengaduan" rows="3"></textarea>
                  </div>
               </div>
               <div class="row mb-3 ms-1">
                  <div class="col">
                     <label for="formFile" class="form-label">Foto Bukti</label>
                     <input class="form-control" type="file" name="image" id="image" />
                     <img id="preview-image-before-upload" src="" alt="" style="width: 250px" class="mt-3" />
                  </div>
               </div>
            </div>
            <button type="submit" class="btn btn-success mt-4 buttonS" style="background-color: #3ea376; color: white">Kirim</button>
            <button type="reset" class="btn btn-danger mt-4">Reset Pengaduan</button>
         </form>
         {{-- <div class="row mt-5">
            <div class="col justify-content-center text-center align-items-center">
               <a href="{{ route('tanggapanuser.index' )}}" class="btn btn-success buttonS" style="background-color: #3ea376; color: white; padding: 12px;">Aduan Anda </a>
            </div>
         </div> --}}
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

      <script type="text/javascript">
         $(document).ready(function (e) {
            $("#image").change(function () {
               let reader = new FileReader();

               reader.onload = (e) => {
                  $("#preview-image-before-upload").attr("src", e.target.result);
               };

               reader.readAsDataURL(this.files[0]);
            });
         });
      </script>
      <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script>
         particlesJS("particles-js", {
            particles: {
               number: { value: 80, density: { enable: true, value_area: 800 } },
               color: { value: "#ffffff" },
               shape: { type: "square", stroke: { width: 0, color: "#ffffff" }, polygon: { nb_sides: 5 }, image: { src: "img/github.svg", width: 100, height: 100 } },
               opacity: { value: 0.5, random: false, anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false } },
               size: { value: 3, random: true, anim: { enable: false, speed: 40, size_min: 0.1, sync: false } },
               line_linked: { enable: true, distance: 150, color: "#ffffff", opacity: 0.4, width: 1 },
               move: { enable: true, speed: 6, random: true, straight: false, out_mode: "out", bounce: false, attract: { enable: false, rotateX: 600, rotateY: 1200 } },
            },
            interactivity: {
               detect_on: "canvas",
               events: { onhover: { enable: false, mode: "repulse" }, onclick: { enable: false, mode: "push" }, resize: true },
               modes: { grab: { distance: 400, line_linked: { opacity: 1 } }, bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 }, repulse: { distance: 200, duration: 0.4 }, push: { particles_nb: 4 }, remove: { particles_nb: 2 } },
            },
            retina_detect: true,
         });
         var count_particles, stats, update;
         stats = new Stats();
         stats.setMode(0);
         stats.domElement.style.position = "absolute";
         stats.domElement.style.left = "0px";
         stats.domElement.style.top = "0px";
         document.body.appendChild(stats.domElement);
         count_particles = document.querySelector(".js-count-particles");
         update = function () {
            stats.begin();
            stats.end();
            if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
               count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
            }
            requestAnimationFrame(update);
         };
         requestAnimationFrame(update);
      </script>
   </body>
</html>
