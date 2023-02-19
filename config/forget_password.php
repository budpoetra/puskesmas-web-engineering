<?php
include "koneksi.php";

$username = $_POST['username'];
$email = $_POST['email'];

$tampil = mysqli_query($koneksi, "SELECT * FROM login_user WHERE username = '$username' and email = '$email'");
$data = mysqli_fetch_assoc($tampil);
if ($data) {
    header('Location: ../administrator/pages/forget_password.php?id=' . $data['id']);
} else {
    header('Location: ../forget-password.php?pesan=gagal');
}
