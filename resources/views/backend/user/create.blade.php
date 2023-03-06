@extends('backend.layouts.create')
@section('content')

  <div class="col-md-12">
    <div class="card card-warning">
      <div class="card-header">
        <h3 class="card-title">Input Data User</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('user.store') }}" method="post">
        @csrf
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="name">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter ..." name="username">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>NIP</label>
                    <input type="number" class="form-control" placeholder="Enter ..." name="nip">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter ..." name="email">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Enter ..." name="password">
                </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Level</label>
                <select name="level" id="" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="petugas">Petugas</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add</button> |
          <a href="{{ route('user.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>

@endsection
