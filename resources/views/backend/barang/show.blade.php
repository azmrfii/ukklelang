{{-- {{ $gambar->barang->nama_barang }} --}}
@extends('backend.layouts.edit')
@section('content')
<div class="col-12">
    @if (Session::get('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('alert') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Barang | <a href="{{ route('barang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Harga Awal</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <tr>
            <td>{{ $gambar->barang->nama_barang }}</td>
            <td>{{ $gambar->barang->deskripsi }}</td>
            <td>IDR {{ number_format($gambar->barang->harga_awal) }}</td>
            <td><img src="{{ asset('storage/' . $gambar->gambar) }}" alt="" width="100px"></td>
            <td>{{ $gambar->barang->status }}</td>
            <td>
              @if ($gambar->barang->status == 'new')
             <a href="">This barang is ready</a>
              @else
              <a href="">This barang is delivery</a>                  
              @endif
              </td>
            </tr>
          </tbody>
          <tfoot>
          <tr>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Harga Awal</th>
            <th>Gambar</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection