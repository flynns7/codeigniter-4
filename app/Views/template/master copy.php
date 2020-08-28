<!doctype html>
<html class="no-js">

<?php $this->include("template/header"); ?>

<style type="text/css">
    #overlay {
        z-index: 999999;
        display: none;
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        background: rgba(4, 10, 30, 0.8);
    }

    #tengah {
        width: 250px;
        height: 30px;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
    }
</style>
<div id="overlay">
    <div id="tengah">
        <center>
            <br>
            <i class="fa fa-spin fa-circle-o-notch fa-2x text-white"></i>
            <br>
            <span style="color:#ffffff">Loading</span><br>
        </center>
    </div>
</div>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <?php $this->include("template/topbar"); ?>
    <div class="app-body">
        <?php $this->include("template/sidebar"); ?>
        <main class="main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?= $pageTitle ?></li>
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <?php
                        if (isset($customActionPage)) :
                            foreach ($customActionPage as $customAction) :
                                ?>
                        <a class="btn" data-type="<?= $customAction['type'] ?>" href="#"> <i class="fa fa-<?= $customAction['icon'] ?>"></i> &nbsp;<?= $customAction['title'] ?></a>
                        <?php
                            endforeach;
                        endif;
                        ?>
                        <?php if (isset($actionPage)) : ?>
                        <?php if (in_array("export", $actionPage)) : ?><a class="btn" data-type="export" href="#"> <i class="fa fa-download"></i> &nbsp;Export</a><?php endif; ?>
                        <?php if (in_array("import", $actionPage)) : ?><a class="btn" data-type="import" href="#"> <i class="fa fa-upload"></i> &nbsp;import</a><?php endif; ?>
                        <?php if (in_array("filter", $actionPage)) : ?><a class="btn" data-type="filter-datatable" href="#"> <i class="fa fa-filter"></i> &nbsp;Filter</a><?php endif; ?>
                        <?php if (in_array("refresh", $actionPage)) : ?><a class="btn" data-type="refresh-datatable" href="#"> <i class="fa fa-refresh"></i> &nbsp;Refresh</a><?php endif; ?>
                        <?php if (in_array("add", $actionPage)) : ?><a class="btn" data-type="add-data" href="#"> <i class="fa fa-plus"></i> &nbsp;Add</a><?php endif; ?>
                        <?php endif; ?>
                    </div>
                </li>
            </ol> <?php $this->include($content) ?>
        </main>
    </div>
    <?php $this->include("template/footer"); ?>
    <?= $this->endSection() ?>
</body>

</html>