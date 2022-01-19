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
                    <h3>Checkout</h3>
                    <hr>
                    <h4><i class="fas fa-fw fa-map-marker-alt text-primary"></i> Alamat Pengiriman</h4>
                    <p>{{ $profile->full_name }}</p>
                    <p>{{ $profile->phone_number }} <br>
                        {{ $address->address_name }}, {{ $address->city }}, {{ $address->province }}, {{ $address->postal_code }}</p>
                    <hr>
                    <h4><i class="fas fa-fw fa-receipt text-primary"></i> Produk Dipesan</h4>

                    <table class="table table-borderless">
                        <thead>
                            <tr class="text-center">
                                <td class="text-left" colspan="2">Produk</td>
                                <td class="text-gray">Harga Satuan</td>
                                <td class="text-gray">Jumlah</td>
                                <td class="text-right text-gray">Subtotal Produk</td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product -->
                            <?php $i = 0; $total=0?>
                            @foreach ($carts as $key => $cart)
                            <tr class="text-center">
                                    <td width="50">
                                        <a href="order-details.html" class="no-hover">
                                            <img src="./img/product01.png" width="50" alt="">
                                        </a>
                                    </td>
                                    <td class="align-middle text-left" width="400">{{ $cart->products->name }}</td>
                                    <td class="align-middle">Rp{{ $pr=$cart->products->price }}</td>
                                    <td class="align-middle">
                                        {{ $qty=$cart->quantity}}
                                    </td>
                                    <td class="align-middle text-right">Rp{{ $p=$pr*$qty }}</td>
                            </tr>
                            <?php $total+=$p; $i++;  ?>
                            @endforeach
                            <!-- End Product -->
                            <tr>
                                <td class="align-middle">Pesan:</td>
                                <td class="align-middle">
                                    <input class="input" type="text" name="message"
                                        placeholder="(Opsional) Tinggalkan pesan kepada penjual">
                                </td>
                                <td class="align-middle text-right text-gray">Opsi Pengiriman :</td>
                                <td class="align-middle text-center">
                                    <select class="input-select">
                                        <option>Pilih Kurir</option>
                                        @foreach ($couriers as $courier)
                                            <option name="courier" value="{{ $courier->name }}">{{ $courier->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="input-select">
                                        <option>Pilih Servis</option>
                                        {{-- @foreach ($couriers as $courier)
                                            @if(id=="1")

                                            @endif
                                        @endforeach --}}
                                    </select>
                                </td>
                                <td class="align-middle text-right">Rp20.000</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="align-middle text-center text-gray">
                                    <small>Estimasi 2-3 hari</small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h4><i class="fas fa-fw fa-university text-primary"></i> Metode Pembayaran</h4>
                    <br>
                    <div class="d-flex payment-method">
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Transfer Bank
                            </label>
                            <div class="caption p-1">
                                <p>Untuk melakukan transfer silakan pilih salah satu bank dibawah dan simpan bukti
                                    transfer untuk dicek manual oleh Admin. Terimakasih</p>
                                <div class="d-flex flex-row align-items-center my-4">
                                    <div class="d-flex flex-col">
                                        <img class="text-left" src="./img/payment/bca.png" width="100">
                                    </div>
                                    <div class="d-flex flex-col ml-3">
                                        PT Electro.
                                        <b>170819452021</b>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center my-4">
                                    <div class="d-flex flex-col">
                                        <img class="text-left" src="./img/payment/bri.png" width="100">
                                    </div>
                                    <div class="d-flex flex-col ml-3">
                                        PT Electro.
                                        <b>7675170819452021</b>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center my-4">
                                    <div class="d-flex flex-col">
                                        <img class="text-left" src="./img/payment/mandiri.png" width="100">
                                    </div>
                                    <div class="d-flex flex-col ml-3">
                                        PT Electro.
                                        <b>103000170819452021</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                Dompet Digital
                            </label>
                            <div class="caption p-1">
                                <p>Untuk melakukan transfer silakan pilih salah satu dompet digital dibawah dan simpan
                                    bukti transfer untuk dicek manual oleh Admin. Terimakasih</p>
                                <div class="d-flex flex-row align-items-center my-4">
                                    <div class="d-flex flex-col">
                                        <img class="text-left" src="./img/payment/gopay.png" width="100">
                                    </div>
                                    <div class="d-flex flex-col ml-3">
                                        PT Electro.
                                        <b>170819452021</b>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center my-4">
                                    <div class="d-flex flex-col">
                                        <img class="text-left" src="./img/payment/dana.png" width="100">
                                    </div>
                                    <div class="d-flex flex-col ml-3">
                                        PT Electro.
                                        <b>170819452021</b>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center my-4">
                                    <div class="d-flex flex-col">
                                        <img class="text-left" src="./img/payment/ovo.png" width="100">
                                    </div>
                                    <div class="d-flex flex-col ml-3">
                                        PT Electro.
                                        <b>170819452021</b>
                                    </div>
                                </div>
                                <div class="d-flex flex-row align-items-center my-4">
                                    <div class="d-flex flex-col">
                                        <img class="text-left" src="./img/payment/shopeepay.png" width="100">
                                    </div>
                                    <div class="d-flex flex-col ml-3">
                                        PT Electro.
                                        <b>170819452021</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-col align-items-end mt-4">
                        <table class="table table-borderless">
                            <tr class="text-gray">
                                <td class="align-middle text-right">Subtotal Produk :</td>
                                <td class="align-middle text-right" width="200">
                                    <p class="d-inline-block m-0">Rp{{ $total }}</p>
                                </td>
                            </tr>
                            <tr class="text-gray">
                                <td class="align-middle text-right">Total Ongkos Kirim :</td>
                                <td class="align-middle text-right" width="200">
                                    <p class="d-inline-block m-0">Rp20.000</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle text-right">Total Pembayaran :</td>
                                <td class="align-middle text-right" width="200">
                                    <h3 class="d-inline-block text-primary m-0">Rp9.020.000</h3>
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex flex-row align-items-center">
                            <a href="/checkout/order" class="primary-btn mx-2">Buat Pesanan</a>
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
