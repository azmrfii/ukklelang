<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>{{ __('Lelang Zamfa') }}</title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="format-detection" content="telephone=no">
	    <meta name="apple-mobile-web-app-capable" content="yes">
	    <meta name="author" content="">
	    <meta name="keywords" content="">
	    <meta name="description" content="">

	    <link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
	    <link rel="stylesheet" type="text/css" href="assets/icomoon/icomoon.css">
	    <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">
	    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<!-- script
		================================================== -->
		<script src="assets/js/modernizr.js"></script>

		<!-- DataTables -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	</head>

<body>

<div id="header-wrap">
	
	<div class="top-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="social-links">
						<ul>
							<li>
								<a href="#"><i class="icon icon-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-youtube-play"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-behance-square"></i></a>
							</li>
						</ul>
					</div><!--social-links-->
				</div>
				<div class="col-md-6">
					<div class="right-element">
						@guest
							@if (Route::has('login'))
								<a href="{{ route('masyarakat/login') }}" class="user-account for-buy"><i class="icon icon-user"></i><span>{{ __('Login') }}</span></a>
							@endif
							@if (Route::has('register'))
								<a href="{{ route('register') }}" class="user-account for-buy"><i class="icon icon-user"></i><span>{{ __('Register') }}</span></a>
                            @endif
						@else
						{{-- <button type="submit" name="add-to-cart" value=""  data-bs-toggle="modal" data-bs-target="#exampleModal" class="button">Login Sebagai : {{ auth()->user()->username }}</button> --}}
							Login Sebagai : <a data-bs-toggle="modal" data-bs-target="#exampleModal">{{ auth()->user()->username }}</a>
						 	<a data-bs-toggle="modal" data-bs-target="#exampleModal2">| Change Password |</a>
							<a class="user-account for-buy" href="{{ route('logout') }}"
								onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
								<i class="icon icon-user"></i>
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						@endguest
						{{-- <a class="user-account for-buy" href="{{ route('logout') }}"
								onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
								<i class="icon icon-user"></i>
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form> --}}
						<!-- <a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i><span>Cart:(0 $)</span></a> -->

						<div class="action-menu">
							{{-- @guest --}}
							@auth	
							<div class="search-bar">
								<a href="#" class="search-button search-toggle" data-selector="#header-wrap">
									<i class="icon icon-search"></i>
								</a>
								<form action="{{ route('search.barang') }}" role="search" method="get" class="search-box">
									<input class="search-field text search-input" placeholder="Search" name="search" value="{{ old('search') }}" type="search">
									{{-- <input type="submit" value="Search"> --}}
								</form>
							</div>
							@endauth	
							{{-- @endguest --}}
						</div>

					</div><!--top-right-->
				</div>
				
			</div>
		</div>
	</div><!--top-content-->

	<header id="header">
		<div class="container">
			<div class="row">

				<div class="col-md-2">
					<div class="main-logo">
						<h1>Lelang Zamfa</h1>
						{{-- <a href="#" class="d-none">{{ __('Lelang Zamfa') }}</a> --}}
						{{-- <a href="#home" data-effect="Home">Home</a> --}}
						{{-- <a href="index.html"><img src="assets/images/main-logo.png" alt="logo"></a> --}}
					</div>

				</div>

				<div class="col-md-10">
					
					<nav id="navbar">
						<div class="main-menu stellarnav">
							<ul class="menu-list">
								<li class="menu-item"><a href="{{ route('home') }}" data-effect="Home">Home</a></li>
								@auth
								<li class="menu-item"><a href="{{ route('data.lelang') }}" class="nav-link" data-effect="About">Lelang</a></li>
								<li class="menu-item"><a href="{{ route('riwayat') }}" class="nav-link" data-effect="About">Riwayat Penawaran</a></li>
								<li class="menu-item"><a href="{{ route('riwayatpemenang') }}" class="nav-link" data-effect="About">Riwayat Pemenang</a></li>
								<li class="menu-item"><a href="{{ route('detailriwayat') }}" class="nav-link" data-effect="About">Detail Riwayat</a></li>
								@endauth
							</ul>

							<div class="hamburger">
				                <span class="bar"></span>
				                <span class="bar"></span>
				                <span class="bar"></span>
				            </div>

						</div>
					</nav>

				</div>

			</div>
		</div>
	</header>
		
</div><!--header-wrap-->

@yield('content')
@guest
@auth
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data : {{ Auth::user()->username }}</h1>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<form action="{{ route('edit.akun', Auth::user()->id) }}" method="POST">
		@csrf
		@method('PUT')
		<div class="modal-body">
			<label for="">NIK</label>
			<input type="number" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ Auth::user()->nik }}" placeholder="Masukkan NIK">
			@error('nik')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<label for="">Nama</label>
			<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" placeholder="Masukkan Nama">
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<label for="">Email</label>
			<input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" placeholder="Masukkan Email">
			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<label for="">Username</label>
			<input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ Auth::user()->username }}" placeholder="Masukkan Username">
			@error('username')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<label for="">Jenis Kelamin</label>
			<select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror" required autocomplete="jk">
				<option value="Perempuan">{{ __('Perempuan') }}</option>
				{{-- <option value="Perempuan">{{ Auth::user()->jk }}</option>
				<option value="Laki-laki">{{ Auth::user()->jk }}</option> --}}
				<option value="Laki-laki">{{ __('Laki-laki') }}</option>
			</select>
			@error('jk')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<label for="">No Handphone</label>
			<input type="number" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ Auth::user()->no_hp }}" placeholder="Masukkan Nama">
			@error('no_hp')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<label for="">Alamat</label>
			<textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="10">{{ Auth::user()->alamat }}</textarea>
			{{-- <input type="number" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" placeholder="Masukkan Nama"> --}}
			@error('alamat')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-primary">Edit</button>
		</div>
		</form>
	  </div>
	</div>
  </div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data : {{ Auth::user()->username }}</h1>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <form action="{{ route('edit.password', Auth::user()->id) }}" method="POST">
	  @csrf
	  @method('PUT')
	  <div class="modal-body">
		  <label for="">Current Password</label>
		  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="" placeholder="Masukkan Password">
		  @error('password')
			  <span class="invalid-feedback" role="alert">
				  <strong>{{ $message }}</strong>
			  </span>
		  @enderror
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="submit" class="btn btn-primary">Change</button>
	  </div>
	  </form>
	</div>
  </div>
</div> 
@endauth
@endguest
<footer id="footer">
	<div class="container">
		<div class="row">

			<div class="col-md-4">
				
				<div class="footer-item">
					<div class="company-brand">
						<img src="images/main-logo.png" alt="logo" class="footer-logo">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus nonet psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames semper erat ac in suspendisse iaculis.</p>
					</div>
				</div>
				
			</div>

			<div class="col-md-2">

				<div class="footer-menu">
					<h5>About Us</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">vision</a>
						</li>
						<li class="menu-item">
							<a href="#">articles </a>
						</li>
						<li class="menu-item">
							<a href="#">careers</a>
						</li>
						<li class="menu-item">
							<a href="#">service terms</a>
						</li>
						<li class="menu-item">
							<a href="#">donate</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>Discover</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">Home</a>
						</li>
						<li class="menu-item">
							<a href="#">Books</a>
						</li>
						<li class="menu-item">
							<a href="#">Authors</a>
						</li>
						<li class="menu-item">
							<a href="#">Subjects</a>
						</li>
						<li class="menu-item">
							<a href="#">Advanced Search</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>My account</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">Sign In</a>
						</li>
						<li class="menu-item">
							<a href="#">View Cart</a>
						</li>
						<li class="menu-item">
							<a href="#">My Wishtlist</a>
						</li>
						<li class="menu-item">
							<a href="#">Track My Order</a>
						</li>
					</ul>
				</div>

			</div>
			<div class="col-md-2">

				<div class="footer-menu">
					<h5>Help</h5>
					<ul class="menu-list">
						<li class="menu-item">
							<a href="#">Help center</a>
						</li>
						<li class="menu-item">
							<a href="#">Report a problem</a>
						</li>
						<li class="menu-item">
							<a href="#">Suggesting edits</a>
						</li>
						<li class="menu-item">
							<a href="#">Contact us</a>
						</li>
					</ul>
				</div>

			</div>

		</div>
		<!-- / row -->

	</div>
</footer>

<div id="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="copyright">
					<div class="row">

						<div class="col-md-6">
							<p>© 2022 All rights reserved. Copyright by <a href="" target="_blank">Lelang Zamfa</a></p>
						</div>

						<div class="col-md-6">
							<div class="social-links align-right">
								<ul>
									<li>
										<a href="#"><i class="icon icon-facebook"></i></a>
									</li>
									<li>
										<a href="#"><i class="icon icon-twitter"></i></a>
									</li>
									<li>
										<a href="#"><i class="icon icon-youtube-play"></i></a>
									</li>
									<li>
										<a href="#"><i class="icon icon-behance-square"></i></a>
									</li>
								</ul>
							</div>
						</div>

					</div>
				</div><!--grid-->

			</div><!--footer-bottom-content-->
		</div>
	</div>
</div>

<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
	$(function () {
	  $("#example1").DataTable({
		"responsive": true, "lengthChange": false, "autoWidth": false,
		"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
	  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	  $('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
	  });
	});
  </script>
</body>
</html>	