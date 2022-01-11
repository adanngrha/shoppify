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
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 text-center my-5 login">
                    <!-- Login -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h2 class="title">Login</h2>
                        </div>
                        <form method="post" action="">
                            <div class="form-group">
                                <input class="input" type="text" name="username" placeholder="Username">
                                <div class="m-2">
                                    <small class="text-left text-danger"></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" type="password" name="password" placeholder="Password">
                                <div class="m-2">
                                    <small class="text-left text-danger"></small>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="primary-btn order-submit">Login</button>
                            </div>
                            <br>
                            <span>Belum memiliki akun? <a href="{{url('register')}}">Daftar sekarang!</a></span>
                        </form>
                    </div>
                    <!-- /Login -->
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
