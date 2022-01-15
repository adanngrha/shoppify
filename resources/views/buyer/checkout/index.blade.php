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
					<div id="my-profile">
						<h3>Keranjang Belanja</h3>
						<hr class="mb-0">
						<!-- Product -->
						<table class="table table-borderless">
							<thead>
								<tr class="hr text-center">
									<td class="text-left" colspan="2">Produk</td>
									<td class="text-gray">Harga Satuan</td>
									<td class="text-gray">Kuantitas</td>
									<td class="text-gray">Total Harga</td>
									<td class="text-gray">Aksi</td>
								</tr>
							</thead>
							<tbody>
								<tr class="hr text-center">
									<td width="60">
										<a href="order-details.html" class="no-hover">
											<img src="./img/product01.png" width="100" alt="">
										</a>
									</td>
									<td class="pt-5 text-left" width="400">Judul Produk</td>
									<td class="align-middle"><del class="text-gray mr-2">Rp10.000.000</del> Rp9.000.000</td>
									<td class="align-middle" width="100">
										<div class="add-to-cart">
											<div class="qty-label">
												<div class="input-number">
													<input type="number" value="1" min="1" max="">
													<span class="qty-up">+</span>
													<span class="qty-down">-</span>
												</div>
											</div>
										</div>
									</td>
									<td class="align-middle">Rp9.000.000</td>
									<td class="align-middle"><a href="">Hapus</a></td>
								</tr>
							</tbody>
						</table>
						<!-- End Product -->
						<div class="d-flex flex-col align-items-end mt-4">
							<table class="table table-borderless">
								<tr>
									<td class="align-middle text-right">Total (1 Produk) :</td>
									<td class="align-middle text-right" width="200"><h3 class="d-inline-block text-primary m-0">Rp260.000</h3></td>
								</tr>
							</table>
							<div class="d-flex flex-row align-items-center">
								<a href="" class="primary-btn-o mx-2">Update</a>
								<a href="" class="primary-btn mx-2">Checkout</a>
							</div>
						</div>
					</div>
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
