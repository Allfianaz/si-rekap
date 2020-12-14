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
            <h2>Meeting Report <small>List</small></h2>
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
                            <th class="column-title">Meeting Hours </th>
                            <th class="column-title">Location </th>
                            <th class="column-title">Leader </th>
                            <th class="column-title">Amount of Audience </th>
                            <th class="column-title">Meeting Detail</th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($meeting as $mtg) {
                        ?>
                            <tr>
                                <td class=" "><?= $no++ ?></td>
                                <td class=" "><?= $mtg['tanggal_meeting']; ?></td>
                                <td class=" "><?= $mtg['jam_meeting']; ?></td>
                                <td class=" "><?= $mtg['tempat_meeting']; ?></td>
                                <td class=" "><?= $mtg['pimpinan_meeting']; ?></td>
                                <td class="a-right a-right "><?= $mtg['jumlah_orang_meeting']; ?></td>
                                <td class=" last"><a href="/user/report/meeting/detail/<?= $mtg['id_meeting']; ?>">Detail</a>
                                </td>
                                <td>
                                    <div class="">
                                        <a href="/user/report/meeting/edit/<?= $mtg['id_meeting']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>
                                        
                                        <a href="/report/meeting/delete/<?= $mtg['id_meeting']; ?>" class="btn btn-danger btn-sm fa fa-trash btn-delete" type="submit"></a>
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
            <h2>Meeting Report <small>Add Data</small></h2>
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
            <form class="" action="/report/meeting/save" method="post">
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
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Start<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control time <?= ($validation->hasError('start')) ? 'is-invalid' : ''; ?>" type="time" name="start" value="<?= old('start') ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('start'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">End<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control time <?= ($validation->hasError('end')) ? 'is-invalid' : ''; ?>" type="time" name="end" value="<?= old('end') ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('end'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meeting Leader<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control <?= ($validation->hasError('pimpinan')) ? 'is-invalid' : ''; ?>" name="pimpinan" type="text" value="<?= strval(old('pimpinan')); ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('pimpinan'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Meeting Location<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control <?= ($validation->hasError('tempat')) ? 'is-invalid' : ''; ?>" name="tempat" type="text" value="<?= old('tempat'); ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('tempat'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Amount Audience<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" type="number" name="jumlah" value="<?= old('jumlah'); ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('jumlah'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Meeting Detail<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9">
                        <textarea name="materi" id="materi" cols="30" rows="10"><?= old('materi'); ?></textarea>
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('materi'); ?>
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
    CKEDITOR.replace('materi', {
        width: '100%',
        height: 400
    });
</script>
<?= $this->endSection() ?>