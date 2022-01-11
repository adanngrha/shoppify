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
                            <h2 class="title">Daftar</h2>
                        </div>
                        <form method="post" action="">
                            <div class="form-group">
                                <input class="input" type="text" name="username" placeholder="Username">
                                <div class="m-2">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                                <div class="m-2">
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" type="password" name="password" placeholder="Password">
                                <div class="m-2">
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" type="password" name="password2" placeholder="Ulangi Password">
                                <div class="m-2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-flex justify-content-start">Pilih Role</label>
                                        <select class="form-control selectric" name="role">
                                            {{-- @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach --}}
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                <div class="m-2">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="primary-btn order-submit">Daftar</button>
                            </div>
                            <br>
                            <span>Sudah memiliki akun? <a href="{{url('login')}}">Login sekarang!</a></span>
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
