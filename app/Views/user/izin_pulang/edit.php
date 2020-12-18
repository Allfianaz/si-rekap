<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>

<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
<div class="">
    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
    <div class="page-title">
        <div class="title_left">
            <h3><?= $header ?></h3>
        </div>

        <div class="title_right">
            <div class="col-m form-group pull-right">
                <div class="input-group">
                    <a href="/user/perizinan/izinPulang" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Back</a>
                    <span class="input-group-btn">
                        <!-- <button class="btn btn-default" type="button">Go!</button> -->
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?= $header ?> <small>Edit Data</small></h2>
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
                    <form class="" action="/perizinan/izinPulang/update/<?= $licensing['id_perizinan']; ?>" method="post" enctype="multipart/form-data">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control date <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" type="date" name="tanggal" value="<?= $licensing['tanggal_izin'] ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">NIP<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control time <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" type="text" name="nip" data-inputmask="'mask': '999-99-99999'" value="<?= $licensing['nip_personil']; ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('nip'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" type="text" name="nama" value="<?= $licensing['nama_personil_izin']; ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('nama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Divisi<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control <?= ($validation->hasError('divisi')) ? 'is-invalid' : ''; ?>" name="divisi">
                                    <option><b><?= $licensing['divisi_personil']; ?></b></option>
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
                                    <option><b><?= $licensing['jenis_personil'];     ?></b></option>
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
                                <input class="form-control time <?= ($validation->hasError('jam_pulang')) ? 'is-invalid' : ''; ?>" type="time" name="jam_pulang" value="<?= $licensing['jam_pulang']; ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('jam_pulang'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <textarea name="keterangan" id="materi" cols="30" rows="10"><?= $licensing['keterangan_izin']; ?></textarea>
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
    </div>
</div>

<!-- <script>
    CKEDITOR.replace('materi');
</script> -->

<?= $this->endSection() ?>