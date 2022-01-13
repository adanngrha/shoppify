<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('electro.head')
    @include('electro.admin-header')

    <body class="antialiased">
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
                                <h5><a href="{{ url('admin/orders') }}" class="active"><i class="fas fa-fw fa-list-ul"></i> Daftar Pesanan</a></h5>
                                    <h5><a href="{{ url('admin/products') }}"><i class="fas fa-fw fa-list"></i> Daftar Produk</a></h5>
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
                                        <td class="align-middle"><a href=""><i class="fa fa-fw fa-pencil-square-o"></i> Ubah</a></td>
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
        </div>
        @include('electro.script')
    </body>
</html>

