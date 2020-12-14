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
                    <a href="/user/report/personelsCategory" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Back</a>
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
                    <h2>Personnel's Category <small>Edit Data</small></h2>
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
                    <form class="" action="/report/personelsCategory/update/<?= $category['id_jenis_personil']; ?>" method="post" enctype="multipart/form-data">
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Category's Name<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?= $category['jenis_personil']; ?>" name="name" type="text" value="<?= old('name'); ?>" />
                                <div class="invalid-feedback position-sticky">
                                    <?= $validation->getError('name'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Meeting Location<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" value="<?= $category['keterangan_jenis']; ?>" name="keterangan" type="text" value="<?= old('keterangan'); ?>" />
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
    CKEDITOR.replace('materi');
</script>

<?= $this->endSection() ?>