<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->include('_partials/head.php') ?>
</head>

<body class="nav-md" onload="<?= (session()->getFlashdata('notif')) ? "new PNotify({
                                  title: 'Login Succes!',
                                  text: 'Welcome back, just to let you know something happened.',
                                  type: 'info',
                                  nonblock: {
                                    nonblock: true
                                  },
                                  styling: 'bootstrap3'
                              });" : "" ?>">
  <div class="container body">
    <div class="main_container">

      <?= $this->include('_partials/sidemenu.php') ?>

      <!-- top navigation -->
      <?= $this->include('_partials/topbar.php') ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <?= $this->renderSection('content') ?>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <?= $this->include('_partials/footer.php') ?>
      <!-- /footer content -->
    </div>
  </div>

  <?= $this->include('_partials/js.php') ?>
</body>

</html>