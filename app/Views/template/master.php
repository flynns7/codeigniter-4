<!doctype html>
<html class="no-js">
<?= $this->include('template/header') ?>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<?= $this->include("template/topbar"); ?>
<div class="app-body">
        <?= $this->include("template/sidebar"); ?>
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
            </ol>
        <?= $this->renderSection('content') ?>
        </main>
    </div>
    <?= $this->include("template/footer"); ?>
    <?= view($js) ?>
</body>

</html>