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
            <h2>Report <small>By Date</small></h2>
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
            <form class="" action="/administrator/reportDate" method="post">
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" type="date" name="tanggal" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                        <button type='submit' class="btn btn-primary">Submit</button>
                        <button type='reset' class="btn btn-success">Reset</button>
                    </div>
                </div>
            </form>
            <form class="" action="/administrator/reportRangeOfDate" method="post">
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date <?= ($validation->hasError('start')) ? 'is-invalid' : ''; ?>" type="date" name="start" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('start'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date <?= ($validation->hasError('end')) ? 'is-invalid' : ''; ?>" type="date" name="end" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('end'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                        <button type='submit' class="btn btn-primary">Submit</button>
                        <button type='reset' class="btn btn-success">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>