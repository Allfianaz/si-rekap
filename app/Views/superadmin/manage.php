<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>

<div class="">
  <div class="row">
    <div class="col-md-12">
      <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
    </div>
    <div class="col-md-6">
      <div class="x_panel">
        <div class="x_title">
          <h2>ADMINISTRATOR</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/superadmin/addAdmin">Add Admin</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php foreach ($admin as $adm) { ?>
            <article class="media event">
              <a class="pull-left date">
                <img src="/img/<?= $adm['img_admin'] ?>" width="42" height="42">
              </a>
              <div class="media-body">
                <p>NIP : <a class="title" href="#"><?= $adm['nip_admin'] ?></a>
                  <div class="float-right">
                    <a href="/superadmin/manage/editAdmin/<?= $adm['id_admin']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>
                    <!-- <form action="/administrator/deleteAdmin/<?= $adm['id_admin']; ?>" method="post" class="d-inline btn-delete"> -->
                    <?= csrf_field(); ?>
                    <a href="/administrator/manage/deleteAdmin/<?= $adm['id_admin']; ?>" class="btn btn-danger btn-sm fa fa-trash btn-delete" type="submit"></a>
                    <!-- </form> -->
                  </div>
                </p>
                <p>NAME : <?= $adm['name_admin'] ?></p>
                <p>CREATE DATE : <?= $adm['date_created_adm'] ?> </p>
                <p>UPDATED : <?= $adm['date_updated_adm'] ?> </p>
              </div>
            </article>
            <br>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="x_panel">
        <div class="x_title">
          <h2>USER</h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/superadmin/addUser">Add User</a>
              </div>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <?php foreach ($user as $usr) { ?>
            <article class="media event">
              <a class="pull-left date">
                <img src="/img/<?= $usr['img_user'] ?>" width="42" height="42">
              </a>
              <div class="media-body">
                <p>NIP : <a class="title" href="#"><?= $usr['nip_user'] ?></a>
                  <div class="float-right">
                    <a href="/superadmin/manage/editUser/<?= $usr['id_user']; ?>" class="btn btn-primary btn-sm fa fa-edit"></a>
                    <?= csrf_field(); ?>
                    <a href="/administrator/manage/deleteUser/<?= $usr['id_user']; ?>" class="btn btn-danger btn-sm fa fa-trash btn-delete" type="submit"></a>
                  </div>
                </p>
                <p>NAME : <?= $usr['name_user'] ?></p>
                <p>CREATE DATE : <?= $usr['date_created_usr'] ?> </p>
                <p>UPDATED : <?= $usr['date_updated_usr'] ?> </p>
              </div>
            </article>
            <br>
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>