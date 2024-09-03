<?php

session_start();

// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
           alert('login dulu dong');
           document.location.href = 'login.php';
          </script>";
    exit;
}

include 'config/app.php';

// menerima id akun yang dipilih pengguna
$id_akun = (int)$_GET['id_akun'];

if (delete_akun($id_akun)> 0) {
    echo "<script>
          alert('Yeah data akun berhasil dihapus');
          document.location.href ='index.php';
          </script>";
} else{
    "<script>
          alert('Data akun gagal dihapus');
          document.location.href ='index.php';
          </script>";
}