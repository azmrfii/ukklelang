@extends('layouts.front')
@section('content')
<section class="padding-large" style="background-color: white">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				  <h3 class="card-title">Riwayat Pemenang Lelang</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
				  <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
					  <th>NIK</th>
					  <th>Username</th>
					  <th>Barang Lelang</th>
					  <th>Harga Awal</th>
					  <th>Harga Penawaran</th>
					  <th>Status</th>
					</tr>
					</thead>
					{{-- <tbody>
					  @foreach ($penawarans as $p)
                      @if ($p->lelang->confirm_date != null)
                      <tr>
                        <td>{{ $p->masyarakat->nik }}</td>
                        <td>{{ $p->masyarakat->username }}</td>
                        <td>{{ $p->lelang->barang->nama_barang }}</td>
                        <td>{{ $p->lelang->barang->harga_awal }}</td>
                        <td>{{ $p->harga_penawaran }}</td>
                        <td>{{ $p->lelang->status }}</td>
                    </tr>
                      @endif
					  @endforeach
					</tbody> --}}
					<tbody>
					  @foreach ($lelangs as $l)
                      @if ($l->confirm_date != null)
                      <tr>
						<td>{{ @$l->masyarakat->nik }}</td>
						<td>{{ @$l->masyarakat->username }}</td>
                        <td>{{ $l->barang->nama_barang}}</td>
						<td>Rp. {{ number_format($l->harga_awal) }}</td>
						<td>{{ $l->harga_akhir }}</td>
						<td>{{ $l->status }}</td>
                    </tr>
                      @endif
					  @endforeach
					</tbody>
					<tfoot>
					<tr>
					  <th>NIK</th>
					  <th>Username</th>
					  <th>Barang Lelang</th>
					  <th>Harga Awal</th>
					  <th>Harga Penawaran</th>
					  <th>Status</th>
					</tr>
					</tfoot>
				  </table>
				</div>
				<!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
</section>


@endsection
