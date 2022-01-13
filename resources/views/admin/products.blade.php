<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('electro.head')

    <body class="antialiased">
        @include('electro.admin-header')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

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
                                    <h4>Informasi</h4>
                                    <h5><a href="{{ url('admin/orders') }}"><i class="fas fa-fw fa-list-ul"></i> Daftar Pesanan</a></h5>
                                    <h5><a href="{{ url('admin/products') }}" class="active"><i class="fas fa-fw fa-list"></i> Daftar Produk</a></h5>
                                </div>
                                <!-- /aside Widget -->
                            </div>
                            <!-- /ASIDE -->

                            <!-- STORE -->
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3>Daftar Produk</h3>
                                    <a href="add-product.html" class="icon-primary"><i class="fa fa-fw fa-plus"></i> Tambah Produk</a>
                                </div>
                                <hr class="mt-3 mb-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Seller</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0 ?>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td class="align-middle">{{ $i + 1 }}</td>
                                                <td class="align-middle"><img src="{{ url('img-product-upload/'.$product_images[$i]) }}" width="60"></td>
                                                <td class="align-middle">{{ $product->name }}</td>
                                                <td class="align-middle">{{ $seller_username[$i] }}</td>
                                                <td class="align-middle">{{ $product->stock }}</td>
                                                <td class="align-middle">Rp{{ $product->price }}</td>
                                                <td class="align-middle"><a class="mr-3" href="">
                                                    <i class="fa fa-fw fa-trash-o"></i> Hapus</a></td>
                                            </tr>
                                            <?php $i++ ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /STORE -->
                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </div>
                <!-- /SECTION -->
            @include('electro.footer')
        </div>
        @include('electro.script')
    </body>
</html>

