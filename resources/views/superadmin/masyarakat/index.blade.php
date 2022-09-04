@extends('admin.home')
@section('search')
<form action="{{ url('superadmin/daftar-masyarakat/') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    @csrf
<div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
        aria-label="Search" aria-describedby="basic-addon2" name="cari" value="{{ request('cari') }}">
    <div class="input-group-append">
        <button class="btn" style="background-color: #256D85;" type="submit">
            <i class="fas fa-search fa-sm text-white"></i>
        </button>
    </div>
</div>
</form>
@endsection
{{-- @section("button")
<a href="{{ route('daftar-masyarakat.create') }}" class="d-none d-sm-inline-block btn btn-sm text-white  shadow-sm" style="background-color: #ff9106;"><i
    class="fas fa-download fa-sm text-white"></i>Tambah</a>
@endsection --}}
@section('isi')

   
<div class="container">
    @if ($datas->isNotEmpty())
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Akun masyarakat
      </h2>
    
    <table class="table mt-3" cellpadding="10" cellspace="0">
        <thead class="align-self-center text-center">
            
            <th>NIk</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No-Hp</th>
            <th>Action </th>
            
        </thead>
       
        @foreach ($datas as $key) 
        <tbody>
            <tr class="align-self-center" style="border: 1px solid black;">
            
                <td data-label="">{{ $key->nik }}</td>
                <td data-label="">{{ $key->name }}</td>
                <td data-label="">{{ $key->email }}</td>
                <td data-label="">{{ $key->hp }}</td>
                  <td class="text-center justify-content-center align-self-center d-flex">
                    
                    <a class="btn btn-info" href="{{ route('daftar-masyarakat.edit',$key->id)}}">Ubah</a>
                    <form action="{{ url('superadmin/daftar-masyarakat/'.$key->id) }}" method="POST" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger ms-2">Delete</button>
                    </form>
                </td>
            
            </tr>
        </tbody>
        @endforeach
       

    </table>
    @else
    <div id="error">
        <div class="container text-center">
        <div class="pt-8">
            <h1 class="errors-titles">404</h1>
            <p>Data Kosong,tidak ada akun!</p>
           
          </div>
        </div>
    </div>
          @endif
</div>
    
@endsection