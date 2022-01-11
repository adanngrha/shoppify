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
                            <h3>Tambah Alamat</h3>
                            <a href="{{url('address')}}" class="icon-primary"><i
                                    class="fa fa-fw fa-angle-left"></i> Kembali</a>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="billing-details">
                                    <form action="" method="POST">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td class="text-right align-middle text-gray" width="150">Nama</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="nama" placeholder="Nama Kamu"
                                                        value="<?= set_value('nama'); ?>">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"><?= form_error('nama'); ?></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Nomor Telepon</td>
                                                <td class="align-middle pl-4"><input class="input" type="number" min="0"
                                                        name="telepon" placeholder="Nomor Telepon"
                                                        value="<?= set_value('telepon'); ?>">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"><?= form_error('telepon'); ?></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Alamat</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="alamat" placeholder="Nama Jalan, Gedung, No Rumah"
                                                        value="<?= set_value('alamat'); ?>">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"><?= form_error('alamat'); ?></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Kecamatan</td>
                                                <td class="align-middle pl-4"><input class="input" type="text"
                                                        name="kecamatan" placeholder="Kecamatan"
                                                        value="<?= set_value('kecamatan'); ?>">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"><?= form_error('kecamatan'); ?></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Kabupaten</td>
                                                <td class="align-middle pl-4">
                                                    <select class="input-select" name="kabupaten">
                                                        <option>Pilih Kabupaten</option>
                                                        <?php foreach ($kabupaten as $kab) { ?>
                                                        <option value="<?= $kab->city_id; ?>"
                                                            <?= set_select('kabupaten', $kab->city_id); ?>>
                                                            <?= $kab->city_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"><?= form_error('kabupaten'); ?></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Provinsi</td>
                                                <td class="align-middle pl-4">
                                                    <select class="input-select" name="provinsi">
                                                        <option>Pilih Provinsi</option>
                                                        <?php foreach ($provinsi as $prov) { ?>
                                                        <option value="<?= $prov->province_id; ?>"
                                                            <?= set_select('provinsi', $prov->province_id) ?>>
                                                            <?= $prov->province; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"><?= form_error('provinsi'); ?></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right align-middle text-gray">Kode Pos</td>
                                                <td class="align-middle pl-4"><input class="input" type="number"
                                                        name="kode_pos" placeholder="Kode Pos"
                                                        value="<?= set_value('kode_pos'); ?>">
                                                    <div class="m-2">
                                                        <small
                                                            class="text-left text-danger"><?= form_error('kode_pos'); ?></small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="align-middle pl-4"><button class="primary-btn" name="save"
                                                        type="submit">Tambah</button></td>
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
