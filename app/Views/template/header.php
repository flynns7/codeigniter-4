
<head>
    <meta charset="utf-8">
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title><?= APPNAME . " - " . $pageTitle ?></title>
    <link rel="apple-touch-icon" href="<?= base_url("assets/favicon.ico") ?>">
    <link rel="icon" href="<?= images("fav.png") ?>">

    <link rel="stylesheet" href="<?= styles("vendor.css") ?>">
    <link rel="stylesheet" href="<?= styles("main.css") ?>">
    <?= ($css != "") ? "<style>" .  $this->load->view($css) . "</style>" : "" ?>
    <style>
        .tooltip {
            pointer-events: none;
        }
        
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
    <script src="<?= scripts("modernizr.js") ?>"></script>
</head>
<div id="overlay">
    <div id="tengah">
            <br>
            <i class="fa fa-spin fa-circle-o-notch fa-2x text-white"></i>
            <br>
            <span style="color:#ffffff">Loading</span><br>
    </div>
</div>  