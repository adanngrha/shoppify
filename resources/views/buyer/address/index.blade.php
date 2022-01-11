<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('electro.head')


<body>
    @include('electro.header')

    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h4>Informasi Akun</h4>
							<h5><a href="account.html"><i class="fa fa-fw fa-user-o"></i> Profil Saya</a></h5>
							<h5><a href="address.html" class="active"><i class="fa fa-fw fa-map-marker"></i> Alamat Saya</a></h5>
							<h5><a href="favorite.html"><i class="fa fa-fw fa-heart"></i> Favorit Saya</a></h5>
							<h5><a href="order.html"><i class="fa fa-fw fa-file-text-o"></i> Pesanan Saya</a></h5>
							<br>
							<h5><a href="login.html"><i class="fa fa-fw fa-sign-out"></i> Keluar</a></h5>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div class="col-md-9">
						<div id="my-profile">
							<div class="d-flex justify-content-between align-items-center">
								<h3>Alamat Saya</h3>
								<a href="{{url('address/add-address')}}" class="icon-primary"><i class="fa fa-fw fa-plus"></i> Tambah Alamat</a>
							</div>

							<!-- Start Address -->
							<hr>
							<table class="table table-borderless">
								<tr>
									<td width="110" class="text-gray text-right">Nama Kamu</td>
									<td><b>Naufal Anshor A</b> <span class="label-new">Utama</span></td>
									<td class="align-bottom" width="90" rowspan="2"><a href=""><i class="fa fa-fw fa-pencil-square-o"></i> Ubah</a></td>
									<td class="align-bottom" width="90" rowspan="2"><a href=""><i class="fa fa-fw fa-trash-o"></i> Hapus</a></td>
								</tr>
								<tr>
									<td class="text-gray text-right">Telepon</td>
									<td>089698948976</td>
								</tr>
								<tr>
									<td class="text-gray text-right">Alamat</td>
									<td >GEMPOL, NO 20, RT 01/RW 11, CONDONGCATUR <br>
									KAB. SLEMAN - DEPOK <br>
									DI YOGYAKARTA <br>
									ID 55283 <br>
									</td>
									<td colspan="2"><button disabled>Atur Sebagai Utama</button></td>
								</tr>
							</table>
							<!-- End Address -->

							<!-- Start Address -->
							<hr>
							<table class="table table-borderless">
								<tr>
									<td width="110" class="text-gray text-right">Nama Kamu</td>
									<td><b>Naufal Anshor A</b> </td>
									<td class="align-bottom" width="90" rowspan="2"><a href=""><i class="fa fa-fw fa-pencil-square-o"></i> Ubah</a></td>
									<td class="align-bottom" width="90" rowspan="2"><a href=""><i class="fa fa-fw fa-trash-o"></i> Hapus</a></td>
								</tr>
								<tr>
									<td class="text-gray text-right">Telepon</td>
									<td>089698948976</td>
								</tr>
								<tr>
									<td class="text-gray text-right">Alamat</td>
									<td >GEMPOL, NO 20, RT 01/RW 11, CONDONGCATUR <br>
									KAB. SLEMAN - DEPOK <br>
									DI YOGYAKARTA <br>
									ID 55283 <br>
									</td>
									<td colspan="2"><button>Atur Sebagai Utama</button></td>
								</tr>
							</table>
							<!-- End Address -->

						</div>
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

    @include('electro.footer')
    @include('electro.script')
</body>

</html>
