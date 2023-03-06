@extends('front.layouts.front')
@section('content')
<section class="bg-sand padding-large">
	@foreach ($lelangs as $l => $item)
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="#" class="product-image"><img src="{{ asset('storage/' . $item->gambar) }}" width="400px"></a>
			</div>

			<div class="col-md-6 pl-5">
				<div class="product-detail">
					<h1>{{ $item->nama_barang }}</h1>
					<span class="price colored">IDR {{ number_format($item->harga_awal) }}</span>
					<p>
						{{ $item->deskripsi }}
					</p>
					<button type="submit" name="add-to-cart" value=""  data-bs-toggle="modal" data-bs-target="#exampleModal" class="button">Add to cart</button>
				</div>
			</div>
		</div>
	</div>
	  <!-- Modal -->
	  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <h1 class="modal-title fs-5" id="exampleModalLabel">Lakukan Penawaran : {{ $item->nama_barang }}</h1>
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ route('gotawar') }}" method="POST">
			@csrf
			@method('POST')
			<div class="modal-body">
				<label for="">Harga Penawaran</label>
				<input type="hidden" name="id_lelang" id="id_lelang" value="{{ $item->id }}">
				<input type="number" name="harga_penawaran" id="harga_penawaran" class="form-control" placeholder="Masukkan Harga Penawaran">
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Tawar</button>
			</div>
			</form>
		  </div>
		</div>
	  </div>
	  @endforeach
</section>
@endsection
