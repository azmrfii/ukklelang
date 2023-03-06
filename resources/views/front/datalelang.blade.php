@extends('front.layouts.front')
@section('content')
<section class="padding-large">
	{{-- @foreach ($lelangs as $l => $item) --}}
	<div class="container">
		<div class="row">
			<div class="products-grid grid">
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
	    	</div>

		</div>
	</div>
</section> 
@endsection
