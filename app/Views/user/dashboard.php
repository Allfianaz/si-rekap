<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>


<div class="clearfix"></div>

<div class="page-title">
    <div class="title_left">
        <h3> Main Dashboard </h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Case Report </h2>
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
                    <?php foreach ($case as $cs) { ?>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first">
                                    <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                    <div class="mask">
                                        <p><?= $cs['nama_pelanggar'] ?></p>
                                        <p><?= $cs['tanggal_pelanggaran'] ?></p>
                                        <div class="tools tools-bottom">
                                            <a href="/user/report/case/detail/<?= $cs['id_pelanggaran'] ?>"><i class="fa fa-eye"></i></a>
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Meeting Report </h2>
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
                    <?php foreach ($meeting as $mtg) { ?>
                        <div class="col-md-55">
                            <div class="thumbnail">
                                <div class="image view view-first">
                                    <img style="width: 100%; display: block;" src="/img/report.png" alt="image" />
                                    <div class="mask">
                                        <p><?= $mtg['tanggal_meeting'] ?></p>
                                        <div class="tools tools-bottom">
                                            <a href="/user/report/case/detail/<?= $mtg['id_meeting'] ?>"><i class="fa fa-eye"></i></a>
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
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>