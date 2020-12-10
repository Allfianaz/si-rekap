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

<!-- LIST DATA -->
<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Case Report <small>List</small></h2>
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
                            <th class="column-title">NIP </th>
                            <th class="column-title">Name </th>
                            <th class="column-title">Gender </th>
                            <th class="column-title">Work Division </th>
                            <th class="column-title">Case Status </th>
                            <th class="column-title">Case Detail </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($case as $cs) {
                        ?>
                            <tr>
                                <td class=" "><?= $no++ ?></td>
                                <td class=" "><?= $cs['tanggal_pelanggaran']; ?></td>
                                <td class=" "><?= $cs['nip_pelanggar']; ?></td>
                                <td class=" "><?= $cs['nama_pelanggar']; ?></td>
                                <td class=" "><?= $cs['jk_pelanggar']; ?></td>
                                <td class=" "><?= $cs['divisi_pelanggar']; ?></td>
                                <td class=""><span class="badge <?php if ($cs['status'] == 'Serious') {
                                                                    echo 'badge-danger';
                                                                } elseif ($cs['status'] == 'Moderate') {
                                                                    echo 'badge-warning';
                                                                } elseif ($cs['status'] == 'Ordinary') {
                                                                    echo 'badge-success';
                                                                } ?>"><?= $cs['status']; ?></span>
                                </td>
                                <td class=" last"><a href="/report/case/detail/<?= $cs['id_pelanggaran']; ?>">Detail</a>
                                </td>
                                <td>
                                    <div class="">
                                        <a href="/user/report/case/edit/<?= $cs['id_pelanggaran']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>
                                        <?= csrf_field(); ?>
                                        <a href="/report/case/delete/<?= $cs['id_pelanggaran']; ?>" class="btn btn-danger btn-sm fa fa-trash btn-delete" type="submit"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ADD FORM  -->
    <div class="x_panel">
        <div class="x_title">
            <h2>Case Report <small>Add Data</small></h2>
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
            <form class="" action="/report/case/save" method="post">
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control date <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" type="date" name="tanggal" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NIP<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control time <?= ($validation->hasError('nip')) ? 'is-invalid' : ''; ?>" type="text" name="nip" data-inputmask="'mask': '999-99-99999'" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('nip'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" type="text" name="name" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Gender<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <div class="radio">
                            <label>
                                <input type="radio" value="Male" id="optionsRadios1" name="kelamin"> Male
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" value="Female" id="optionsRadios2" name="kelamin"> Female
                            </label>
                        </div>
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('kelamin'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Work Division<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control <?= ($validation->hasError('divisi')) ? 'is-invalid' : ''; ?>" name="divisi">
                            <option value=""><b>-- Choose Division.. --</b></option>
                            <?php foreach ($divisi as $div) { ?>
                                <option value="<?php echo $div['nama_divisi']; ?>"><?php echo $div['nama_divisi']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('divisi'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Status<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control <?= ($validation->hasError('status')) ? 'is-invalid' : ''; ?>" name="status">
                            <option value="">-- Choose status.. --</option>
                            <option value="Serious">Serious</option>
                            <option value="Moderate">Moderate</option>
                            <option value="Ordinary">Ordinary</option>
                        </select>
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('status'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Case Detail<span class="required">*</span></label>
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