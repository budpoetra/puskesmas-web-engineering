<?php
session_start();

if (isset($_SESSION['id_pasien'])) {
  $id_pasien = $_SESSION['id_pasien'];
}

?>
<section class="no-bg">
  <div class="container position-relative p-0 mt-90" style="max-width: 700px;">
    <h3 class="bg-theme-colored p-15 mt-0 mb-0 text-white">Registrasi Online</h3>
    <div class="section-content bg-white p-30">
      <div class="row">
        <div class="col-md-12">
          <!-- Booking Form Starts -->
          <p class="lead">Harap Isi Data Dengan Benar</p>
          <!-- Appointment Form -->
          <div class="row">
            <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $id_pasien; ?>">
            <?php
            include '../../config/koneksi.php';

            $query = $koneksi->query("SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
            $data = mysqli_fetch_assoc($query);
            ?>
            <div class="col-sm-12">
              <div class="form-group mb-10">
                <label for="no_identitas">No Identitas</label>
                <input type="text" id="no_identitas" name="no_identitas" class="form-control" value="<?= $data['no_identitas']; ?>" readonly>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mb-10">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap']; ?>" readonly>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mb-10">
                <select id="poli" name="poli" class="form-control show-tick">
                  <option value="" selected disabled>Jenis Poli</option>
                  <option value="Umum">Umum</option>
                  <option value="Lansia">Lansia</option>
                  <option value="KIA">KIA</option>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mb-0 mt-20">
                <button type="button" id="btnRegistrasiOnline" class="btn btn-dark btn-theme-colored">Registrasi</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button title="Close (Esc)" type="button" class="mfp-close font-36">×</button>
    </div>
</section>
<script>
  $(document).on('click', '#btnRegistrasiOnline', function(e) {
    e.preventDefault();
    let id_pasien = $('#id_pasien').val();
    let poli = $('#poli').val();
    $.ajax({
      url: '../../../config/pasien_ajax.php?aksi=registrasiOnline',
      method: 'post',
      dataType: 'JSON',
      data: {
        'id_pasien': id_pasien,
        'poli': poli
      },
      success: function(r) {
        if (r.status == 'success') {
          Swal.fire({
            title: 'BERHASIL!',
            text: r.msg,
            icon: r.status
          }).then((result) => {
            if (result.isConfirmed) {
              document.location.href = 'index1.php';
            }
          });
        }
        $('.swal2-container').attr('style', 'overflow-y: auto; z-index: 9999;');
      }
    });
  });
<<<<<<< HEAD
</script>
=======
</script>
>>>>>>> 9cde80019631cc9d16fee030b77b73964611b9a3
