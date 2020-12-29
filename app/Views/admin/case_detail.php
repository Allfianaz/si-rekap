<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>

<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
<div class="page-title">
    <div class="title_left">
        <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
        <h3>Case Detail</h3>
    </div>

    <div class="title_right">
        <div class="col-m form-group pull-right">
            <div class="input-group">
                <a href="/administrator/reportDate" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Back</a>

            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $report['nama_pelanggar']; ?><small><?= $report['tanggal_pelanggaran']; ?></small></h2><i class="badge <?php if ($report['status'] == 'Serious') {
                                                                                                                                echo 'badge-danger';
                                                                                                                            } elseif ($report['status'] == 'Moderate') {
                                                                                                                                echo 'badge-warning';
                                                                                                                            } elseif ($report['status'] == 'Ordinary') {
                                                                                                                                echo 'badge-success';
                                                                                                                            } ?>"><?= $report['status']; ?></i>
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
            <div class="col-md-12">
                <textarea disabled name="materi" id="materi"><?= $report['keterangan_pelanggaran']; ?></textarea>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('materi', {
        width: '100%',
        height: 1000
    });
</script>

<?= $this->endSection() ?>