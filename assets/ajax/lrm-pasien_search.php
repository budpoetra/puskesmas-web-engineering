<?php
include '../../config/koneksi.php';

$id = $_GET['id'];
$dateFrom = $_GET['dateFrom'];
$dateTo = $_GET['dateTo'];

$no = 1;
$query = $koneksi->query("SELECT * FROM registrasi WHERE id_pasien = $id AND stts='Done' AND tgl_regis BETWEEN '$dateFrom' AND '$dateTo'");

while ($data = $query->fetch_object()) {
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data->no_regis; ?></td>
        <td><?php echo $data->poli; ?></td>
        <td><?php echo date('d F Y', strtotime($data->tgl_regis)); ?></td>
        <td><?php echo $data->cara_masuk; ?></td>
        <td><?php echo $data->nama_dokter; ?></td>
        <td><?php echo $data->diagnosa; ?></td>
        <td><?php echo $data->lingkar_perut; ?></td>
        <td><?php echo $data->imt; ?></td>
        <td><?php echo $data->sistole; ?></td>
        <td>
            <a href="laporan_rekam_medis-detail.php?id=<?php echo $data->id_registrasi; ?>">
                <button type="button" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                    </svg>
                </button>
            </a>
        </td>
    </tr>
<?php
}
?>