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

// menerima id barang yang dipilih pengguna
$id_barang = (int)$_GET['id_barang'];

if (delete_barang($id_barang)> 0) {
    echo "<script>
          alert('Yeah data barang berhasil dihapus');
          document.location.href ='index.php';
          </script>";
} else{
    "<script>
          alert('Data barang gagal dihapus');
          document.location.href ='index.php';
          </script>";
}