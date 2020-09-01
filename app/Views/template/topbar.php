<header class="app-header navbar">
    <div class="bg-dark" style="width: 200px;">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="<?= images("logo.png") ?>" width="89" height="25" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="<?= images("logo.png") ?>" width="30" height="30" alt="CoreUI Logo">
    </a>

    </div>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="<?= images("avatars/6.jpg") ?>" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Settings</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-wrench"></i> Settings</a>
                <a class="dropdown-item" href="<?= base_url('logout') ?>">
                    <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
    <!-- <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
    </button> -->
</header>