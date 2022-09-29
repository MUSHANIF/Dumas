@extends('admin.home')
@section('isi')

  <div class="container" style="position: relative;">
    
    <form action="{{ route('daftar-admin.store') }}" method="post" >
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">NIK</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="nik" value="{{ old('nik') }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Nama</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Email</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">No HP</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="hp" value="{{ old('hp') }}">
        </div>
      
            <input type="hidden" class="form-control" id="ProdID" name="level" value="ADMIN" required>
       
        <div class="form-group">
            <label for="formGroupExampleInput">Password</label>
            <input type="password" class="form-control" id="ProdID" name="password" required>
        </div>

         <button style="background-color: #FF9106; border: unset" type="submit" class="btn btn-primary mt-4">Tambah</button>
         <button type="reset" class="btn btn-danger mt-4">Reset</button>
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection