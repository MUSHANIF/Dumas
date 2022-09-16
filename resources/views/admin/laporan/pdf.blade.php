<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html" ; charset="utf-8" />
      <title>Laporan</title>
      <style>
         * {
            box-sizing: border-box;
         }

         .table {
            width: 100%;
            border-collapse: collapse;
            page-break-after: always;
         }

         .table td,
         .table th {
            text-align: center;
         }

         .table th {
            background-color: #ff9106;
            color: black;
         }

         .table tbody:nth-child(even) {
            background-color: #f5f5f5;
         }

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

         .form-control {
         }

         .btn {
            background-color: #ff9106;
            color: white;
         }

         body {
            margin: 0;
         }
      </style>
   </head>
   <body>
      <div class="container">
			@if (!empty($pengaduan))
         <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 align-self-center text-center">List aduan sudah selesai</h2>
         <table class="table mt-3" cellpadding="10" cellspace="0">
            <thead class="align-self-center text-center">
               <th>No</th>
               <th>Nama</th>
               <th>Tanggal</th>
               <th>Status</th>
               <th>Aduan</th>
            </thead>
				@foreach ($pengaduan as $key) 
				@if ($key->status == "sudah di proses" )
            <tbody>
               <tr class="align-self-center text-center" style="border: 1px solid black">
                  <td data-label="No">{{ $loop->iteration }}</td>
                  <td data-label="Name">{{ $key->name }}</td>
                  <td data-label="Tanggal">{{ $key->update }}</td>
                  <td data-label="Status">
                     @if($key->status == 'belum di proses')
                     <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700"> {{ $key->status }} </span>
                     @elseif ($key->status == 'sedang di proses')
                     <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600"> {{ $key->status }} </span>
                     @else
                     <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100"> {{ $key->status }} </span>
                     @endif
                  </td>
                  <td data-label="Aduan">{{ $key->laporan }}</td>

                  <td class="text-center justify-content-center align-self-center">
                     <div class="row"></div>
                  </td>
               </tr>
            </tbody>
            @else 
				@endif 
				@endforeach
         </table>
			@else
			<h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200 text-center">Data Kosong</h2>
			@endif
      </div>
   </body>
</html>
