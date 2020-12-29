<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>

<script src="<?= base_url() ?>/ckeditor/ckeditor.js"></script>
<div class="page-title">
    <div class="title_left">
        <div class="swal" data-swal="<?= session()->getFlashdata('message'); ?>"></div>
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
                        <input class="form-control date" type="date" name="tanggal" value="<?= $date ?>" />
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
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Meeting Report <small><?= $date ?></small> </h2>
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

                    <div class="row">
                        <?php if ($meeting) { ?>
                            <?php foreach ($meeting as $mtg) { ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                            <div class="mask">
                                                <p><?= $mtg['tanggal_meeting'] ?></p>
                                                <div class="tools tools-bottom">
                                                    <a href="/admin/dashboard/reportDate/Meetingdetail/<?= $mtg['id_meeting'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                    <a href=""><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption text-center">
                                            <p><?= $mtg['pimpinan_meeting'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-12">
                                <p class="text-muted well well-sm no-shadow text-center">
                                    <i>Data Empty</i>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Case Report <small><?= $date ?></small> </h2>
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

                    <div class="row">
                        <?php if ($case) { ?>
                            <?php foreach ($case as $cs) { ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                            <div class="mask">
                                                <p><?= $cs['nama_pelanggar'] ?></p>
                                                <div class="tools tools-bottom">
                                                    <a href="/admin/dashboard/reportDate/Casedetail/<?= $cs['id_pelanggaran'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                    <a href=""><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption text-center">
                                            <p class="badge <?php if ($cs['status'] == 'Serious') {
                                                                echo 'badge-danger';
                                                            } elseif ($cs['status'] == 'Moderate') {
                                                                echo 'badge-warning';
                                                            } elseif ($cs['status'] == 'Ordinary') {
                                                                echo 'badge-success';
                                                            } ?>"><?= $cs['status'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-12">
                                <p class="text-muted well well-sm no-shadow text-center">
                                    <i>Data Empty</i>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sweeping Report <small><?= $date ?></small> </h2>
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

                    <div class="row">
                        <?php if ($sweeping) { ?>
                            <?php foreach ($sweeping as $swp) { ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                            <div class="mask">
                                                <p><?= $swp['tempat_swp'] ?></p>
                                                <div class="tools tools-bottom">
                                                    <a href="/user/report/case/detail/<?= $swp['id_laporan_swp'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                    <a href=""><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption text-center">
                                            <p><?= $swp['tanggal_laporan_swp'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-12">
                                <p class="text-muted well well-sm no-shadow text-center">
                                    <i>Data Empty</i>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Patrol Report <small><?= $date ?></small> </h2>
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

                    <div class="row">
                        <?php if ($patroli) { ?>
                            <?php foreach ($patroli as $pt) { ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                            <div class="mask">
                                                <p><?= $pt['wilayah_patroli'] ?></p>
                                                <div class="tools tools-bottom">
                                                    <a href="/user/report/case/detail/<?= $pt['id_laporan_patroli'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                    <a href=""><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption text-center">
                                            <p><?= $pt['tanggal_patroli'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-12">
                                <p class="text-muted well well-sm no-shadow text-center">
                                    <i>Data Empty</i>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Izin Keluar <small><?= $date ?></small></h2>
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

                    <div class="row">
                        <?php if ($i_keluar) { ?>
                            <?php foreach ($i_keluar as $kl) { ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                            <div class="mask">
                                                <p><?= $kl['tanggal_izin'] ?></p>
                                                <div class="tools tools-bottom">
                                                    <a href="/user/report/case/detail/<?= $kl['id_perizinan'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                    <a href=""><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption text-center">
                                            <p><?= $kl['nama_personil_izin'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-12">
                                <p class="text-muted well well-sm no-shadow text-center">
                                    <i>Data Empty</i>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Izin Pulang <small><?= $date ?></small></h2>
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

                    <div class="row">
                        <?php if ($i_pulang) { ?>
                            <?php foreach ($i_pulang as $pl) { ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                            <div class="mask">
                                                <p><?= $pl['tanggal_izin'] ?></p>
                                                <div class="tools tools-bottom">
                                                    <a href="/user/report/case/detail/<?= $pl['id_perizinan'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                    <a href=""><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption text-center">
                                            <p><?= $pl['nama_personil_izin'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-12">
                                <p class="text-muted well well-sm no-shadow text-center">
                                    <i>Data Empty</i>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Personil Terlambat <small><?= $date ?></small></h2>
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

                    <div class="row">
                        <?php if ($p_terlambat) { ?>
                            <?php foreach ($p_terlambat as $pt) { ?>
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                            <div class="mask">
                                                <p><?= $pt['tanggal_izin'] ?></p>
                                                <div class="tools tools-bottom">
                                                    <a href="/user/report/case/detail/<?= $pt['id_perizinan'] ?>"><i class="fa fa-eye"></i></a>
                                                    <a href="#"><i class="fa fa-pencil"></i></a>
                                                    <a href=""><i class="fa fa-times"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="caption text-center">
                                            <p><?= $pt['nama_personil_izin'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="col-md-12">
                                <p class="text-muted well well-sm no-shadow text-center">
                                    <i>Data Empty</i>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>