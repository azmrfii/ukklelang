@extends('backend.layouts.sidebar')
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
        <h3 class="card-title">Riwayat Penawaran</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Handphone</th>
            <th>Barang Lelang</th>
            <th>Harga Awal</th>
            <th>Harga Penawaran</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($penawarans as $p)
            <tr>
                <td>{{ $p->masyarakat->nik }}</td>
                <td>{{ $p->masyarakat->name }}</td>
                <td>{{ $p->masyarakat->email }}</td>
                <td>{{ $p->masyarakat->no_hp }}</td>
                <td>{{ $p->lelang->barang->nama_barang }}</td>
                <td>{{ $p->lelang->barang->harga_awal }}</td>
                <td>{{ $p->harga_penawaran }}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Handphone</th>
            <th>Barang Lelang</th>
            <th>Harga Awal</th>
            <th>Harga Penawaran</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection