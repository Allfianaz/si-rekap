<?php $request = \Config\Services::request(); ?>
<div class="col-md-3 left_col">
  <div class="left_col scroll-view">

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="/img/<?= session()->get('level') == 'superadmin' ? 'user.png' : session()->get('img') ?>" alt="..." class="img-circle profile_img" width="100">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2><?= session()->get('level') == 'superadmin' ? session()->get('namesuper') : session()->get('name') ?></h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <?php if ($request->uri->getSegment(1) == 'superadmin') { ?>
          <!-- Menu Admin & Super Admin -->
          <ul class="nav side-menu">
            <li class="<?= $request->uri->getSegment(2) == 'dashboard' ? 'active' : '' ?>"><a href="/superadmin/dashboard"><i class="fa fa-home"></i>Dashboard </a> </li>
            <li><a><i class="fa fa-user"></i>Create an Accounts<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="<?= $request->uri->getSegment(2) == 'addAdmin' ? 'current-page' : '' ?>"><a href="/superadmin/addAdmin">Add Account for Administrator</a></li>
                <li class="<?= $request->uri->getSegment(2) == 'addUser' ? 'current-page' : '' ?>"><a href="/superadmin/addUser">Add Account for User</a></li>
              </ul>
            </li>
            <li class="<?= $request->uri->getSegment(2) == 'manage' ? 'current-page' : '' ?>"><a href="/superadmin/manage"><i class="fa fa-edit"></i>Manage an Accounts</a></li>
            <!-- <li><a><i class="fa fa-paste"></i> Laporan Perizinan <span class="fa fa-chevron-down"></span></a> </li>
            <li><a><i class="fa fa-shield"></i> Laporan Pelanggaran <span class="fa fa-chevron-down"></span></a> </li>
            <li><a><i class="fa fa-group"></i> Laporan Patroli <span class="fa fa-chevron-down"></span></a> </li>
            <li><a><i class="fa fa-bullhorn"></i> Laporan Sweeping <span class="fa fa-chevron-down"></span></a> </li>
            <li><a><i class="fa fa-times-circle"></i> Karyawan Terlambat <span class="fa fa-chevron-down"></span></a> </li> -->
          </ul>
          <!-- /Menu Admin & Super Admin -->
        <?php } else if ($request->uri->getSegment(1) == 'user') { ?>

          <!-- Menu User -->
          <ul class="nav side-menu">
            <li class="<?= $request->uri->getSegment(2) == 'dashboard' ? 'active' : '' ?>"><a href="/user/dashboard"><i class="fa fa-home"></i>Dashboard</a>
            <li><a><i class="fa fa-file-text"></i>Data Reports<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="/user/report/meeting">Meeting</a></li>
                <li><a href="/user/report/case">Cases & Violence</a></li>
              </ul>
            </li>
          </ul>
          <!-- /Menu User -->

        <?php } else if ($request->uri->getSegment(1) == 'admin') { ?>

          <!-- Menu User -->
          <ul class="nav side-menu">
            <li class="active"><a><i class="fa fa-home"></i>Dashboard <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="current-page"><a href="">Home</a></li>
                <li class="current-page"><a href="#">Laporan Harian</a></li>
                <li><a href="#">Laporan Mingguan</a></li>
                <li><a href="#">Laporan Bulanan</a></li>
                <li><a href="#">Laporan Tahunan</a></li>
              </ul>
          </ul>
          <!-- /Menu User -->

        <?php } ?>
      </div>
      <!-- <div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="e_commerce.html">E-commerce</a></li>
              <li><a href="projects.html">Projects</a></li>
              <li><a href="project_detail.html">Project Detail</a></li>
              <li><a href="contacts.html">Contacts</a></li>
              <li><a href="profile.html">Profile</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="page_403.html">403 Error</a></li>
              <li><a href="page_404.html">404 Error</a></li>
              <li><a href="page_500.html">500 Error</a></li>
              <li><a href="plain_page.html">Plain Page</a></li>
              <li><a href="login.html">Login Page</a></li>
              <li><a href="pricing_tables.html">Pricing Tables</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#level1_1">Level One</a>
              </li>
              <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li class="sub_menu"><a href="level2.html">Level Two</a>
                  </li>
                  <li><a href="#level2_1">Level Two</a>
                  </li>
                  <li><a href="#level2_2">Level Two</a>
                  </li>
                </ul>
              </li>
              <li><a href="#level1_2">Level One</a>
              </li>
            </ul>
          </li>
          <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
        </ul>
      </div> -->

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a class="log-out" data-toggle="tooltip" data-placement="top" title="Logout" href="<?= session()->get('level') == 'superadmin' ? '/auth/logoutSuper' : '/auth/logout' ?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>