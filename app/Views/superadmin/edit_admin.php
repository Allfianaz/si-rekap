<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>


<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Administrator</h3>
        </div>

        <div class="title_right">
            <div class="col-md-2 form-group pull-right top_search">
                <div class="input-group">
                    <a href="/superadmin/manage" class="btn btn-warning float-right"><i class="fa fa-backward"></i> Back</a>
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
                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link <?= $validation->hasError('Password') == TRUE || $validation->hasError('RepeatPassword') == TRUE || $validation->hasError('inputPassword') == TRUE ? '' : 'active' ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="<?= $validation->hasError('Password') == TRUE || $validation->hasError('RepeatPassword') == TRUE || $validation->hasError('inputPassword') == TRUE ? 'false' : 'true' ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $validation->hasError('Password') == TRUE || $validation->hasError('RepeatPassword') == TRUE || $validation->hasError('inputPassword') == TRUE ? 'active' : '' ?>" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="<?= $validation->hasError('Password') == TRUE || $validation->hasError('RepeatPassword') == TRUE || $validation->hasError('inputPassword') == TRUE ? 'true' : 'false' ?>">Password</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade <?= $validation->hasError('Password') == TRUE || $validation->hasError('RepeatPassword') == TRUE || $validation->hasError('inputPassword') == TRUE ? '' : 'show active' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="x_title">
                            <h2>Administrator <small>Change Profile</small></h2>
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
                            <form class="" action="/administrator/updateAdmin/<?= $admin['id_admin']; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $admin['id_admin']; ?>" name="id_admin">
                                <input type="hidden" name="oldImage" value="<?= $admin['img_admin']; ?>">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Created Date<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" disabled="disabled" value="<?= $admin['date_created_adm'] ?>" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date Updated<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" disabled="disabled" value="<?= date("d F, Y"); ?>" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">NIP<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control <?= ($validation->hasError('NIP')) ? 'is-invalid' : ''; ?>" name="NIP" data-inputmask="'mask': '999-99-99999'" value="<?= $admin['nip_admin']; ?>" autofocus />
                                        <div class="invalid-feedback position-sticky">
                                            <?= $validation->getError('NIP'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control <?= ($validation->hasError('Name')) ? 'is-invalid' : ''; ?>" name="Name" type="text" value="<?= $admin['name_admin']; ?>" />
                                        <div class="invalid-feedback position-sticky">
                                            <?= $validation->getError('Name'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="field item form-group file-upload-wrapper">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Profile Picture <span class="required">*</span></label>
                                    <div class="col-sm-2">
                                        <img src="/img/<?= $admin['img_admin']; ?>" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-md-4 col-sm-4 file-upload-wrapper">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input <?= ($validation->hasError('Image')) ? 'is-invalid' : ''; ?>" id="image" name="Image" onchange="previewImg()">
                                            <label class="custom-file-label" for="Image"><?= $admin['img_admin']; ?></label>
                                            <div class="invalid-feedback position-sticky">
                                                <?= $validation->getError('Image'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade <?= $validation->hasError('Password') == TRUE || $validation->hasError('RepeatPassword') == TRUE || $validation->hasError('inputPassword') == TRUE ? 'show active' : '' ?>" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <div class="x_title">
                            <h2>Administrator <small>Change Password</small></h2>
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
                            <form class="" action="/administrator/changePasswordAdmin/<?= $admin['id_admin']; ?>" method="post">
                                <input type="hidden" value="<?= $admin['id_admin']; ?>" name="id_admin">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Old Password<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control <?= ($validation->hasError('inputPassword')) ? 'is-invalid' : ''; ?>" type="password" name="inputPassword" />
                                        <div class="invalid-feedback position-sticky">
                                            <?= $validation->getError('inputPassword'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control <?= ($validation->hasError('Password')) ? 'is-invalid' : ''; ?>" type="password" name="Password"  value="<?= old('Password'); ?>" />
                                        <div class="invalid-feedback position-sticky">
                                            <?= $validation->getError('Password'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Repeat password<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control <?= ($validation->hasError('RepeatPassword')) ? 'is-invalid' : ''; ?>" type="password" name="RepeatPassword" />
                                        <div class="invalid-feedback position-sticky">
                                            <?= $validation->getError('RepeatPassword'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>