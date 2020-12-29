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
                    <a href="/user/report/patrol" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Back</a>
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
                    <h2><?= $header ?><small>Edit Data</small></h2>
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
                    <form class="" action="/report/patrol/update/<?= $report['id_laporan_patroli']; ?>" method="post" enctype="multipart/form-data">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control date <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" type="date" name="tanggal" value="<?= $report['tanggal_patroli'] ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Sweeping Hours<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control time <?= ($validation->hasError('waktu')) ? 'is-invalid' : ''; ?>" type="time" name="waktu" value="<?= $report['jam_patroli'] ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('waktu'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Sweeping Location<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('tempat')) ? 'is-invalid' : ''; ?>" name="tempat" type="text" value="<?= $report['wilayah_patroli'] ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('tempat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Sweeping Detail<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10"><?= $report['keterangan_patroli'] ?></textarea>
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
    CKEDITOR.replace('keterangan');
</script>

<?= $this->endSection() ?>