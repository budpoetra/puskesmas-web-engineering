$(function () {

    // Data Table
    $(document).ready(function () {
        $('#table').DataTable();
    });

    //========================== Admin ==========================//
    // Tambah Poli
    $(document).on('click', '#btnTambahDataPoli', function (e) {
        e.preventDefault();
        let poli = $(this).data('poli');
        $('#modalBox').modal("show");
        $('.modal-title').html('Tambah Data Poli');
        $('.modal-body').html('<input type="hidden" name="poli" id="poli"><div class="mb-3"><label for="pemeriksaan" class="form-label">Pemeriksaan</label><input type="text" class="form-control" id="pemeriksaan" name="pemeriksaan" required></div><div class="mb-3"><label for="tarif" class="form-label">Tarif</label><input type="number" class="form-control" id="tarif" name="tarif" required></div>');
        $('#poli').val(poli);
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-footer button[type=submit]').attr('id', 'btnTambahData');
    });

    // Edit Poli 
    $(document).on('click', '#btnEditDataPoli', function (e) {
        e.preventDefault();
        let poli = $(this).data('poli');
        let id_pemeriksaan = $(this).data('id');
        let pemeriksaan = $(this).data('pemeriksaan');
        let tarif = $(this).data('tarif');
        $('#modalBox').modal("show");
        $('.modal-title').html('Edit Data Poli');
        $('.modal-body').html('<input type="hidden" name="poli" id="poli"><div class="mb-3"><input type="hidden" name="id_pemeriksaan" id="id_pemeriksaan"><label for="pemeriksaan" class="form-label">Pemeriksaan</label><input type="text" class="form-control" id="pemeriksaan" name="pemeriksaan" required></div><div class="mb-3"><label for="tarif" class="form-label">Tarif</label><input type="number" class="form-control" id="tarif" name="tarif" required></div>');
        $('#poli').val(poli);
        $('#id_pemeriksaan').val(id_pemeriksaan);
        $('#pemeriksaan').val(pemeriksaan);
        $('#tarif').val(tarif);
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-footer button[type=submit]').attr('id', 'btnEditData');
    });

    // Hapus Data Poli
    $(document).on('click', '#btnHapusDataPoli', function (e) {
        e.preventDefault();
        let poli = $(this).data('poli');
        let id_pemeriksaan = $(this).data('id');
        Swal.fire({
            title: 'MENGHAPUS DATA',
            text: "Kamu yakin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../../config/hapusDataPoli.php',
                    method: 'post',
                    dataType: 'JSON',
                    data: {
                        'id_pemeriksaan': id_pemeriksaan
                    },
                    success: function (r) {
                        if (r.status == 'success') {
                            Swal.fire({
                                title: 'BERHASIL!',
                                text: r.msg,
                                icon: r.status
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.location.href = '../../../views/admin/data_poli_' + poli + '.php';
                                }
                            });
                        } else {
                            Swal.fire({
                                text: r.msg,
                                icon: r.status
                            });
                        }
                    }
                });
            }
        })
    });

    // Tambah Data Poli
    $(document).on('click', '#btnTambahData', function (e) {
        e.preventDefault();
        let poli = $('#poli').val();
        let pemeriksaan = $('#pemeriksaan').val();
        let tarif = $('#tarif').val();
        $.ajax({
            url: '../../../config/tambahDataPoli.php',
            method: 'post',
            dataType: 'JSON',
            data: {
                'poli': poli,
                'pemeriksaan': pemeriksaan,
                'tarif': tarif,
            },
            success: function (r) {
                if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_poli_' + poli + '.php';
                        }
                    });
                } else {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                }
            }
        });
    });

    // Edit Data Poli
    $(document).on('click', '#btnEditData', function (e) {
        e.preventDefault();
        let poli = $('#poli').val();
        let id_pemeriksaan = $('#id_pemeriksaan').val();
        let pemeriksaan = $('#pemeriksaan').val();
        let tarif = $('#tarif').val();
        $.ajax({
            url: '../../../config/editDataPoli.php',
            method: 'post',
            dataType: 'JSON',
            data: {
                'id_pemeriksaan': id_pemeriksaan,
                'pemeriksaan': pemeriksaan,
                'tarif': tarif,
            },
            success: function (r) {
                if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_poli_' + poli + '.php';
                        }
                    });
                } else {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                }
            }
        });
    });

    // Button Keluar Modal 
    $(document).on('click', '#btnKeluarModal', function (e) {
        e.preventDefault();
        $('#modalBox').modal("hide");
    });

    // Tambah Data Pengguna
    $('#formTambahDataPengguna').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../../config/tambahDataPengguna.php",
            type: "POST",
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                } else if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_pengguna.php';
                        }
                    });
                }
            }
        });
    });

    // Edit Data Pengguna
    $('#formEditDataPengguna').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../../config/editDataPengguna.php",
            type: "POST",
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                } else if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_pengguna.php';
                        }
                    });
                }
            }
        });
    });

    // Hapus Data Pengguna
    $(document).on('click', '#btnHapusDataPengguna', function (e) {
        e.preventDefault();
        let id_pengguna = $(this).data('id');
        Swal.fire({
            title: 'MENGHAPUS DATA',
            text: "Kamu yakin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../../config/hapusDataPengguna.php',
                    method: 'post',
                    dataType: 'JSON',
                    data: {
                        'id_pengguna': id_pengguna
                    },
                    success: function (r) {
                        if (r.status == 'success') {
                            Swal.fire({
                                title: 'BERHASIL!',
                                text: r.msg,
                                icon: r.status
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.location.href = '../../../views/admin/data_pengguna.php';
                                }
                            });
                        } else {
                            Swal.fire({
                                text: r.msg,
                                icon: r.status
                            });
                        }
                    }
                });
            }
        })
    });

    $(document).on('click', '#btnKembali', function (e) {
        e.preventDefault();
        history.back();
    });

    // Butoon Info untuk cek laporan rekam medis berdasarkan tanggal
    $(document).on('click', '#btnInfo', function () {
        let id = $('#id').val();
        let dateFrom = $('#dateFrom').val();
        let dateTo = $('#dateTo').val();
        $('tbody').load('../../../assets/ajax/lrm-pasien_search.php?id=' + id + '&dateFrom=' + dateFrom + '&dateTo=' + dateTo);
    });

    // cek username dan password pada data_pengguna-tambah.php
    $(document).on('click', '#btnCheck', function (e) {
        e.preventDefault();
        let username = $('#username').val();
        let password = $('#password').val();
        let password2 = $('#password2').val();
        $.ajax({
            url: '../../../config/data_pengguna-check.php',
            method: 'post',
            dataType: "JSON",
            data: {
                "username": username,
                "password": password,
                "password2": password2
            },
            success: function (r) {
                Swal.fire({
                    text: r.msg,
                    icon: r.icon
                })
            }
        });
    });

    // Tambah Barang
    $(document).on('click', '#btnTambahDataBarang', function (e) {
        e.preventDefault();
        $('#modalBox').modal("show");
        $('.modal-title').html('Tambah Data Barang');
        $('.modal-body').html('<div class="mb-3"><label for="nama_barang" class="form-label">Nama Barang</label><input type="text" class="form-control" id="nama_barang" name="nama_barang" required></div><div class="mb-3"><label for="harga_jual" class="form-label">Harga Jual</label><input type="number" class="form-control" id="harga_jual" name="harga_jual" required></div>');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-footer button[type=submit]').attr('id', 'btnSubmitTambahDataBarang');
    });

    // Edit Barang 
    $(document).on('click', '#btnEditDataBarang', function (e) {
        e.preventDefault();
        let kode_barang = $(this).data('kode');
        let nama = $(this).data('nama');
        let harga = $(this).data('harga');
        $('#modalBox').modal("show");
        $('.modal-title').html('Edit Data Barang');
        $('.modal-body').html('<div class="mb-3"><label for="kode_barang" class="form-label">Kode Barang</label><input type="text" class="form-control" id="kode_barang" name="kode_barang" readonly></div><div class="mb-3"><label for="nama_barang" class="form-label">Nama Barang</label><input type="text" class="form-control" id="nama_barang" name="nama_barang"></div><div class="mb-3"><label for="harga_jual" class="form-label">Harga Jual</label><input type="number" class="form-control" id="harga_jual" name="harga_jual"></div>');
        $('#kode_barang').val(kode_barang);
        $('#nama_barang').val(nama);
        $('#harga_jual').val(harga);
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-footer button[type=submit]').attr('id', 'btnSubmitEditDataBarang');
    });

    // Hapus Data Barang
    $(document).on('click', '#btnHapusDataBarang', function (e) {
        e.preventDefault();
        let id_barang = $(this).data('id');
        Swal.fire({
            title: 'MENGHAPUS DATA',
            text: "Kamu yakin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../../config/hapusDataBarang.php',
                    method: 'post',
                    dataType: 'JSON',
                    data: {
                        'id_barang': id_barang
                    },
                    success: function (r) {
                        if (r.status == 'success') {
                            Swal.fire({
                                title: 'BERHASIL!',
                                text: r.msg,
                                icon: r.status
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.location.href = '../../../views/admin/data_barang.php';
                                }
                            });
                        } else {
                            Swal.fire({
                                text: r.msg,
                                icon: r.status
                            });
                        }
                    }
                });
            }
        })
    });

    // Tambah Data Barang
    $(document).on('click', '#btnSubmitTambahDataBarang', function (e) {
        e.preventDefault();
        let nama_barang = $('#nama_barang').val();
        let harga_jual = $('#harga_jual').val();
        $.ajax({
            url: '../../../config/tambahDataBarang.php',
            method: 'post',
            dataType: 'JSON',
            data: {
                'nama_barang': nama_barang,
                'harga_jual': harga_jual
            },
            success: function (r) {
                if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_barang.php';
                        }
                    });
                } else {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                }
            }
        });
    });

    // Edit Data Barang
    $(document).on('click', '#btnSubmitEditDataBarang', function (e) {
        e.preventDefault();
        let kode_barang = $('#kode_barang').val();
        let nama_barang = $('#nama_barang').val();
        let harga_jual = $('#harga_jual').val();
        $.ajax({
            url: '../../../config/editDataBarang.php',
            method: 'post',
            dataType: 'JSON',
            data: {
                'kode_barang': kode_barang,
                'nama_barang': nama_barang,
                'harga_jual': harga_jual
            },
            success: function (r) {
                if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_barang.php';
                        }
                    });
                } else {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                }
            }
        });
    });

    // Tambah Aturan Pakai
    $(document).on('click', '#btnTambahDataAturan', function (e) {
        e.preventDefault();
        $('#modalBox').modal("show");
        $('.modal-title').html('Tambah Data Aturan Pakai');
        $('.modal-body').html('<div class="mb-3"><label for="aturan_pakai" class="form-label">Aturan Pakai</label><input type="text" class="form-control" id="aturan_pakai" name="aturan_pakai" required></div>');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-footer button[type=submit]').attr('id', 'btnSubmitTambahDataAturan');
    });

    // Edit Aturan Pakai
    $(document).on('click', '#btnEditDataAturan', function (e) {
        e.preventDefault();
        let id_aturan_pakai = $(this).data('id');
        let aturan = $(this).data('aturan');
        $('#modalBox').modal("show");
        $('.modal-title').html('Edit Data Data Aturan Pakai');
        $('.modal-body').html('<input type="hidden" name="id_aturan_pakai" id="id_aturan_pakai"><div class="mb-3"><div class="mb-3"><label for="aturan_pakai" class="form-label">Aturan Pakai</label><input type="text" class="form-control" id="aturan_pakai" name="aturan_pakai"></div>');
        $('#id_aturan_pakai').val(id_aturan_pakai);
        $('#aturan_pakai').val(aturan);
        $('.modal-footer button[type=submit]').html('Edit Data');
        $('.modal-footer button[type=submit]').attr('id', 'btnSubmitEditDataAturan');
    });

    // Hapus Data Aturan Pakai
    $(document).on('click', '#btnHapusDataAturan', function (e) {
        e.preventDefault();
        let id_aturan_pakai = $(this).data('id');
        Swal.fire({
            title: 'MENGHAPUS DATA',
            text: "Kamu yakin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../../config/hapusDataAturan.php',
                    method: 'post',
                    dataType: 'JSON',
                    data: {
                        'id_aturan_pakai': id_aturan_pakai
                    },
                    success: function (r) {
                        if (r.status == 'success') {
                            Swal.fire({
                                title: 'BERHASIL!',
                                text: r.msg,
                                icon: r.status
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.location.href = '../../../views/admin/data_aturan_pakai.php';
                                }
                            });
                        } else {
                            Swal.fire({
                                text: r.msg,
                                icon: r.status
                            });
                        }
                    }
                });
            }
        })
    });

    // Tambah Data Aturan Pakai
    $(document).on('click', '#btnSubmitTambahDataAturan', function (e) {
        e.preventDefault();
        let aturan_pakai = $('#aturan_pakai').val();
        $.ajax({
            url: '../../../config/tambahDataAturan.php',
            method: 'post',
            dataType: 'JSON',
            data: {
                'aturan_pakai': aturan_pakai
            },
            success: function (r) {
                if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_aturan_pakai.php';
                        }
                    });
                } else {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                }
            }
        });
    });

    // Edit Data Aturan
    $(document).on('click', '#btnSubmitEditDataAturan', function (e) {
        e.preventDefault();
        let id_aturan_pakai = $('#id_aturan_pakai').val();
        let aturan_pakai = $('#aturan_pakai').val();
        $.ajax({
            url: '../../../config/editDataAturan.php',
            method: 'post',
            dataType: 'JSON',
            data: {
                'id_aturan_pakai': id_aturan_pakai,
                'aturan_pakai': aturan_pakai
            },
            success: function (r) {
                if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_aturan_pakai.php';
                        }
                    });
                } else {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                }
            }
        });
    });

    // Tambah Data Pasien
    $('#formTambahDataPasien').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../../config/tambahDataPasien.php",
            type: "POST",
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                } else if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_pasien.php';
                        }
                    });
                }
            }
        });
    });

    // Edit Data Pasien
    $('#formEditDataPasien').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../../config/editDataPasien.php",
            type: "POST",
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                } else if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/admin/data_pasien.php';
                        }
                    });
                }
            }
        });
    });

    // Hapus Data Pasien
    $(document).on('click', '#btnHapusDataPasien', function (e) {
        e.preventDefault();
        let id_pasien = $(this).data('id');
        Swal.fire({
            title: 'MENGHAPUS DATA',
            text: "Kamu yakin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../../config/hapusDataPasien.php',
                    method: 'post',
                    dataType: 'JSON',
                    data: {
                        'id_pasien': id_pasien
                    },
                    success: function (r) {
                        if (r.status == 'success') {
                            Swal.fire({
                                title: 'BERHASIL!',
                                text: r.msg,
                                icon: r.status
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.location.href = '../../../views/admin/data_pasien.php';
                                }
                            });
                        } else {
                            Swal.fire({
                                text: r.msg,
                                icon: r.status
                            });
                        }
                    }
                });
            }
        })
    });
    // ========================== END ADMIN ==========================//

    //========================== Dokter ==========================//
    $(document).on('click', '#btnPeriksa', function (e) {
        e.preventDefault();
        let id_pasien = $(this).attr("data-id");
        let no_regis = $(this).attr("data-regis");
        let nama_pasien = $(this).attr("data-nama");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
        $('.modal-title-periksa').html('Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
        $('#id_pasien').val(id_pasien);
        $('#no_regis').val(no_regis);
        $('#nama_pasien').val(nama_pasien);
    });

    // Modal Pemeriksaan
    $(document).on('click', '#btnPemeriksaan', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        let nama_pasien = $('#nama_pasien').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=menuPemeriksaan',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis
            },
            success: function (r) {
                $('#modalBox').modal("hide");
                $('#modalPemeriksaan').modal({
                    "backdrop": "static",
                    "keyboard": false
                }, "show");
                $('.modal-title-pemeriksaan').html('Menu Pemeriksaan || Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
                $('#no_regis_pemeriksaan').val(no_regis);
                $('#suhu_pemeriksaan').val(r.suhu);
                $('#alergi_makanan_pemeriksaan').val(r.alergi_makanan);
                $('#alergi_udara_pemeriksaan').val(r.alergi_udara);
                $('#alergi_obat_pemeriksaan').val(r.alergi_obat);
                $('#sistole_pemeriksaan').val(r.sistole);
                $('#diastole_pemeriksaan').val(r.diastole);
                $('#respi_rate_pemeriksaan').val(r.respi_rate);
                $('#heart_rate_pemeriksaan').val(r.heart_rate);
                $('#kesadaran_pemeriksaan').val(r.kesadaran);
                $('#keluhan_pemeriksaan').val(r.keluhan);
                $('#diagnosa_pemeriksaan').val(r.diagnosa);
                $('#perawatan_pemeriksaan').val(r.perawatan);
                $('#tindakan_pemeriksaan').val(r.tindakan);
            }
        });
    });

    $(document).on('submit', '#formPemeriksaanDokter', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=simpanPemeriksaan',
            method: 'post',
            dataType: "JSON",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                Swal.fire({
                    title: 'BERHASIL!',
                    text: r.msg,
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalPemeriksaan').modal("hide");
                        $('#modalBox').modal({
                            "backdrop": "static",
                            "keyboard": false
                        }, "show");
                    }
                });
            }
        });
    })

    $(document).on('click', '#btnKembaliPemeriksaan', function (e) {
        e.preventDefault();
        $('#modalPemeriksaan').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    // Modal Resep Obat
    $(document).on('click', '#btnResepObat', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        let nama_pasien = $('#nama_pasien').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=menuResepObat',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis
            },
            success: function (r) {
                $('#modalBox').modal("hide");
                $('#modalResepObat').modal({
                    "backdrop": "static",
                    "keyboard": false
                }, "show");
                $('.modal-title-resepObat').html('Menu Resep Obat || Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
                $('#dokter').val(r.dokter);
                $('#cetak').attr('href', '../pdf/pdf-resep_obat.php?regis='+ no_regis);
            }
        });

        let tableResep = $('#tableResep').DataTable({
            "bDestroy": true,
            "ajax": {
                'type': 'get',
                'dataType': "JSON",
                'data': {
                    "no_regis": no_regis
                },
                'url': "../../../config/dokter_aksi.php?aksi=dataResepObat"
            },
            "order": [
                [2, 'asc']
            ],
            "columns": [{
                    "data": null,
                    "width": "50px",
                    "sClass": "text-center",
                    "orderable": false,
                },
                {
                    "data": "nama_barang"
                },
                {
                    "data": "jumlah_barang"
                },
                {
                    "data": "harga"
                },
                {
                    "data": null,
                    render: function (r) {
                        return r.jumlah_barang * r.harga
                    }
                },
                {
                    "data": null,
                    render: function (r) {
                        return "<button id='btnHapusResep' class='btn btn-danger' data-id='" + r.id + "'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='white' class='bi bi-trash mt-1' viewBox='0 0 16 16'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z' /><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z' /></svg></button>"
                    }
                }
            ]
        });

        tableResep.on('order.dt search.dt', function () {
            tableResep.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=totalHargaResepObat',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis
            },
            success: function (r) {
                if (r.total_harga == null) {
                    let jumlahHarga = 0;
                    $('#jumlahHarga').html('Total Harga : Rp. ' + jumlahHarga);
                } else {
                    let jumlahHarga = parseInt(r.total_harga);
                    $('#jumlahHarga').html('Total Harga : Rp. ' + jumlahHarga);
                }
            }
        });
    });

    $(document).on('click', '#btnInputObat', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        let kodeBarang = $('#kodeBarang').val();
        let aturanPakai = $('#aturanPakai').val();
        let jumlahObat = $('#jumlahObat').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=inputObat',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis,
                "kodeBarang": kodeBarang,
                "aturanPakai": aturanPakai,
                "jumlahObat": jumlahObat
            },
            success: function (r) {
                Swal.fire({
                    title: 'BERHASIL!',
                    text: r.msg,
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../../../config/dokter_aksi.php?aksi=totalHargaResepObat',
                            method: 'post',
                            dataType: "JSON",
                            data: {
                                "no_regis": no_regis
                            },
                            success: function (r) {
                                if (r.total_harga == null) {
                                    let jumlahHarga = 0;
                                    $('#jumlahHarga').html('Total Harga : Rp. ' + jumlahHarga);
                                } else {
                                    let jumlahHarga = parseInt(r.total_harga);
                                    $('#jumlahHarga').html('Total Harga : Rp. ' + jumlahHarga);
                                }
                            }
                        });
                        $('#tableResep').DataTable().ajax.reload();
                    }
                });
            }
        });
    });

    $(document).on('click', '#btnHapusResep', function (e) {
        e.preventDefault();
        let id_resep = $(this).data('id');
        let no_regis = $('#no_regis').val();
        Swal.fire({
            title: 'MENGHAPUS RESEP OBAT',
            text: "Kamu yakin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../../config/dokter_aksi.php?aksi=hapusResepObat',
                    method: 'post',
                    dataType: "JSON",
                    data: {
                        "id_resep": id_resep
                    },
                    success: function (r) {
                        Swal.fire({
                            title: 'BERHASIL!',
                            text: r.msg,
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '../../../config/dokter_aksi.php?aksi=totalHargaResepObat',
                                    method: 'post',
                                    dataType: "JSON",
                                    data: {
                                        "no_regis": no_regis
                                    },
                                    success: function (r) {
                                        if (r.total_harga == null) {
                                            let jumlahHarga = 0;
                                            $('#jumlahHarga').html('Total Harga : Rp. ' + jumlahHarga);
                                        } else {
                                            let jumlahHarga = parseInt(r.total_harga);
                                            $('#jumlahHarga').html('Total Harga : Rp. ' + jumlahHarga);
                                        }
                                    }
                                });
                                $('#tableResep').DataTable().ajax.reload();
                            }
                        });
                    }
                });
            }
        })
    });

    $(document).on('click', '#btnKembaliResepObat', function (e) {
        e.preventDefault();
        $('#modalResepObat').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    // Modal Biaya
    $(document).on('click', '#btnBiaya', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        let nama_pasien = $('#nama_pasien').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=menuBiaya',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis
            },
            success: function (r) {
                $('#modalBiaya').modal({
                    "backdrop": "static",
                    "keyboard": false
                }, "show");
                $('#modalBox').modal("hide");
                $('.modal-title-biaya').html('Menu Biaya || Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
                $('#biayaPemeriksaan').val(r.biayaPemeriksaan);
                $('#biayaKonsultasi').val(r.biayaKonsultasi);
                $('#biayaLain').val(r.biayaLain);
            }
        });
    });

    $(document).on('click', '#btnKembaliBiaya', function (e) {
        e.preventDefault();
        $('#modalBiaya').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    $(document).on('click', '#btnSimpanBiaya', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        let biayaPemeriksaan = $('#biayaPemeriksaan').val();
        let biayaKonsultasi = $('#biayaKonsultasi').val();
        let biayaLain = $('#biayaLain').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=simpanBiaya',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis,
                "biayaPemeriksaan": biayaPemeriksaan,
                "biayaKonsultasi": biayaKonsultasi,
                "biayaLain": biayaLain
            },
            success: function (r) {
                Swal.fire({
                    title: 'BERHASIL!',
                    text: r.msg,
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalBiaya').modal("hide");
                        $('#modalBox').modal({
                            "backdrop": "static",
                            "keyboard": false
                        }, "show");
                    }
                });
            }
        });
    });

    // Modal Surat Sakit
    $(document).on('click', '#btnSuratSakit', function (e) {
        e.preventDefault();
        let id_pasien = $('#id_pasien').val();
        let no_regis = $('#no_regis').val();
        let nama_pasien = $('#nama_pasien').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=menuSuratSakit',
            method: 'post',
            dataType: "JSON",
            data: {
                "id_pasien": id_pasien
            },
            success: function (r) {
                $('#modalSuratSakit').modal({
                    "backdrop": "static",
                    "keyboard": false
                }, "show");
                $('#modalBox').modal("hide");
                $('.modal-title-sakit').html('Surat Sakit || Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
                $('#no_regis_suratSakit').val(r.no_regis);
                $('#nomor_surat_sakit').val(r.nomor_surat);
                $('#nama_surat_sakit').val(nama_pasien);
                $('#usia_surat_sakit').val(r.usia);
                $('#alamat_surat_sakit').val(r.alamat);
                $('#hasil_pemeriksaan_surat_sakit').val(r.hasil);
                $('#kondisi_surat_sakit').val(r.kondisi);
                $('#keterangan_surat_sakit').val(r.ket);
            }
        });
    });

    $(document).on('click', '#btnCetakSuratSakit', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis_suratSakit').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=cetakSuratSakit',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis
            },
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: 'warning'
                    })
                } else {
                    window.open(r.msg);
                }
            }
        });
    });

    $(document).on('click', '#btnSimpanSuratSakit', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis_suratSakit').val();
        let nomor_surat = $('#nomor_surat_sakit').val();
        let hasil = $('#hasil_pemeriksaan_surat_sakit').val();
        let kondisi = $('#kondisi_surat_sakit').val();
        let ket = $('#keterangan_surat_sakit').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=simpanSuratSakit',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis,
                "nomor_surat": nomor_surat,
                "hasil": hasil,
                "kondisi": kondisi,
                "ket": ket
            },
            success: function (r) {
                Swal.fire({
                    title: 'BERHASIL!',
                    text: r.msg,
                    icon: 'success'
                })
            }
        });
    });

    $(document).on('click', '#btnKembaliSuratSakit', function (e) {
        e.preventDefault();
        $('#modalSuratSakit').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    // Modal Surat Sehat
    $(document).on('click', '#btnSuratSehat', function (e) {
        e.preventDefault();
        let id_pasien = $('#id_pasien').val();
        let no_regis = $('#no_regis').val();
        let nama_pasien = $('#nama_pasien').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=menuSuratSehat',
            method: 'post',
            dataType: "JSON",
            data: {
                "id_pasien": id_pasien
            },
            success: function (r) {
                $('#modalSuratSehat').modal({
                    "backdrop": "static",
                    "keyboard": false
                }, "show");
                $('#modalBox').modal("hide");
                $('.modal-title-sehat').html('Surat Sehat || Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
                $('#no_regis_suratSehat').val(r.no_regis);
                $('#nomor_surat_sehat').val(r.nomor_surat);
                $('#nama_surat_sehat').val(nama_pasien);
                $('#usia_surat_sehat').val(r.usia);
                $('#alamat_surat_sehat').val(r.alamat);
                $('#gender_surat_sehat').val(r.gender);
                $('#berat_surat_sehat').val(r.berat_badan);
                $('#tinggi_surat_sehat').val(r.tinggi_badan);
                $('#darah_surat_sehat').val(r.tekanan_darah);
                $('#goldar_surat_sehat').val(r.goldar);
                $('#pekerjaan_surat_sehat').val(r.pekerjaan);
                $('#vos_surat_sehat').val(r.vos);
                $('#vod_surat_sehat').val(r.vod);
                $('#buta_warna').val(r.buta_warna);
                $('#keterangan_surat_sehat').val(r.ket);
            }
        });
    });

    $(document).on('click', '#btnCetakSuratSehat', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis_suratSehat').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=cetakSuratSehat',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis
            },
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: 'warning'
                    })
                } else {
                    window.open(r.msg);
                }
            }
        });
    });

    $(document).on('click', '#btnSimpanSuratSehat', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis_suratSehat').val();
        let nomor_surat = $('#nomor_surat_sehat').val();
        let ket = $('#keterangan_surat_sehat').val();
        let pekerjaan = $('#pekerjaan_surat_sehat').val();
        let berat_badan = $('#berat_surat_sehat').val();
        let tinggi_badan = $('#tinggi_surat_sehat').val();
        let darah = $('#darah_surat_sehat').val();
        let denyut = $('#denyut_surat_sehat').val();
        let vos = $('#vos_surat_sehat').val();
        let vod = $('#vod_surat_sehat').val();
        let goldar = $('#goldar_surat_sehat').val();
        let buta_warna = $('#buta_warna').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=simpanSuratSehat',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis,
                "nomor_surat": nomor_surat,
                "ket": ket,
                "pekerjaan": pekerjaan,
                "berat_badan": berat_badan,
                "tinggi_badan": tinggi_badan,
                "darah": darah,
                "denyut": denyut,
                "vos": vos,
                "vod": vod,
                "goldar": goldar,
                "buta_warna": buta_warna
            },
            success: function (r) {
                Swal.fire({
                    title: 'BERHASIL!',
                    text: r.msg,
                    icon: 'success'
                })
            }
        });
    });

    $(document).on('click', '#btnKembaliSuratSehat', function (e) {
        e.preventDefault();
        $('#modalSuratSehat').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    // Modal Rujukan
    $(document).on('click', '#btnRujukan', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        let nama_pasien = $('#nama_pasien').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=menuRujukan',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis
            },
            success: function (r) {
                $('#modalBox').modal("hide");
                $('#modalRujukan').modal({
                    "backdrop": "static",
                    "keyboard": false
                }, "show");
                $('.modal-title-rujukan').html('Menu Rujukan || Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
                $('#id_pasien_rujukan').val(r.id_pasien);
                $('#keluhan_rujukan').val(r.keluhan);
                $('#rs_rujukan').val(r.rs_rujukan);
            }
        });
    });

    $(document).on('click', '#btnKembaliRujukan', function (e) {
        e.preventDefault();
        $('#modalRujukan').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    $(document).on('click', '#btnSimpanRujukan', function (e) {
        e.preventDefault();
        let id_pasien = $('#id_pasien_rujukan').val();
        let no_regis = $('#no_regis').val();
        let rs_rujukan = $('#rs_rujukan').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=simpanRujukan',
            method: 'post',
            dataType: "JSON",
            data: {
                "id_pasien": id_pasien,
                "no_regis": no_regis,
                "rs_rujukan": rs_rujukan
            },
            success: function (r) {
                Swal.fire({
                    title: 'BERHASIL!',
                    text: r.msg,
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#modalRujukan').modal("hide");
                        $('#modalBox').modal({
                            "backdrop": "static",
                            "keyboard": false
                        }, "show");
                    }
                });
            }
        });
    });

    // Hapus Pemeriksaan
    $(document).on('click', '#btnHapusPemeriksaan', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        Swal.fire({
            title: 'MENGHAPUS DATA PEMERIKSAAN',
            text: "Kamu yakin ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../../config/dokter_aksi.php?aksi=hapusPemeriksaan',
                    method: 'post',
                    dataType: "JSON",
                    data: {
                        "no_regis": no_regis
                    },
                    success: function (r) {
                        Swal.fire({
                            title: 'BERHASIL!',
                            text: r.msg,
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.location.reload();
                            }
                        });
                    }
                });
            }
        })
    });

    // Modal Ubah Pemeriksaan
    $(document).on('click', '#btnUbahPemeriksaan', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        let nama_pasien = $('#nama_pasien').val();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=menuUbahPemeriksaan',
            method: 'post',
            dataType: "JSON",
            data: {
                "no_regis": no_regis
            },
            success: function (r) {
                $('#modalBox').modal("hide");
                $('#modalUbahPemeriksaan').modal({
                    "backdrop": "static",
                    "keyboard": false
                }, "show");
                $('.modal-title-ubah').html('Ubah Pemeriksaan || Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
                $('#no_regis_ubahPemeriksaan').val(no_regis);
                $('#nama_lengkap').val(nama_pasien);
                $('#poli').val(r.poli);
                $('#jenis_kunjungan').val(r.jenis_kunjungan);
                $('#cara_masuk').val(r.cara_masuk);
                $('#tanggal_pemeriksaan').val(r.tanggal_pemeriksaan);
                $('#kesadaran').val(r.kesadaran);
                $('#tinggi_badan').val(r.tinggi_badan);
                $('#berat_badan').val(r.berat_badan);
                $('#lingkar_perut').val(r.lingkar_perut);
                $('#imt').val(r.imt);
                $('#suhu').val(r.suhu);
                $('#alergi_makanan').val(r.alergi_makanan);
                $('#alergi_udara').val(r.alergi_udara);
                $('#alergi_obat').val(r.alergi_obat);
                $('#sistole').val(r.sistole);
                $('#diastole').val(r.diastole);
                $('#respi_rate').val(r.respi_rate);
                $('#heart_rate').val(r.heart_rate);
            }
        });
    });

    $('#formUbahPemeriksaan').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=simpanUbahPemeriksaan',
            method: 'post',
            dataType: "JSON",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: 'success'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#modalUbahPemeriksaan').modal("hide");
                            $('#modalBox').modal({
                                "backdrop": "static",
                                "keyboard": false
                            }, "show");
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'GAGAL!',
                        text: r.msg,
                        icon: 'error    '
                    })
                }
            }
        });
    });

    $(document).on('click', '#btnKembaliUbahPemeriksaan', function (e) {
        e.preventDefault();
        $('#modalUbahPemeriksaan').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    // Selesai Pemeriksaan
    $(document).on('click', '#btnSelesaiPemeriksaan', function (e) {
        e.preventDefault();
        $('#modalSelesai').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    $(document).on('click', '#btnSimpanSelesai', function (e) {
        e.preventDefault();
        let no_regis = $('#no_regis').val();
        let status_pulang = $('#status_pulang').val();
        $('#modalSelesai').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
        Swal.fire({
            title: 'SELESAI PEMERIKSAAN',
            text: "Sudah selesai pemeriksaan pasien ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Sudah!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../../../config/dokter_aksi.php?aksi=selesaiPemeriksaan',
                    method: 'post',
                    dataType: "JSON",
                    data: {
                        "no_regis": no_regis,
                        "status_pulang": status_pulang
                    },
                    success: function (r) {
                        Swal.fire({
                            title: 'BERHASIL!',
                            text: r.msg,
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.location.reload();
                            }
                        });
                    }
                });
            }
        })
    });

    $(document).on('click', '#btnKembaliSelesai', function (e) {
        e.preventDefault();
        $('#modalSelesai').modal("hide");
        $('#modalBox').modal({
            "backdrop": "static",
            "keyboard": false
        }, "show");
    });

    // Modal Detail Pemeriksaan
    $(document).on('click', '#btnDetailPemeriksaan', function (e) {
        e.preventDefault();
        let id_registrasi = $(this).data('id');
        let nama_pasien = $(this).data('nama');
        let no_regis = $(this).data('regis');
        $.ajax({
            url: '../../../config/dokter_aksi.php?aksi=menuDetailPemeriksaan',
            method: 'post',
            dataType: "JSON",
            data: {
                "id_registrasi": id_registrasi
            },
            success: function (r) {
                $('#modalDetailPemeriksaan').modal({
                    "backdrop": "static",
                    "keyboard": false
                }, "show");
                $('.modal-title-detail').html('Detail Pemeriksaan || Nama Pasien : ' + nama_pasien + ' || No Registrasi : ' + no_regis);
                let tableResepDetail = $('#tableResepDetail').DataTable({
                    "bDestroy": true,
                    "searching": false,
                    "lengthChange": false,
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "ajax": {
                        'type': 'get',
                        'dataType': "JSON",
                        'data': {
                            "no_regis": no_regis
                        },
                        'url': "../../../config/dokter_aksi.php?aksi=dataResepObat"
                    },
                    "order": [
                        [2, 'asc']
                    ],
                    "columns": [{
                            "data": null,
                            "width": "50px",
                            "sClass": "text-center",
                            "orderable": false,
                        },
                        {
                            "data": "nama_barang"
                        },
                        {
                            "data": "jumlah_barang"
                        },
                        {
                            "data": "harga"
                        },
                        {
                            "data": null,
                            render: function (r) {
                                return r.jumlah_barang * r.harga
                            }
                        },
                        {
                            "data": "aturan_pakai"
                        }
                    ]
                });

                tableResepDetail.on('order.dt search.dt', function () {
                    tableResepDetail.column(0, {
                        search: 'applied',
                        order: 'applied'
                    }).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
                $('#keluhan_detail').val(r.keluhan);
                $('#diagnosa_detail').val(r.diagnosa);
                $('#perawatan_detail').val(r.perawatan);
                $('#tindakan_detail').val(r.tindakan);
                $('#biayaPemeriksaan_detail').html(r.biaya_pemeriksaan);
                $('#biayaKonsultasi_detail').html(r.biaya_konsultasi);
                $('#biayaLain_detail').html(r.biaya_lain);
            }
        });
    });

    //========================== Resepsionis ==========================//
    // Registrasi Ulang
    $('#formRegistrastiUlang').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../../config/registrasiUlang.php",
            type: "POST",
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                } else if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../nomor-antrian/index.php?id_pasien=' + r.id_pasien + '&poli=' + r.poli;
                        }
                    });
                }
            }
        });
    });

    // Pembayaran
    $('#formPembayaran').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../../config/pembayaran.php",
            type: "POST",
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                } else if (r.status == 'success') {
                    $.ajax({
                        url: "../mailsender/index.php",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            "regis": r.regis
                        }
                    });
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../views/resepsionis/administrasi.php';
                        }
                    });
                }
            }
        });
    });

    // Tabel Pembayaran
    $(document).ready(function() {
        let data = document.querySelectorAll('#totalHargaBarang');
        let totalHargaBarang = 0;
        let i = 0;
        while (i < data.length) {
            totalHargaBarang += parseInt($(data[i]).val());
            i++;
        }
        let biayaPemeriksaan = parseInt($('#biayaPemeriksaan').val());
        let biayaKonsultasi = parseInt($('#biayaKonsultasi').val());
        let biayaLain = parseInt($('#biayaLain').val());

        let totalBiaya = totalHargaBarang + biayaPemeriksaan + biayaKonsultasi + biayaLain;

        var number_string = totalBiaya.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        $('#totalBiaya').val(totalBiaya);
        $('#totalBiayaFormat').val('Rp. ' + rupiah);

        $(document).on('keyup', '#bayar', function(e) {
            e.preventDefault();
            let total = parseInt($('#totalBiaya').val());
            let bayar = parseInt($('#bayar').val());
            let kembalian = bayar - total;
            if (kembalian >= 0) {
                var number_string = kembalian.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                $('#kembalian').attr('value', 'Rp. ' + rupiah);
            } else {
                $('#kembalian').attr('value', 'Pembayaran Belum Sesuai Total Biaya');
            }
        });
    });

    //========================== PASIEN ==========================//
    // pendaftaran Lanjutan
    $(document).on('click', '#btnSubmitPendaftaranLanjutan', function (e) {
        e.preventDefault();
        let id_pasien = $('#id_pasien').val();
        let nama_lengkap = $('#nama_lengkap').val();
        let nama_ortu = $('#nama_ortu').val();
        let tempat_lahir = $('#tempat_lahir').val();
        let tgl_lahir = $('#tgl_lahir').val();
        let gender = $('#gender').val();
        let alamat = $('#alamat').val();
        let agama = $('#agama').val();
        let bpjs = $('#bpjs').val();
        let goldar = $('#goldar').val();

        if (id_pasien == '' || nama_lengkap == '' || nama_ortu == '' || tempat_lahir == '' || tgl_lahir == '' || gender == '' || alamat == '' || agama == '' || goldar == '') {
            Swal.fire({
                text: 'Data Belum Lengkap!',
                icon: 'warning'
            });
        } else {
            $.ajax({
                url: '../../../config/pasien_ajax.php?aksi=pendaftaranLanjutan',
                method: 'post',
                dataType: "JSON",
                data: {
                    "id_pasien": id_pasien,
                    "nama_lengkap": nama_lengkap,
                    "nama_ortu": nama_ortu,
                    "tempat_lahir": tempat_lahir,
                    "tgl_lahir": tgl_lahir,
                    "gender": gender,
                    "alamat": alamat,
                    "agama": agama,
                    "bpjs": bpjs,
                    "goldar": goldar
                },
                success: function (r) {
                    if (r.status == 'success') {
                        Swal.fire({
                            title: 'BERHASIL!',
                            text: r.msg,
                            icon: r.status
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.location.href = '../../../config/logout.php';
                            }
                        });
                    }
                }
            });
        }
    });

    // Message
    $(document).on('click', '#btnMessageUser', function(e) {
        e.preventDefault();
        let id_pengguna = $(this).attr('data-id');
        let id_pasien = $(this).attr('data-user');
        $('#chat_box').load('chat_box.php?pengirim=' + id_pasien + '&penerima=' + id_pengguna);
        $('#btnSendMessage').attr('data-pengirim', id_pasien);
        $('#btnSendMessage').attr('data-penerima', id_pengguna);
        $('#id_pasien_message').attr('value', id_pasien);
        $('#id_pengguna_message').attr('value', id_pengguna);
        $('#chat_box').animate({scrollTop:$('#chat_box').height()});
    });

    $(document).on('click', '#btnSendMessage', function(e) {
        e.preventDefault();
        let id_pengirim = $(this).attr('data-pengirim');
        let id_penerima = $(this).attr('data-penerima');
        let message = $('#message').val();
        $.ajax({
            url: '../../../config/sendMessage.php',
            method: 'POST',
            dataType: 'JSON',
            data: {
                'id_pengirim': id_pengirim,
                'id_penerima': id_penerima,
                'message': message
            },
            success: function (r) {
                if (r.status == 'success') {
                    $('#chat_box').load('chat_box.php?pengirim=' + id_pengirim + '&penerima=' + id_penerima);
                    $('#formMessage').load('formMessage.php');
                } else {
                    console.log(r.status);
                }
            }
        });
    });

    $(document).on('click', '#btnMessageResepsionis', function(e) {
        e.preventDefault();
        let id_pengguna = $(this).attr('data-id');
        let id_pasien = $(this).attr('data-user');
        $('#chat_box').load('chat_box.php?pengirim=' + id_pengguna + '&penerima=' + id_pasien);
        $('#btnSendMessage').attr('data-pengirim', id_pengguna);
        $('#btnSendMessage').attr('data-penerima', id_pasien);
        $('#id_pasien_message').attr('value', id_pasien);
        $('#id_pengguna_message').attr('value', id_pengguna);
        $('#chat_box').animate({scrollTop:$('#chat_box').height()});
    });

    // ALL RESET PASSWORD
    $(document).on('submit', '#formGantiPassword', function(e) {
        e.preventDefault();
        $.ajax({
            url: "../../../config/ganti_password.php",
            type: "POST",
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                if (r.status == 'error') {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                } else if (r.status == 'warning') {
                    Swal.fire({
                        text: r.msg,
                        icon: r.status
                    });
                } else if (r.status == 'success') {
                    Swal.fire({
                        title: 'BERHASIL!',
                        text: r.msg,
                        icon: r.status
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.location.href = '../../../config/logout.php';
                        }
                    });
                }
            }
        });
    })

    // Forget Password
    $(document).on('click', '#btnSubmitForgetPassword', function (e) {
        e.preventDefault();
        let id = $('#id').val();
        let password = $('#password').val();
        let password2 = $('#password2').val();

        if (id == '' || password == '' || password2 == '') {
            Swal.fire({
                text: 'Data Belum Lengkap!',
                icon: 'warning'
            });
        } else {
            $.ajax({
                url: '../../config/reset_password.php',
                method: 'post',
                dataType: "JSON",
                data: {
                    "id": id,
                    "password": password,
                    "password2": password2
                },
                success: function (r) {
                    if (r.status == 'success') {
                        Swal.fire({
                            title: 'BERHASIL!',
                            text: r.msg,
                            icon: r.status
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.location.href = '../../config/logout.php';
                            }
                        });
                    } else {
                        Swal.fire({
                            text: r.msg,
                            icon: r.status
                        })
                    }
                }
            });
        }
    });
});