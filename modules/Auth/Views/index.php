<!doctype html>
<html class="no-js">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="<?= APPDETAILNAME ?>">
    <meta name="author" content="<?= AUTHOR ?>">
    <link rel="apple-touch-icon" href="<?= images("fav.png") ?>">
    <link rel="icon" href="<?= images("fav.png") ?>">
    <title><?= APPNAME ?> - Login</title>
    <!-- Icons-->
    <link rel="stylesheet" href="<?= styles("vendor.css") ?>">
    <link rel="stylesheet" href="<?= styles("main.css") ?>">
    <script src="<?= scripts("modernizr.js") ?>"></script>
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="<?= base_url("panel/login/proses") ?>" id="form" data-code="form-login">
                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                                <p class="text-danger text-center error-message"></p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="email" placeholder="Email" name="username">
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">Login</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <!-- <button class="btn btn-link px-0" type="button">Forgot password?</button> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none card-block d-flex" style="width:44%;">
                        <div class="card-body text-center align-items-center d-flex justify-content-center">
                            <h3><img src="<?= images('fav.png') ?>" width="50" height="50"><br> Allpayment Management</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap and necessary plugins-->

    <script>
        window.baseUrl = "<?= base_url() ?>";
    </script>
    <script src="<?= scripts("vendor.js") ?>"></script>
    <script src="<?= scripts("app.js") ?>"></script>
    <script src="<?= scripts("project.js") ?>"></script>
    <script>
        <?php echo view($js); ?>
    </script>
</body>

</html>