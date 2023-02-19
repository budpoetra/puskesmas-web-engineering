<!-- Modal -->
<div id="modalBox" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-periksa" id="exampleModalLabel">Modal Box</h7>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_pasien">
                <input type="hidden" id="no_regis">
                <input type="hidden" id="nama_pasien">
                <div class="row clearfix">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <p class="font-weight-bold">PEMERIKSAAN</p>
                                    <p>Klik Tombol Dibawah Untuk Masuk Menu Pemeriksaan</p>
                                    <button id="btnPemeriksaan" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="currentColor" class="bi bi-hand-index mt-1" viewBox="0 0 16 16">
                                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <p class="font-weight-bold">RESEP OBAT</p>
                                    <p>Klik Tombol Dibawah Untuk Masuk Menu Resep Obat</p>
                                    <button id="btnResepObat" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="currentColor" class="bi bi-hand-index mt-1" viewBox="0 0 16 16">
                                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <p class="font-weight-bold">BIAYA</p>
                                    <p>Klik Tombol Dibawah Untuk Masuk Menu Biaya</p>
                                    <button id="btnBiaya" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="currentColor" class="bi bi-hand-index mt-1" viewBox="0 0 16 16">
                                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <p class="font-weight-bold">SURAT SAKIT</p>
                                    <p>Klik Tombol Dibawah Untuk Mencetak Surat Sakit</p>
                                    <button id="btnSuratSakit" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="currentColor" class="bi bi-hand-index mt-1" viewBox="0 0 16 16">
                                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <p class="font-weight-bold">SURAT SEHAT</p>
                                    <p>Klik Tombol Dibawah Untuk Mencetak Surat Sehat</p>
                                    <button id="btnSuratSehat" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="currentColor" class="bi bi-hand-index mt-1" viewBox="0 0 16 16">
                                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <p class="font-weight-bold">RUJUKAN</p>
                                    <p>Klik Tombol Dibawah Untuk Masuk Menu Rujukan</p>
                                    <button id="btnRujukan" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="currentColor" class="bi bi-hand-index mt-1" viewBox="0 0 16 16">
                                            <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 1 0 1 0V6.435a4.9 4.9 0 0 1 .106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 0 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.035a.5.5 0 0 1-.416-.223l-1.433-2.15a1.5 1.5 0 0 1-.243-.666l-.345-3.105a.5.5 0 0 1 .399-.546L5 8.11V9a.5.5 0 0 0 1 0V1.75A.75.75 0 0 1 6.75 1zM8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002zm2.094 2.025z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-hapus">
                                <center>
                                    <p class="font-weight-bold">HAPUS PEMERIKSAAN</p>
                                    <p>Klik Tombol Dibawah Untuk Menghapus Pemeriksaan dari Pasien ini</p>
                                    <button id="btnHapusPemeriksaan" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="currentColor" class="bi bi-trash mt-1" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-ubah">
                                <center>
                                    <p class="font-weight-bold">UBAH PEMERIKSAAN</p>
                                    <p>Klik Tombol Dibawah Untuk Mengubah Data Pemeriksaan dari Pasien ini</p>
                                    <button id="btnUbahPemeriksaan" class="btn btn-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="white" class="bi bi-pencil-square mt-1" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header bg-selesai">
                                <center>
                                    <p class="font-weight-bold">SELESAI PEMERIKSAAN</p>
                                    <p>Klik Tombol Dibawah Untuk Menyelesaikan Pemeriksaan dari Pasien ini</p>
                                    <button id="btnSelesaiPemeriksaan" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="160" height="16" fill="currentColor" class="bi bi-check2 mt-1" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                    </button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pemeriksaan -->
<div id="modalPemeriksaan" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-pemeriksaan" id="exampleModalLabel">Modal Box</h7>
            </div>
            <form id="formPemeriksaanDokter" action="post" method="">
                <div class="modal-body">
                    <input type="hidden" name="no_regis_pemeriksaan" id="no_regis_pemeriksaan">
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="suhu_pemeriksaan">Suhu</label>
                                <input type="text" id="suhu_pemeriksaan" name="suhu_pemeriksaan" class="form-control" placeholder="Suhu" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="alergi_makanan_pemeriksaan">Alergi Makanan</label>
                                <input type="text" id="alergi_makanan_pemeriksaan" name="alergi_makanan_pemeriksaan" class="form-control" placeholder="Alergi Makanan" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="alergi_udara_pemeriksaan">Alergi Udara</label>
                                <input type="text" id="alergi_udara_pemeriksaan" name="alergi_udara_pemeriksaan" class="form-control" placeholder="Alergi Udara" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="alergi_obat_pemeriksaan">Alergi Obat</label>
                                <input type="text" id="alergi_obat_pemeriksaan" name="alergi_obat_pemeriksaan" class="form-control" placeholder="Alergi Obat" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="sistole_pemeriksaan">Sistole</label>
                                <input type="text" id="sistole_pemeriksaan" name="sistole_pemeriksaan" class="form-control" placeholder="Sistole" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="diastole_pemeriksaan">Diastole</label>
                                <input type="text" id="diastole_pemeriksaan" name="diastole_pemeriksaan" class="form-control" placeholder="Diastole" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="respi_rate_pemeriksaan">Respiratory Rate</label>
                                <input type="text" id="respi_rate_pemeriksaan" name="respi_rate_pemeriksaan" class="form-control" placeholder="Respiratory Rate" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="heart_rate_pemeriksaan">Heart Rate</label>
                                <input type="text" id="heart_rate_pemeriksaan" name="heart_rate_pemeriksaan" class="form-control" placeholder="Heart Rate" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="kesadaran_pemeriksaan">Kesadaran</label>
                                <input type="text" id="kesadaran_pemeriksaan" name="kesadaran_pemeriksaan" class="form-control" placeholder="Kesadaran" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Keluhan</label>
                            <textarea name="keluhan_pemeriksaan" id="keluhan_pemeriksaan" cols="48" rows="5" required></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Diagnosa</label>
                            <textarea name="diagnosa_pemeriksaan" id="diagnosa_pemeriksaan" cols="48" rows="5" required></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Perawatan</label>
                            <textarea name="perawatan_pemeriksaan" id="perawatan_pemeriksaan" cols="48" rows="5" required></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Tindakan</label>
                            <textarea name="tindakan_pemeriksaan" id="tindakan_pemeriksaan" cols="48" rows="5" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnKembaliPemeriksaan">Kembali</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpanPemeriksaan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Resep Obat -->
<div id="modalResepObat" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-resepObat" id="exampleModalLabel">Modal Box</h7>
            </div>
            <div class="modal-body" style="overflow: scroll; height: 35rem;">
                <div class="form-group">
                    <label for="dokter">Dokter Pasien</label>
                    <input type="text" class="form-control" id="dokter" readonly>
                </div>
                <div class="form-group">
                    <label for="kodeBarang">Nama Obat</label>
                    <select id="kodeBarang" name="kodeBarang" class="form-control show-tick">
                        <option value="" selected disabled>~ Nama Obat ~</option>
                        <?php
                        include '../../../config/koneksi.php';

                        $barang = $koneksi->query("SELECT * FROM `barang`");
                        while ($data = $barang->fetch_object()) {
                        ?>
                            <option value="<?= $data->kode_barang; ?>"><?= $data->nama_barang; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="aturanPakai">Aturan Pakai</label>
                    <select id="aturanPakai" name="aturanPakai" class="form-control show-tick">
                        <option value="" selected disabled>~ Aturan Pakai ~</option>
                        <?php
                        $aturanPakai = $koneksi->query("SELECT * FROM `aturan_pakai`");
                        while ($data = $aturanPakai->fetch_object()) {
                        ?>
                            <option value="<?= $data->aturan; ?>"><?= $data->aturan; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlahObat">Jumlah Obat</label>
                    <input type="number" min="1" class="form-control" id="jumlahObat" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary mb-3" id="btnInputObat">Input</button>
                </div>
                <div class="table-responsive table_middel">
                    <table id="tableResep" class="table m-b-0" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <h6 id="jumlahHarga"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnKembaliResepObat">Kembali</button>
                <a id="cetak" href="" target="_blank">
                    <button type="button" class="btn btn-success" id="btnCetakResepObat">Cetak</button>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Biaya -->
<div id="modalBiaya" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-biaya" id="exampleModalLabel">Modal Box</h7>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="biayaPemeriksaan">Biaya Pemeriksaan</label>
                    <input type="number" min="0" class="form-control" id="biayaPemeriksaan">
                </div>
                <div class="form-group">
                    <label for="biayaKonsultasi">Biaya Konsultasi</label>
                    <input type="number" min="0" class="form-control" id="biayaKonsultasi">
                </div>
                <div class="form-group">
                    <label for="biayaLain">Biaya Lain</label>
                    <input type="number" min="0" class="form-control" id="biayaLain">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnKembaliBiaya">Kembali</button>
                <button type="button" class="btn btn-primary" id="btnSimpanBiaya">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Surat Sakit -->
<div id="modalSuratSakit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-sakit" id="exampleModalLabel">Modal Box</h7>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <input type="hidden" name="no_regis_suratSakit" id="no_regis_suratSakit">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nomor_surat_sakit" class="font-weight-bold">Nomor Surat</label>
                            <input type="text" class="form-control" name="nomor_surat_sakit" id="nomor_surat_sakit" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="nama_surat_sakit" class="font-weight-bold">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama_surat_sakit" id="nama_surat_sakit" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="usia_surat_sakit" class="font-weight-bold">Usia Pasien</label>
                            <input type="text" class="form-control" name="usia_surat_sakit" id="usia_surat_sakit">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="alamat_surat_sakit" class="font-weight-bold">Alamat Pasien</label>
                            <input type="text" class="form-control" name="alamat_surat_sakit" id="alamat_surat_sakit">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="hasil_pemeriksaan_surat_sakit" class="font-weight-bold">Hasil Pemeriksaan Pasien</label>
                            <input type="text" class="form-control" name="hasil_pemeriksaan_surat_sakit" id="hasil_pemeriksaan_surat_sakit">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="kondisi_surat_sakit" class="font-weight-bold">Kondisi Pasien</label>
                            <input type="text" class="form-control" name="kondisi_surat_sakit" id="kondisi_surat_sakit">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="keterangan_surat_sakit" class="font-weight-bold">Keterangan</label>
                            <textarea name="keterangan_surat_sakit" id="keterangan_surat_sakit" cols="103" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnKembaliSuratSakit">Kembali</button>
                <button type="button" class="btn btn-success" id="btnCetakSuratSakit">Cetak</button>
                <button type="button" class="btn btn-primary" id="btnSimpanSuratSakit">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Surat Sehat -->
<div id="modalSuratSehat" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-sehat" id="exampleModalLabel">Modal Box</h7>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <input type="hidden" name="no_regis_suratSehat" id="no_regis_suratSehat">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="nomor_surat_sehat" class="font-weight-bold">Nomor Surat</label>
                            <input type="text" class="form-control" name="nomor_surat_sehat" id="nomor_surat_sehat" readonly>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="nama_surat_sehat" class="font-weight-bold">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama_surat_sehat" id="nama_surat_sehat" readonly>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="usia_surat_sehat" class="font-weight-bold">Usia Pasien</label>
                            <input type="text" class="form-control" name="usia_surat_sehat" id="usia_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="gender_surat_sehat">Jenis Kelamin</label>
                            <select id="gender_surat_sehat" name="gender_surat_sehat" class="form-control show-tick">
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="pekerjaan_surat_sehat" class="font-weight-bold">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan_surat_sehat" id="pekerjaan_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="alamat_surat_sehat" class="font-weight-bold">Alamat Pasien</label>
                            <input type="text" class="form-control" name="alamat_surat_sehat" id="alamat_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="keterangan_surat_sehat" class="font-weight-bold">Keterangan Surat Sehat</label>
                            <textarea name="keterangan_surat_sehat" id="keterangan_surat_sehat" cols="29" rows="3" placeholder="Kosongkan jika tidak ada keterangan"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="berat_surat_sehat" class="font-weight-bold">Berat Badan (Kg)</label>
                            <input type="text" class="form-control" name="berat_surat_sehat" id="berat_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tinggi_surat_sehat" class="font-weight-bold">Tinggi Badan (Cm)</label>
                            <input type="text" class="form-control" name="tinggi_surat_sehat" id="tinggi_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="darah_surat_sehat" class="font-weight-bold">Tekanan Darah (mmHg)</label>
                            <input type="text" class="form-control" name="darah_surat_sehat" id="darah_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="denyut_surat_sehat" class="font-weight-bold">Denyut Nadi (x/Minute)</label>
                            <input type="text" class="form-control" name="denyut_surat_sehat" id="denyut_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="vos_surat_sehat" class="font-weight-bold">VOS</label>
                            <input type="text" class="form-control" name="vos_surat_sehat" id="vos_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="vod_surat_sehat" class="font-weight-bold">VOD</label>
                            <input type="text" class="form-control" name="vod_surat_sehat" id="vod_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="goldar_surat_sehat" class="font-weight-bold">Golongan Darah</label>
                            <input type="text" class="form-control" name="goldar_surat_sehat" id="goldar_surat_sehat">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="buta_warna">Buta Warna</label>
                            <select id="buta_warna" name="buta_warna" class="form-control show-tick">
                                <option value="Buta Warna">Buta Warna</option>
                                <option value="Tidak Buta Warna">Tidak Buta Warna</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnKembaliSuratSehat">Kembali</button>
                <button type="button" class="btn btn-success" id="btnCetakSuratSehat">Cetak</button>
                <button type="button" class="btn btn-primary" id="btnSimpanSuratSehat">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Rujukan -->
<div id="modalRujukan" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-rujukan" id="exampleModalLabel">Modal Box</h7>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_pasien_rujukan">
                <div class="form-group">
                    <label for="keluhan_rujukan">Keluhan</label>
                    <input type="text" class="form-control" id="keluhan_rujukan" readonly>
                </div>
                <div class="form-group">
                    <label for="rs_rujukan">Rumah Sakit Rujukan</label>
                    <input type="text" class="form-control" id="rs_rujukan">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnKembaliRujukan">Kembali</button>
                <button type="button" class="btn btn-primary" id="btnSimpanRujukan">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah Pemeriksaan -->
<div id="modalUbahPemeriksaan" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-ubah" id="exampleModalLabel">Modal Box</h7>
            </div>
            <form id="formUbahPemeriksaan" action="">
                <div class="modal-body">
                    <div class="row clearfix">
                        <input type="hidden" name="no_regis_ubahPemeriksaan" id="no_regis_ubahPemeriksaan">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="nama_lengkap" class="font-weight-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="poli">Poli</label>
                                <select id="poli" name="poli" class="form-control show-tick">
                                    <option value="Umum">Umum</option>
                                    <option value="Lansia">Lansia</option>
                                    <option value="KIA">KIA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="jenis_kunjungan">Jenis Kunjungan</label>
                                <select id="jenis_kunjungan" name="jenis_kunjungan" class="form-control show-tick">
                                    <option value="Kunjungan Sehat">Kunjungan Sehat</option>
                                    <option value="Kunjungan Sakit">Kunjungan Sakit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="cara_masuk">Cara Masuk</label>
                                <select id="cara_masuk" name="cara_masuk" class="form-control show-tick">
                                    <option value="DATANG SENDIRI">DATANG SENDIRI</option>
                                    <option value="RUMAH SAKIT">RUMAH SAKIT</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="tanggal_pemeriksaan" class="font-weight-bold">Tanggal Pemeriksaan</label>
                                <input type="date" class="form-control" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="kesadaran" class="font-weight-bold">Kesadaran</label>
                                <input type="text" class="form-control" name="kesadaran" id="kesadaran">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="tinggi_badan" class="font-weight-bold">Tinggi Badan (Cm)</label>
                                <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="berat_badan" class="font-weight-bold">Berat Badan (Kg)</label>
                                <input type="text" class="form-control" name="berat_badan" id="berat_badan">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="lingkar_perut" class="font-weight-bold">Lingkar Perut</label>
                                <input type="text" class="form-control" name="lingkar_perut" id="lingkar_perut">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="suhu" class="font-weight-bold">Suhu</label>
                                <input type="text" class="form-control" name="suhu" id="suhu">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="imt" class="font-weight-bold">Indeks Massa Tubuh (IMT)</label>
                                <input type="text" class="form-control" name="imt" id="imt" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="alergi_makanan" class="font-weight-bold">Alergi Makanan</label>
                                <input type="text" class="form-control" name="alergi_makanan" id="alergi_makanan">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="alergi_udara" class="font-weight-bold">Alergi Udara</label>
                                <input type="text" class="form-control" name="alergi_udara" id="alergi_udara">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="alergi_obat" class="font-weight-bold">Alergi Obat</label>
                                <input type="text" class="form-control" name="alergi_obat" id="alergi_obat">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="sistole" class="font-weight-bold">Sistole</label>
                                <input type="text" class="form-control" name="sistole" id="sistole">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="diastole" class="font-weight-bold">Diastole</label>
                                <input type="text" class="form-control" name="diastole" id="diastole">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="respi_rate" class="font-weight-bold">Respiratory Rate</label>
                                <input type="text" class="form-control" name="respi_rate" id="respi_rate">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="heart_rate" class="font-weight-bold">Heart Rate</label>
                                <input type="text" class="form-control" name="heart_rate" id="heart_rate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="btnKembaliUbahPemeriksaan">Kembali</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpanUbahPemeriksaan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Selesai -->
<div class="modal fade" id="modalSelesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="status_pulang">Status Pulang</label>
                    <select id="status_pulang" name="status_pulang" class="form-control show-tick">
                        <option value="" selected disabled>~ Status Pulang ~</option>
                        <option value="Rawat Jalan">Rawat Jalan</option>
                        <option value="Rujuk">Rujuk</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnKembaliSelesai">Kembali</button>
                <button type="button" class="btn btn-primary" id="btnSimpanSelesai">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Pemeriksaan -->
<div id="modalDetailPemeriksaan" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h7 class="modal-title-detail" id="exampleModalLabel">Modal Box</h7>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow: scroll; height: 39rem;">
                <div class="row clearfix">
                    <table class="col-lg-12 mb-3">
                        <thead class="text-light bg-secondary">
                            <tr>
                                <th class="text-center pt-2 pb-2">HASIL PEMERIKSAAN</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="col-lg-6 mb-3">
                        <label class="font-weight-bold">Keluhan</label>
                        <textarea name="keluhan" id="keluhan_detail" cols="48" rows="5" readonly></textarea>
                    </div>
                    <div class="col-lg-6 mb-3">
                        <label class="font-weight-bold">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa_detail" cols="48" rows="5" readonly></textarea>
                    </div>
                    <div class="col-lg-6">
                        <label class="font-weight-bold">Perawatan</label>
                        <textarea name="perawatan" id="perawatan_detail" cols="48" rows="5" readonly></textarea>
                    </div>
                    <div class="col-lg-6">
                        <label class="font-weight-bold">Tindakan</label>
                        <textarea name="tindakan" id="tindakan_detail" cols="48" rows="5" readonly></textarea>
                    </div>
                    <div class="col-lg-12">
                        <hr style="color: black;border-bottom: 3px solid black">
                    </div>
                    <table class="col-lg-12 mb-3">
                        <thead class="text-light bg-secondary">
                            <tr>
                                <th class="text-center pt-2 pb-2">RESEP OBAT</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="table-responsive table_middel">
                        <table id="tableResepDetail" class="table m-b-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aturan</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12">
                        <hr style="color: black;border-bottom: 3px solid black">
                    </div>
                    <table class="col-lg-12 mb-3">
                        <thead class="text-light bg-secondary">
                            <tr>
                                <th class="text-center pt-2 pb-2">BIAYA PEMERIKSAAN</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="col-lg-3">
                        <p>Biaya Pemeriksaan</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="biayaPemeriksaan_detail"></p>
                    </div>
                    <div class="col-lg-3">
                        <p>Biaya Konsultasi</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="biayaKonsultasi_detail"></p>
                    </div>
                    <div class="col-lg-3">
                        <p>Biaya Lain</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="biayaLain_detail"></p>
                    </div>
                    <div class="col-lg-12">
                        <hr style="color: black;border-bottom: 3px solid black">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>