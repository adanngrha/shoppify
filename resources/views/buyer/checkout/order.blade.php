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
					<div class="d-flex justify-content-center">
						<div class="d-flex flex-col align-items-center checkout-success">
							<i class="far fa-fw fa-check success"></i>
							<p class="title">Selamat! Pesanan berhasil dibuat</p>
							<p class="subtitle">Nomor pesanan Anda: <b>879ASKJQWEB</b></p>
							<p class="subtitle">Silahkan unggah bukti transfer Anda dibawah ini. Pastikan isikan dengan benar!</b></p>
							
							<form class="text-center my-5">
								<h3>Metode Pembayaran</h3>
								<hr>
								<div class="payment">
									<p class="mb-3 text-gray">Dompet Digital</p>
									<img src="./img/payment/ovo.png" width="80">
									<p class="mt-3 mb-0">PT Electro.</p>
									<p class="title mt-0"><b>127710273</b></p>
									<hr>
									<p class="m-0 text-gray">Total Pembayaran</p>
									<span class="text-primary"><b>Rp10.000</b></span>
								</div>
								<hr>
								<h3>Unggah Bukti Transfer</h3>
								<hr>
								<div class="form-group">
									<p class="m-0 text-gray">Format gambar: .JPG, .JPEG, .PNG, max: 2 MB</p>
									<input type="file" id="receipt-file" name="receipt_file" onchange="getFileName(this);" hidden />
									<label for="receipt-file" id="file-chosen">Pilih file</label>
								</div>
								<hr>
								<button class="success-btn">Upload Bukti Transfer</button>
								<br><br>
								<a href="" class="text-gray">Nanti Saja</a>
							</form>
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