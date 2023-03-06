@extends('layouts.front')
@section('content')
<section class="padding-large">
	{{-- @foreach ($lelangs as $l => $item) --}}
	<div class="container">
		<div class="row">
			<div class="products-grid grid">
			@if ( Auth()->user()->masyarakat )
				@foreach ($lelangs as $l => $item)
				<figure class="product-style">
				  <img src="{{ asset('storage/' . $item->gambar) }}" alt="Books" class="product-item">
				  <a href="{{ route('barang.penawaran', $item->id) }}"><button type="submit" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button></a>
				  <figcaption>
					  <h3>{{ $item->nama_barang }}</h3>
					  <p>{{ $item->deskripsi }}</p>
					  <div class="item-price">IDR {{ number_format($item->harga_awal) }}</div>
				  </figcaption>
			  </figure>
			  @endforeach
			@endif
	    	</div>

		</div>
	</div>
</section> 
<section class="padding-large" style="background-color: white">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				  <h3 class="card-title">Riwayat Penawaran : {{ Auth::user()->username }}</h3>
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
					</tr>
					</thead>
					<tbody>
					  @foreach ($penawarans as $p)
					  <tr>
						  <td>{{ $p->masyarakat->nik }}</td>
						  <td>{{ $p->masyarakat->username }}</td>
						  <td>{{ $p->lelang->barang->nama_barang }}</td>
						  <td>{{ $p->lelang->barang->harga_awal }}</td>
						  <td>{{ $p->harga_penawaran }}</td>
					  </tr>
					  @endforeach
					</tbody>
					<tfoot>
					<tr>
					  <th>NIK</th>
					  <th>Username</th>
					  <th>Barang Lelang</th>
					  <th>Harga Awal</th>
					  <th>Harga Penawaran</th>
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
