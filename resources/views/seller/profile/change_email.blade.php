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
							<h5><a href="{{ url('profile') }}"><i class="fa fa-fw fa-user-o"></i> Profil Saya <div class="notif"></div></a></h5>
							<br>
							<h4>Informasi Produk</h4>
							<h5><a href="{{ url('/product/list-product') }}" class="active"><i class="fas fa-fw fa-list"></i> Daftar
									Produk</a></h5>
							<h5><a href="admin-order.html"><i class="fas fa-fw fa-list-ul"></i> Daftar Pesanan</a></h5>
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
								<div class="d-flex flex-col">
									<h3>Ubah Email</h3>
									<p>Untuk keamanan akun Anda, mohon untuk tidak menyebarkan email Anda ke orang lain.</p>
								</div>
								<a href="{{ url('/profile') }}" class="icon-primary"><i class="fa fa-fw fa-angle-left"></i> Kembali</a>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-8">
									<div class="billing-details">
										<form action="{{ url('profile/change-email') }}" method="POST">
                                            @csrf
											<table class="table table-borderless">
												<tr>
													<td class="text-right align-middle text-gray" width="100">Email Lama</td>
													<td class="align-middle pl-4"><input class="input" type="email" name="old_email" placeholder="Email Lama"></td>
												</tr>
												<tr>
													<td class="text-right align-middle text-gray">Email Baru</td>
													<td class="align-middle pl-4"><input class="input" type="email" name="new_email" placeholder="Email Baru"></td>
												</tr>
												<tr>
													<td></td>
													<td class="align-middle pl-4"><button class="primary-btn" name="ubah" type="submit">Ubah</button></td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
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
