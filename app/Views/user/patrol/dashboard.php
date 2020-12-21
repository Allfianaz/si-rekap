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
            <h2><?= $header ?><small>List</small></h2>
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
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action table-bordered text-center">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Date </th>
                            <th class="column-title">Patrol Hours </th>
                            <th class="column-title">Patrol Detail</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($patrol as $ptr) {
                        ?>
                            <tr>
                                <td class=" "><?= $no++ ?></td>
                                <td class=" "><?= $ptr['tanggal_patroli']; ?></td>
                                <td class=" "><?= $ptr['jam_patroli']; ?></td>
                                <td class=" last"><a href="/user/report/patrol/detail/<?= $ptr['id_laporan_patroli']; ?>">Detail</a>
                                </td>
                                <td>
                                    <div class="">
                                        <a href="/user/report/patrol/edit/<?= $ptr['id_laporan_patroli']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>
                                        
                                        <a href="/report/patrol/delete/<?= $ptr['id_laporan_patroli']; ?>" class="btn btn-danger btn-sm fa fa-trash btn-delete" type="submit"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $header ?><small>Add Data</small></h2>
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
            <form class="" action="/report/patrol/save" method="post">
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" type="date" name="tanggal" value="<?= old('tanggal') ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Patrol Territory<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control time <?= ($validation->hasError('waktu')) ? 'is-invalid' : ''; ?>" type="time" name="waktu" value="<?= old('waktu') ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('waktu'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Patrol Location<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control <?= ($validation->hasError('tempat')) ? 'is-invalid' : ''; ?>" name="tempat" type="text" value="<?= old('tempat'); ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('tempat'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Patrol Detail<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9">
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10"><?= old('keterangan'); ?></textarea>
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

<script>
    CKEDITOR.replace('keterangan', {
        width: '100%',
        height: 400
    });
</script>
<?= $this->endSection() ?>