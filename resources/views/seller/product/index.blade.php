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
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Daftar Produk</h3>
                        <a href="{{url('product/add-product')}}" class="icon-primary"><i class="fa fa-fw fa-plus"></i> Tambah
                            Produk</a>
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
                    </div>
                    <hr class="mt-3 mb-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach ($products as $key => $product)
                            <tr>
                                <td class="align-middle">{{ $i + 1 }}</td>
                                <td class="align-middle"><img src="{{ url('img-product-upload/'.$product_images[$i]) }}" width="60"></td>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{{ $product->stock }}</td>
                                <td class="align-middle">Rp{{ $product->price }}</td>
                                <td class="align-middle"><a class="mr-3" href=""><i
                                            class="fa fa-fw fa-pencil-square-o"></i> Ubah</a> <a href=""><i
                                            class="fa fa-fw fa-trash-o"></i> Hapus</a></td>
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
    @include('electro.script')
</body>

</html>
