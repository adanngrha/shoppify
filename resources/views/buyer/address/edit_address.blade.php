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
                {{-- <?php
						$data = [
							'active' => $active
						];
						$this->load->view('layout/aside', $data);
					?> --}}

                <!-- STORE -->
                <div class="col-md-9">
                    <div id="my-profile">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Ubah Alamat</h3>
                            <a href="{{ url('buyer-address') }}" class="icon-primary"><i
                                    class="fa fa-fw fa-angle-left"></i> Kembali</a>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="billing-details">
                                    <form action="{{ url('buyer-address/edit-address/'.$address->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                        @csrf
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-right align-middle text-gray" width="150">Nama</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="full_name" placeholder="Nama Kamu"
                                                        value="{{ $address->full_name }}">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Nomor Telepon</td>
                                                <td class="align-middle pl-4"><input class="input" type="number" min="0"
                                                        name="phone_number" placeholder="Nomor Telepon"
                                                        value="{{ $address->phone_number }}">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Alamat</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="address_name" placeholder="Nama Jalan, Gedung, No Rumah"
                                                        value="{{ $address->address_name }}">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Kabupaten/Kota</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="city" placeholder="Kabupaten/Kota"
                                                        value="{{ $address->city }}">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Provinsi</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="province" placeholder="Provinsi"
                                                        value="{{ $address->province }}">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Kode Pos</td>
                                                <td class="align-middle pl-4"><input class="input" type="number"
                                                        name="postal_code" placeholder="Kode Pos"
                                                        value="{{ $address->postal_code }}">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"></small>
                                                    </div>
                                                </td>
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
