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
        <h3 class="card-title">Data User | <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Level</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($users as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->nip }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->level }}</td>
                <td>@if ($u->status == 1)
                    Aktif
                @else
                    Non-Aktif
                @endif
                </td>
                <td>
                    @if($u->status == 1)
                    <a class="btn btn-warning" href="{{ route('user.edit', $u->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a class="btn btn-info" href="{{ route('user.dochange', $u->id) }}"><i class="fa fa-lock" aria-hidden="true"></i></a>
                    <a class="btn btn-danger" href="/nonaktif/{{$u->id}}" onclick="return confirm('Are You sure to deactivate {{ $u->username }} account ?');"><i class="fa fa-ban" aria-hidden="true"></i></a>
                    @else
                    <a class="btn btn-info" href="/aktif/{{ $u->id }}" onclick="return confirm('Are You sure to activate {{ $u->username }} account ?');"><i class="fa fa-undo" aria-hidden="true"></i></a> <a href="">This account is deactivate</a>
                    @endif
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Level</th>
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