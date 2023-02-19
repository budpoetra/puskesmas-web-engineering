<?php

$id_pengirim = $_GET['pengirim'];
$id_penerima = $_GET['penerima'];

require_once '../../../config/koneksi.php';

date_default_timezone_set('Asia/Jakarta');
$today = date('Y-m-d');

$query = $koneksi->query("SELECT * FROM `message` WHERE (`date` BETWEEN '$today 00:00:00' AND '$today 23:59:59') AND (id_pengirim=$id_pengirim OR id_penerima=$id_pengirim) AND (id_pengirim=$id_penerima OR id_penerima=$id_penerima)");
while ($data = $query->fetch_object()) {
    if ($data->id_pengirim === $id_pengirim and $data->id_penerima === $id_penerima) {
?>
        <div class="row clearfix">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8 mb-2">
                <div class="d-flex justify-content-end">
                    <div class="btn-primary rounded pt-1 pb-1 pr-2 pl-2">
                        <?= $data->message ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } elseif ($data->id_penerima === $id_pengirim and $data->id_pengirim === $id_penerima) {
    ?>
        <div class="row clearfix">
            <div class="col-sm-8 mb-2">
                <div class="d-flex justify-content-start">
                    <div class="btn-secondary rounded pt-1 pb-1 pr-2 pl-2">
                        <?= $data->message ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
