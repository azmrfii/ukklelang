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
        <h3 class="card-title">Data Lelang |  <a href="{{ route('lelangtambah') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Barang</th>
            <th>Harga Awal</th>
            <th>Penawaran Akhir</th>
            <th>Penanggung Jawab</th>
            <th>Penawar Terakhir</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($lelangs as $l)
            <tr>
              <td>{{ $l->tgl_mulai }}</td> 
              <td>{{ $l->tgl_akhir }}</td>
              <td>{{ $l->barang->nama_barang}}</td>
              <td>Rp. {{ number_format($l->harga_awal) }}</td>
              <td>Rp. {{ number_format($l->harga_akhir) }}</td>
              {{-- <td>{{ $l->harga_akhir }}</td> --}}
              <td>{{ $l->user->username }}</td>
              <td>{{ @$l->masyarakat->username }}</td>
              <td>{{ $l->status }}</td>
              <td>
                @if ($l->status == 'open')
                <a href="{{ route('lelang.edit', $l->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                <a href="/cancel/{{ $l->id }}" class="btn btn-info" onclick="return confirm('Are You sure to cancel {{ $l->barang->nama_barang }} ?');"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a href="/closed/{{ $l->id }}" class="btn btn-danger" onclick="return confirm('Are You sure to closed {{ $l->barang->nama_barang }} ?');"><i class="fa fa-ban" aria-hidden="true"></i></a>
                @elseif($l->status == 'cancel')
                <a href="/open/{{ $l->id }}" class="btn btn-info" onclick="return confirm('Are You sure to open {{ $l->barang->nama_barang }} ?');"><i class="fa fa-undo" aria-hidden="true"></i></a><a href="">Open Lelang Again</a>
                @else
                <a href="#" class="btn btn-danger">Lelang is closed</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Tanggal Mulai</th>
            <th>Tanggal Akhir</th>
            <th>Barang</th>
            <th>Harga Awal</th>
            <th>Penawaran Akhir</th>
            <th>Penanggung Jawab</th>
            <th>Penawar Terakhir</th>
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