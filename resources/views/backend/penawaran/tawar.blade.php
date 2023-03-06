@extends('layout.front')
@section('content')
<div id="fh5co-product">
	<div class="container">
		<div class="row">
			@foreach ($lelangs as $l => $item)
			@if ($item->urutan == 0)
				
			<div class="col-md-4 text-center animate-box">
				<div class="product">
					{{-- <img src="{{ asset('storage/' . $item->gambar) }}" alt="" class="product-grid"> --}}
					<div class="product-grid" style="background-image:url({{ asset('storage/' . $item->gambar) }});">
						<div class="inner">
							<p>
								<a href="{{ route('tawar') }}" class="icon"><i class="icon-shopping-cart"></i></a>
							</p>
						</div>
					</div>
					<div class="desc">
						<h3><a href="single.html">{{ $item->nama_barang }}</a></h3>
						<span class="price">IDR {{ number_format($item->harga_awal) }}</span>
					</div>
				</div>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</div>
@endsection