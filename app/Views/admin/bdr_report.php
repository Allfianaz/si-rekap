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
            <form class="" action="/administrator/reportRangeOfDate" method="post">
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">From<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date" type="date" name="start" value="<?= $start ?>" />
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">To<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date" type="date" name="end" value="<?= $end ?>" />
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
                    <h2>Meeting Report <small><?= $start ?> - <?= $end ?></small> </h2>
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
                    <h2>Case Report <small><?= $start ?> - <?= $end ?></small> </h2>
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
                    <h2>Sweeping Report <small><?= $start ?> - <?= $end ?></small> </h2>
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
                                                    <a href="/admin/dashboard/reportDate/Sweepingdetail/<?= $swp['id_laporan_swp'] ?>"><i class="fa fa-eye"></i></a>
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
                    <h2>Patrol Report <small><?= $start ?> - <?= $end ?></small> </h2>
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
                                                    <a href="/admin/dashboard/reportDate/Patroldetail/<?= $pt['id_laporan_patroli'] ?>"><i class="fa fa-eye"></i></a>
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
                    <h2>Izin Keluar <small><?= $start ?> - <?= $end ?></small></h2>
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
                    <?php if ($i_keluar) { ?>
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
                                        <th class="column-title">Jam Keluar </th>
                                        <th class="column-title">Jam Masuk </th>
                                        <th class="column-title">Keterangan </th>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($i_keluar as $i) {
                                    ?>
                                        <tr>
                                            <td class=" "><?= $no++ ?></td>
                                            <td class=" "><?= $i['tanggal_izin']; ?></td>
                                            <td class=" "><?= $i['nip_personil']; ?></td>
                                            <td class=" "><?= $i['nama_personil_izin']; ?></td>
                                            <td class=" "><?= $i['divisi_personil']; ?></td>
                                            <td class=" "><a data-toggle="tooltip" data-placement="left" title="<?php if ($i['jenis_personil'] == 'PKWT') {
                                                                                                                    echo 'Perjanjian Kontrak Waktu Tertentu';
                                                                                                                } elseif ($i['jenis_personil'] == 'PKWTT') {
                                                                                                                    echo 'Perjanjian Kontrak Waktu Tidak Tertentu';
                                                                                                                } elseif ($i['jenis_personil'] == 'SUBKONT') {
                                                                                                                    echo 'Outsourcing';
                                                                                                                } ?>" class="btn btn-sm <?php if ($i['jenis_personil'] == 'PKWT') {
                                                                                                                                            echo 'btn-success';
                                                                                                                                        } elseif ($i['jenis_personil'] == 'PKWTT') {
                                                                                                                                            echo 'btn-warning';
                                                                                                                                        } elseif ($i['jenis_personil'] == 'SUBKONT') {
                                                                                                                                            echo 'btn-danger';
                                                                                                                                        } else {
                                                                                                                                            echo 'btn-secondary';
                                                                                                                                        } ?>">
                                                    <h4><strong><?= $i['jenis_personil']; ?></strong></h4>
                                                </a></td>
                                            <td class=" "><?= $i['jam_keluar']; ?></td>
                                            <td class=" "><?= $i['jam_masuk']; ?></td>
                                            <td class=" "><?= $i['keterangan_izin']; ?></td>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Izin Pulang <small><?= $start ?> - <?= $end ?></small></h2>
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
                    <?php if ($i_pulang) { ?>
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
                                        <th class="column-title">Jam Pulang </th>
                                        <th class="column-title">Keterangan </th>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($i_pulang as $ip) {
                                    ?>
                                        <tr>
                                            <td class=" "><?= $no++ ?></td>
                                            <td class=" "><?= $ip['tanggal_izin']; ?></td>
                                            <td class=" "><?= $ip['nip_personil']; ?></td>
                                            <td class=" "><?= $ip['nama_personil_izin']; ?></td>
                                            <td class=" "><?= $ip['divisi_personil']; ?></td>
                                            <td class=" "><a data-toggle="tooltip" data-placement="left" title="<?php if ($ip['jenis_personil'] == 'PKWT') {
                                                                                                                    echo 'Perjanjian Kontrak Waktu Tertentu';
                                                                                                                } elseif ($ip['jenis_personil'] == 'PKWTT') {
                                                                                                                    echo 'Perjanjian Kontrak Waktu Tidak Tertentu';
                                                                                                                } elseif ($ip['jenis_personil'] == 'SUBKONT') {
                                                                                                                    echo 'Outsourcing';
                                                                                                                } ?>" class="btn btn-sm <?php if ($ip['jenis_personil'] == 'PKWT') {
                                                                                                                                            echo 'btn-success';
                                                                                                                                        } elseif ($ip['jenis_personil'] == 'PKWTT') {
                                                                                                                                            echo 'btn-warning';
                                                                                                                                        } elseif ($ip['jenis_personil'] == 'SUBKONT') {
                                                                                                                                            echo 'btn-danger';
                                                                                                                                        } else {
                                                                                                                                            echo 'btn-secondary';
                                                                                                                                        } ?>">
                                                    <h4><strong><?= $ip['jenis_personil']; ?></strong></h4>
                                                </a></td>
                                            <td class=" "><?= $ip['jam_pulang']; ?></td>
                                            <td class=" "><?= $ip['keterangan_izin']; ?></td>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Personil Terlambat <small><?= $start ?> - <?= $end ?></small></h2>
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
                    <?php if ($p_terlambat) { ?>
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
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($p_terlambat as $p) {
                                    ?>
                                        <tr>
                                            <td class=" "><?= $no++ ?></td>
                                            <td class=" "><?= $p['tanggal_izin']; ?></td>
                                            <td class=" "><?= $p['nip_personil']; ?></td>
                                            <td class=" "><?= $p['nama_personil_izin']; ?></td>
                                            <td class=" "><?= $p['divisi_personil']; ?></td>
                                            <td class=" "><a data-toggle="tooltip" data-placement="left" title="<?php if ($p['jenis_personil'] == 'PKWT') {
                                                                                                                    echo 'Perjanjian Kontrak Waktu Tertentu';
                                                                                                                } elseif ($p['jenis_personil'] == 'PKWTT') {
                                                                                                                    echo 'Perjanjian Kontrak Waktu Tidak Tertentu';
                                                                                                                } elseif ($p['jenis_personil'] == 'SUBKONT') {
                                                                                                                    echo 'Outsourcing';
                                                                                                                } ?>" class="btn btn-sm <?php if ($p['jenis_personil'] == 'PKWT') {
                                                                                                                                            echo 'btn-success';
                                                                                                                                        } elseif ($p['jenis_personil'] == 'PKWTT') {
                                                                                                                                            echo 'btn-warning';
                                                                                                                                        } elseif ($p['jenis_personil'] == 'SUBKONT') {
                                                                                                                                            echo 'btn-danger';
                                                                                                                                        } else {
                                                                                                                                            echo 'btn-secondary';
                                                                                                                                        } ?>">
                                                    <h4><strong><?= $p['jenis_personil']; ?></strong></h4>
                                                </a></td>
                                            <td class=" "><?= $p['jam_masuk']; ?></td>
                                            <td class=" "><?= $p['keterangan_izin']; ?></td>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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


<?= $this->endSection() ?>