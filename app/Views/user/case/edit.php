<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>

<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
<div class="">
    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Meeting Report</h3>
        </div>

        <div class="title_right">
            <div class="col-m form-group pull-right">
                <div class="input-group">
                    <a href="/user/report/case" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Back</a>
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
                    <h2>Meeting <small>Edit Data</small></h2>
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
                    <form class="" action="/report/case/update/<?= $case['id_pelanggaran']; ?>" method="post">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control date <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" value="<?= $case['tanggal_pelanggaran'] ?>" type="date" name="tanggal" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">NIP<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control time <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" value="<?= $case['nip_pelanggar'] ?>" type="text" name="nip" data-inputmask="'mask': '999-99-99999'" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('nip'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?= $case['nama_pelanggar'] ?>" type="text" name="name" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('name'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Gender<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="Male" id="optionsRadios1" name="kelamin" <?= $case['jk_pelanggar'] == 'Male' ? 'checked' : '' ?>> Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="Female" id="optionsRadios2" name="kelamin" <?= $case['jk_pelanggar'] == 'Female' ? 'checked' : '' ?>> Female
                                    </label>
                                </div>
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('kelamin'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Work Division<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control <?= ($validation->hasError('divisi')) ? 'is-invalid' : ''; ?>" name="divisi">
                                    <option><?= $case['divisi_pelanggar']; ?></option>
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
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" name="status">
                                    <option><?= $case['status']; ?></option>
                                    <option value="Berat">Berat</option>
                                    <option value="Sedang">Sedang</option>
                                    <option value="Ringan">Ringan</option>
                                </select>
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('status'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Case Detail<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10"><?= $case['keterangan_pelanggaran']; ?></textarea>
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('keterangan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid">
                            <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                    <button type='submit' class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    CKEDITOR.replace('keterangan', {
        width: '100%',
        height: 400
    });
</script>

<?= $this->endSection() ?>