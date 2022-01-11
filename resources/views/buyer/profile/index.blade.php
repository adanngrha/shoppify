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
                        <h5><a href="{{ url('profile') }}" class="active"><i class="fa fa-fw fa-user-o"></i> Profil Saya <div
                                    class="notif"></div></a></h5>
                        <h5><a href="{{ url('/address') }}"><i class="fa fa-fw fa-map-marker"></i> Alamat Saya</a></h5>
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
                        <h3>Profil Saya</h3>
                        <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun.</p>
                        <hr>
                        <div class="row">
                            <div class="alert alert-danger mb-3 text-center">Lengkapi Profil Anda! Mulai dari Nama
                                hingga Tanggal Lahir.</div>
                            <div class="col-md-8">
                                <div class="billing-details">
                                    <form action="#" method="POST">
                                        <table class="table table-borderless">
                                                <tr>
                                                <td class="text-right align-middle text-gray" width="150">Username</td>
                                                <td class="align-middle pl-4">{{ $user->username }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Nama</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="name" placeholder="Nama" value="{{ $user_profile->full_name }}"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Email</td>
                                                <td class="align-middle pl-4">{{ $user->email }}<a
                                                        href="{{ url('profile/change-email') }}" class="ml-2"><i
                                                            class="fa fa-fw fa-pencil-square-o"></i>Ubah</a></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Password</td>
                                                <td class="align-middle pl-4">********** <a href="{{ url('profile/change-password') }}"
                                                        class="ml-2"><i class="fa fa-fw fa-pencil-square-o"></i>Ubah</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Nomor Telepon</td>
                                                <td class="align-middle pl-4">123131313213</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Jenis Kelamin</td>
                                                <td class="align-middle pl-4"><span class="pr-3"><input type="radio"
                                                            name="gender" value="male" checked> Laki-laki</span>
                                                    <span><input type="radio" name="gender" value="female">
                                                        Perempuan</span></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="align-middle pl-4"><button class="primary-btn" name="save"
                                                        type="submit">Simpan</button></td>
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
