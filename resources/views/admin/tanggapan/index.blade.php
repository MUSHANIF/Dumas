<?php
$tanggal = date("Y-m-d");
?>
@extends('admin.home')

@section('isi')
<div class="container" style="position: relative;">
    
  <form action="{{ route('tanggapan.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
  <div class="row">
      <div class="col mb-3">
          <input class="form-control" type="hidden" name="pengaduanID" value="{{ $datas->id }}"  id="formFile">
          <input class="form-control" type="hidden" name="tgl" value="{{ $tanggal }}"  id="formFile">
          @if ($datas->tanggapans)
          <label for="exampleFormControlTextarea" class="form-label">Tanggapan Lama</label>
          <textarea class="form-control mb-2" id="exampleFormControlTextarea" disabled rows="3" required>{{ $datas->tanggapans->tanggapan }}</textarea>
          @endif
          <label for="exampleFormControlTextarea1" class="form-label">Tanggapan</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="laporan" rows="3" required></textarea>
        </div>
  </div>
  <div class="row">
      <div class="mb-3">
          <label for="formFile" class="form-label">Pilih status</label>
          <select class="form-select" aria-label="Default select example" name="opsi" required>

            <option value="sedang di proses">Sedang di proses</option>
            <option value="sudah di proses">Sudah di proses</option>

          </select>
        </div>
  </div>
  <button type="submit" class="btn btn-primary">Kirim</button>
</form>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection