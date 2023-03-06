@extends('backend.layouts.create')
@section('content')

  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Input Data Barang</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('lelangadd') }}" method="post">
            @csrf
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Barang</label>
                <select class="form-control" id="position-option" name="id_barang">
                    @foreach ($barangs as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" class="form-control" placeholder="Enter ..." name="tgl_mulai">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" class="form-control" placeholder="Enter ..." name="tgl_akhir">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add</button> |
          <a href="{{ route('lelang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>

@endsection