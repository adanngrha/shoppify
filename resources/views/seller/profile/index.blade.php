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
                        <h3>Profil Saya</h3>
                        <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun.</p>
                        <hr>
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
                            <div class="col-md-8">
                                <div class="billing-details">
                                    <form action="{{ url('profile/change-profile') }}" method="POST">
                                        @csrf
                                        <table class="table table-borderless">
                                                <tr>
                                                <td class="text-right align-middle text-gray" width="150">Username</td>
                                                <td class="align-middle pl-4">{{ $user->username }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Nama</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="full_name" placeholder="Name" valua="{{ $user_profile->full_name }}">
                                                    @error('full_name')
                                                        <div class="m-2">
                                                            <small class="text-left text-danger">{{$message}}</small>
                                                        </div>
                                                    @enderror
                                                </td>
                                                
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
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="phone_number" placeholder="Nomor Telepon" value="{{ $user_profile->phone_number }}">
                                                    @error('phone_number')
                                                        <div class="m-2">
                                                            <small class="text-left text-danger">{{$message}}</small>
                                                        </div>
                                                    @enderror
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Jenis Kelamin</td>
                                                <td class="align-middle pl-4">
                                                    @if ($user_profile->gender == 'male')
                                                        <span class="pr-3"><input type="radio"
                                                            name="gender" value="male" checked> Laki-laki</span>
                                                        <span><input type="radio" name="gender" value="female">
                                                        Perempuan</span></td>
                                                        @elseif ($user_profile->gender == 'female')
                                                        <span class="pr-3"><input type="radio"
                                                            name="gender" value="male"> Laki-laki</span>
                                                        <span><input type="radio" name="gender" value="female" checked>
                                                        Perempuan</span></td>
                                                        @else
                                                        <span class="pr-3"><input type="radio"
                                                            name="gender" value="male"> Laki-laki</span>
                                                        <span><input type="radio" name="gender" value="female">
                                                        Perempuan</span></td>
                                                    @endif
                                                
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
