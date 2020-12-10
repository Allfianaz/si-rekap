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
                    <a href="/user/report/meeting" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Back</a>
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
                    <form class="" action="/report/meeting/update/<?= $report['id_meeting']; ?>" method="post" enctype="multipart/form-data">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control date <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" value="<?= $report['tanggal_meeting']; ?>" type="date" name="tanggal"/>
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('tanggal'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Start<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control time <?= ($validation->hasError('start')) ? 'is-invalid' : ''; ?>" value="<?= $start ?>" type="time" name="start"/>
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('start'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">End<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control time <?= ($validation->hasError('end')) ? 'is-invalid' : ''; ?>" value="<?= $end ?>" type="time" name="end"/>
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('end'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Meeting Leader<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('pimpinan')) ? 'is-invalid' : ''; ?>" value="<?= $report['pimpinan_meeting']; ?>" name="pimpinan" type="text" value="<?= old('pimpinan'); ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('pimpinan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Meeting Location<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('tempat')) ? 'is-invalid' : ''; ?>" value="<?= $report['tempat_meeting']; ?>" name="tempat" type="text" value="<?= old('tempat'); ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('tempat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Amount Audience<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" value="<?= $orang ?>" type="number" name="jumlah" value="<?= old('jumlah'); ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('jumlah'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Meeting Detail<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <textarea name="materi" id="materi"><?= $report['materi_meeting']; ?></textarea>
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('materi'); ?>
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
    CKEDITOR.replace('materi');
</script>

<?= $this->endSection() ?>