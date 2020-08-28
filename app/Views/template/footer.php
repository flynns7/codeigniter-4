<footer class="app-footer">
    <div>
        <a href="https://coreui.io/pro/"><?= AUTHOR ?></a>
        <span>&copy; 2018</span>
    </div>
</footer>

<script>
    window.role = "<?= $this->sessionApp['role_as'] ?>/";
    window.baseUrl = "<?= base_url() ?>";
    window.sessionApp =
        <?= json_encode(array(
            "email" => $sessionApp['email'],
            "role_as" => $sessionApp['role_as'],
            "name" => $sessionApp['name'],
            "image" => $sessionApp['image']
        )) ?>;
</script>
<script src="<?= scripts("vendor.js") ?>"></script>
<script src="<?= scripts("app.js") ?>"></script>
<script src="<?= scripts("project.js") ?>"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="<?= scripts("jquery.slimscroll.min.js") ?>"></script>
<script src="<?= scripts("select2.min.js") ?>"></script>
<script src="<?= scripts("dataTables.buttons.min.js") ?>"></script>
<script src="<?= scripts("buttons.flash.min.js") ?>"></script>
<script src="<?= scripts("jszip.min.js") ?>"></script>
<script src="<?= scripts("pdfmake.min.js") ?>"></script>
<script src="<?= scripts("vfs_fonts.js") ?>"></script>
<script src="<?= scripts("buttons.html5.min.js") ?>"></script>
<script src="<?= scripts("buttons.print.min.js") ?>"></script>
<script>
    <?= ($js != "") ? $this->load->view($js) : "" ?>
</script>

<div id="modal-image-view" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="image">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <div id="image-view"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>