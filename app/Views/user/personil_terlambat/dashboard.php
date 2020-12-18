<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>

<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
<div class="page-title">
    <div class="title_left">
        <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
        <h3>Main Dashboard</h3>
    </div>
    <!-- <div class="title_right">
        <div class="col-m form-group pull-right">
            <div class="input-group">
                <a href="/user/addMeetingReport" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add Data</a>
            </div>
        </div>
    </div> -->
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $header ?><small>List</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action table-bordered text-center">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Tanggal </th>
                            <th class="column-title">NIP </th>
                            <th class="column-title">Nama </th>
                            <th class="column-title">Divisi </th>
                            <th class="column-title">Status Pegawai </th>
                            <th class="column-title">Jam Masuk </th>
                            <th class="column-title">Keterangan </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($licensing as $lcs) {
                        ?>
                            <tr>
                                <td class=" "><?= $no++ ?></td>
                                <td class=" "><?= $lcs['tanggal_izin']; ?></td>
                                <td class=" "><?= $lcs['nip_personil']; ?></td>
                                <td class=" "><?= $lcs['nama_personil_izin']; ?></td>
                                <td class=" "><?= $lcs['divisi_personil']; ?></td>
                                <td class=" "><a data-toggle="tooltip" data-placement="left" title="<?php if ($lcs['jenis_personil'] == 'PKWT') {
                                                                                                        echo 'Perjanjian Kontrak Waktu Tertentu';
                                                                                                    } elseif ($lcs['jenis_personil'] == 'PKWTT') {
                                                                                                        echo 'Perjanjian Kontrak Waktu Tidak Tertentu';
                                                                                                    } elseif ($lcs['jenis_personil'] == 'SUBKONT') {
                                                                                                        echo 'Outsourcing';
                                                                                                    } ?>" class="btn btn-sm <?php if ($lcs['jenis_personil'] == 'PKWT') {
                                                                                                                                echo 'btn-success';
                                                                                                                            } elseif ($lcs['jenis_personil'] == 'PKWTT') {
                                                                                                                                echo 'btn-warning';
                                                                                                                            } elseif ($lcs['jenis_personil'] == 'SUBKONT') {
                                                                                                                                echo 'btn-danger';
                                                                                                                            } else {
                                                                                                                                echo 'btn-secondary';
                                                                                                                            } ?>">
                                        <h4><strong><?= $lcs['jenis_personil']; ?></strong></h4>
                                    </a></td>
                                <td class=" "><?= $lcs['jam_masuk']; ?></td>
                                <td class=" "><?= $lcs['keterangan_izin']; ?></td>
                                </td>
                                <td>
                                    <div class="">
                                        <a href="/user/perizinan/personilTerlambat/edit/<?= $lcs['id_perizinan']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>

                                        <a href="/perizinan/personilTerlambat/delete/<?= $lcs['id_perizinan']; ?>" class="btn btn-danger btn-sm fa fa-trash btn-delete" type="submit"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $header ?><small>Add Data</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="" action="/perizinan/personilTerlambat/save" method="post">
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" type="date" name="tanggal" value="<?= old('tanggal') ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NIP<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control time <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" type="text" name="nip" data-inputmask="'mask': '999-99-99999'" value="<?= old('nip'); ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('nip'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" type="text" name="nama" value="<?= old('nama'); ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Divisi<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control <?= ($validation->hasError('divisi')) ? 'is-invalid' : ''; ?>" name="divisi">
                            <option value=""><b>-- Choose Division --</b></option>
                            <?php foreach ($divisi as $div) { ?>
                                <option value="<?php echo $div['nama_divisi']; ?>"><?php echo $div['nama_divisi']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('divisi'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Status Pegwawai<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control <?= ($validation->hasError('status_karyawan')) ? 'is-invalid' : ''; ?>" name="status_karyawan">
                            <option value=""><b>-- Choose Emploment Status --</b></option>
                            <?php foreach ($status as $st) { ?>
                                <option value="<?php echo $st['jenis_personil']; ?>"><?php echo $st['jenis_personil']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('status_karyawan'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Jam Keluar<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control time <?= ($validation->hasError('jam_masuk')) ? 'is-invalid' : ''; ?>" type="time" name="jam_masuk" value="<?= old('jam_masuk') ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('jam_masuk'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9">
                        <textarea name="keterangan" id="materi" cols="30" rows="10"><?= old('keterangan'); ?></textarea>
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('keterangan'); ?>
                        </div>
                    </div>
                </div>
                <div class="ln_solid">
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <button type='submit' class="btn btn-primary">Submit</button>
                            <button type='reset' class="btn btn-success">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script>
    CKEDITOR.replace('materi', {
        width: '100%',
        height: 400
    });
</script> -->
<?= $this->endSection() ?>