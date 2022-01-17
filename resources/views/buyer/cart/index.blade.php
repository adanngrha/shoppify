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
                @if (session('status'))
                <div class="alert alert-success mb-3 text-center">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ session('status') }}
                    </div>
                </div>
                @endif
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
                            <?php $i = 0; $total=0?>
                            @foreach($carts as $key => $cart)
                            <tr class="hr text-center">
                                <td width="60">
                                    <a href="order-details.html" class="no-hover">
                                        {{-- <img src="{{ url('img-product-upload/'.$product_images[$i]) }}" width="100"
                                        alt=""> --}}
                                    </a>
                                </td>
                                <td class="pt-5 text-left" width="400">{{$cart->products->name}}</td>
                                <td class="align-middle">Rp{{$pr=$cart->products->price}}</td>
                                <td class="align-middle" width="100">
                                    <div class="add-to-cart">
                                        <div class="qty-label">
                                            <div class="input-number">
                                                <input type="number" value="{{$qty=$cart->quantity}}" min="1" max="">
                                                <span class="qty-up">+</span>
                                                <span class="qty-down">-</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Rp{{$p = $pr * $qty}}</td>
								<form action="/viewcart/{{$cart->id}}" method="POST">
									@csrf
                                    @method('DELETE')
										<td class="align-middle"><input type="submit" class="btn btn-danger my-1" onclick="return confirm('Are you sure?')" value="Hapus"></td>
								</form>
                            </tr>
                            <?php $total+=$p; $i++;  ?>

                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Product -->
                    <div class="d-flex flex-col align-items-end mt-4">
                        <table class="table table-borderless">
                            <tr>
                                <td class="align-middle text-right">Total ({{$count}} Produk) :</td>
                                <td class="align-middle text-right" width="200">
                                    <h3 class="d-inline-block text-primary m-0">Rp{{$total}}</h3>
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex flex-row align-items-center">
                            <a href="" class="primary-btn-o mx-2">Update</a>
                            <a href="/checkout" class="primary-btn mx-2">Checkout</a>
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
