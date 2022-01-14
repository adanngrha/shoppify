<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('electro.head')


<body>
    @include('seller.header')

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
                    <h3>Daftar Pesanan</h3>
                    <hr class="mb-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No. Pesanan</th>
                                <th>Pemesan</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">1</td>
                                <td class="align-middle">DSFEWRF12</td>
                                <td class="align-middle">naufalans1</td>
                                <td class="align-middle">1</td>
                                <td class="align-middle">Rp130.000</td>
                                <td class="align-middle">DIBAYAR</td>
                                <td class="align-middle"><a href=""><i class="fa fa-fw fa-pencil-square-o"></i> Ubah</a>
                                </td>
                            </tr>
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
