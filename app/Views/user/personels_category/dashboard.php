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
                            <th class="column-title">Type of Personnel </th>
                            <th class="column-title">Description </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($category as $ctg) {
                        ?>
                            <tr>
                                <td class=" ">
                                    <a class="btn btn-sm <?php if ($ctg['jenis_personil'] == 'PKWT') {
                                                                echo 'btn-success';
                                                            } elseif ($ctg['jenis_personil'] == 'PKWTT') {
                                                                echo 'btn-warning';
                                                            } elseif ($ctg['jenis_personil'] == 'SUBKONT') {
                                                                echo 'btn-danger';
                                                            } else {
                                                                echo 'btn-secondary';
                                                            } ?>">
                                        <h4><strong><?= $ctg['jenis_personil']; ?></strong></h4>
                                    </a>
                                </td>
                                <td class=" ">
                                    <h3><strong><?= $ctg['keterangan_jenis']; ?></strong></h3>
                                </td>
                                <td>
                                    <div class="">
                                        <a href="/user/licensing/personelsCategory/edit/<?= $ctg['id_jenis_personil']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>

                                        <a href="/report/personelsCategory/delete/<?= $ctg['id_jenis_personil']; ?>" class="btn btn-danger btn-sm fa fa-trash btn-delete" type="submit"></a>
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
            <form class="" action="/report/personelsCategory/save" method="post">
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Category's Name<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" name="name" type="text" value="<?= old('name'); ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Description<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" name="keterangan" type="text" value="<?= old('keterangan'); ?>" />
                        <div class="invalid-feedback position-sticky">
                            <?= $validation->getError('keterangan'); ?>
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