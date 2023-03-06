@extends('layouts.front')
@section('content')
{{-- <section id="billboard">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<button class="prev slick-arrow">
					<i class="icon icon-arrow-left"></i>
				</button>

				<div class="main-slider pattern-overlay">
                    @foreach ($lelangs as $l => $item)
					<div class="slider-item">
						<div class="banner-content">
							<h2 class="banner-title">{{ $item->nama_barang }}</h2>
							<p>{{ $item->deskripsi }}</p>
						</div><!--banner-content--> 
						<img src="{{ asset('storage/' . $item->gambar) }}" alt="banner" class="banner-image" width="500px">
					</div><!--slider-item-->
                    @endforeach
					<div class="slider-item">
						<div class="banner-content">
							<h2 class="banner-title">Birds gonna be Happy</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis urna, a eu.</p>
							<div class="btn-wrap">
								<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i class="icon icon-ns-arrow-right"></i></a>
							</div>
						</div><!--banner-content--> 
						<img src="assets/images/main-banner2.jpg" alt="banner" class="banner-image">
					</div><!--slider-item-->

				</div><!--slider-->
					
				<button class="next slick-arrow">
					<i class="icon icon-arrow-right"></i>
				</button>
				
			</div>
		</div>
	</div>
	
</section> --}}

<section id="special-offer" class="bookshelf">

	<div class="section-header align-center">
		<div class="title">
			<span>Our Product Lelang</span>
		</div>
		<h2 class="section-title">Lelang All Items</h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="inner-content">	
				<div class="product-list" data-aos="fade-up">
					<div class="grid product-grid">
						{{-- @if ($lelangs->status == 'open') --}}

						@foreach ($lelangs as $l => $item)
						
						{{-- @if ($item->status == 'proses') --}}
                        <figure class="product-style">
							<img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar" class="product-item">
							
							<a href="{{ route('barang.penawaran', $item->id) }}"><button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button></a>
							<!-- <a href="" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</a>
							<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button> -->
							
							<figcaption>
								<h3>{{ $item->nama_barang }}</h3>
								<p>{{ $item->deskripsi }}</p>
								<div class="item-price">IDR {{ number_format($item->harga_awal) }}</div>
							</figcaption>
						</figure>
						{{-- @endif	 --}}
                        @endforeach	
                      						
					</div><!--grid-->
				</div>
			</div><!--inner-content-->
		</div>
	</div>
</section>
@endsection