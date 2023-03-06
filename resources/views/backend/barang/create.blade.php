@extends('backend.layouts.create')
@section('content')

  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Input Data Barang</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="nama_barang">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Harga Awal</label>
                <input type="number" class="form-control" placeholder="Enter ..." name="harga_awal">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <!-- textarea -->
              <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..." name="deskripsi"></textarea>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" id="" class="form-control">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add</button> |
          <a href="{{ route('barang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>

@endsection