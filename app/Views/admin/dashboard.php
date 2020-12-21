<?= $this->extend('_partials/layout') ?>
<?= $this->section('content') ?>

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Vertical Tabs <small>Float left</small></h2>
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

            <div class="col-xs-3">
                <!-- required for floating -->
                <!-- Nav tabs -->
                <div class="nav nav-tabs flex-column  bar_tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-january-tab" data-toggle="pill" href="#v-pills-january" role="tab" aria-controls="v-pills-january" aria-selected="true">January</a>
                    <a class="nav-link" id="v-pills-february-tab" data-toggle="pill" href="#v-pills-february" role="tab" aria-controls="v-pills-february" aria-selected="false">February</a>
                    <a class="nav-link" id="v-pills-march-tab" data-toggle="pill" href="#v-pills-march" role="tab" aria-controls="v-pills-march" aria-selected="false">March</a>
                    <a class="nav-link" id="v-pills-april-tab" data-toggle="pill" href="#v-pills-april" role="tab" aria-controls="v-pills-april" aria-selected="false">April</a>
                    <a class="nav-link" id="v-pills-may-tab" data-toggle="pill" href="#v-pills-may" role="tab" aria-controls="v-pills-may" aria-selected="false">May</a>
                    <a class="nav-link" id="v-pills-june-tab" data-toggle="pill" href="#v-pills-june" role="tab" aria-controls="v-pills-june" aria-selected="false">June</a>
                    <a class="nav-link" id="v-pills-july-tab" data-toggle="pill" href="#v-pills-july" role="tab" aria-controls="v-pills-july" aria-selected="false">July</a>
                    <a class="nav-link" id="v-pills-august-tab" data-toggle="pill" href="#v-pills-august" role="tab" aria-controls="v-pills-august" aria-selected="false">August</a>
                    <a class="nav-link" id="v-pills-september-tab" data-toggle="pill" href="#v-pills-september" role="tab" aria-controls="v-pills-september" aria-selected="false">September</a>
                    <a class="nav-link" id="v-pills-october-tab" data-toggle="pill" href="#v-pills-october" role="tab" aria-controls="v-pills-october" aria-selected="false">October</a>
                    <a class="nav-link" id="v-pills-november-tab" data-toggle="pill" href="#v-pills-november" role="tab" aria-controls="v-pills-november" aria-selected="false">November</a>
                    <a class="nav-link" id="v-pills-december-tab" data-toggle="pill" href="#v-pills-december" role="tab" aria-controls="v-pills-december" aria-selected="false">December</a>
                </div>

            </div>

            <div class="col-xs-9">
                <!-- Tab panes -->

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-january" role="tabpanel" aria-labelledby="v-pills-january-tab">January</div>
                    <div class="tab-pane fade" id="v-pills-february" role="tabpanel" aria-labelledby="v-pills-february-tab">... content</div>
                    <div class="tab-pane fade" id="v-pills-march" role="tabpanel" aria-labelledby="v-pills-march-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-april" role="tabpanel" aria-labelledby="v-pills-april-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-may" role="tabpanel" aria-labelledby="v-pills-may-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-june" role="tabpanel" aria-labelledby="v-pills-june-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-july" role="tabpanel" aria-labelledby="v-pills-july-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-august" role="tabpanel" aria-labelledby="v-pills-august-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-september" role="tabpanel" aria-labelledby="v-pills-september-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-october" role="tabpanel" aria-labelledby="v-pills-october-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-november" role="tabpanel" aria-labelledby="v-pills-november-tab">...content</div>
                    <div class="tab-pane fade" id="v-pills-december" role="tabpanel" aria-labelledby="v-pills-april-tab">...content</div>
                </div>
            </div>

            <div class="clearfix"></div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>