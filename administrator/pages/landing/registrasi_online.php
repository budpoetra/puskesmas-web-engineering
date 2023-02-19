<section class="no-bg">
  <div class="container position-relative p-0 mt-90" style="max-width: 700px;">
    <h3 class="bg-theme-colored p-15 mt-0 mb-0 text-white">Pendaftaran Akun</h3>
    <div class="section-content bg-white p-30">
      <div class="row">
        <div class="col-md-12">
          <!-- Booking Form Starts -->
          <p class="lead">Harap Isi Data Dengan Benar</p>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group mb-10">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group mb-10">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group mb-10">
                <input type="password" id="password2" name="password2" class="form-control" placeholder="Konfirmasi Password" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mb-10">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mb-10">
                <input type="number" min="0" id="no_identitas" name="no_identitas" class="form-control" placeholder="No Identitas" autocomplete="off">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mb-0 mt-20">
                <button type="submit" id="btnSubmitRegistrasiOnline" class="btn btn-dark btn-theme-colored">SUBMIT</button>
              </div>
            </div>
            <script>
              $(document).on('click', '#btnSubmitRegistrasiOnline', function(e) {
                e.preventDefault();
                let username = $('#username').val();
                let password = $('#password').val();
                let password2 = $('#password2').val();
                let email = $('#email').val();
                let no_identitas = $('#no_identitas').val();

                if (username == '' || password == '' || password2 == '' || email == '' || no_identitas == '') {
                  Swal.fire({
                    text: 'Data Belum Lengkap!',
                    icon: 'warning'
                  });
                } else {
                  $.ajax({
                    url: 'config/regis_ajax.php',
                    method: 'post',
                    dataType: "JSON",
                    data: {
                      "username": username,
                      "password": password,
                      "password2": password2,
                      "email": email,
                      "no_identitas": no_identitas
                    },
                    success: function(r) {
                      if (r.status == 'warning') {
                        Swal.fire({
                          text: r.msg,
                          icon: r.status
                        });
                        $('.swal2-container').attr('style', 'overflow-y: auto; z-index: 9999;');
                      } else if (r.status == 'error') {
                        Swal.fire({
                          text: r.msg,
                          icon: r.status
                        });
                        $('.swal2-container').attr('style', 'overflow-y: auto; z-index: 9999;');
                      } else if (r.status == 'success') {
                        Swal.fire({
                          title: 'BERHASIL!',
                          text: r.msg,
                          icon: r.status
                        }).then((result) => {
                          if (result.isConfirmed) {
                            document.location.href = 'administrator/pages/pasien/pendaftaran_lanjutan.php?id_pasien=' + r.id_pasien;
                          }
                        });
                        $('.swal2-container').attr('style', 'overflow-y: auto; z-index: 9999;');
                      }
                    }
                  });
                }
                $('.swal2-container').attr('style', 'overflow-y: auto; z-index: 9999;');
              });
            </script>
          </div>
        </div>
      </div>
      <button title="Close (Esc)" type="button" class="mfp-close font-36">×</button>
    </div>
</section>