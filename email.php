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

$title = 'Kirim Email';

include 'layout/header.php';


?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
            <ia class="fas fa-envelope"></ia>Kirim Email
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Kirim Email</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="email-proses.php" method="post">
            <div class="mb-3">
                <label for="email penerima" class="form-label">Email Penerima</label>
                <input type="email" class="form-control" id="email penerima" name="email_penerima" placeholder="email penerima..." required>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="nama" name="subject" placeholder="subject..." required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Pesan</label>
                <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control"></textarea>

            <button type="submit" name="kirim" class="btn btn-primary" style="float: right;">Kirim</button>
        </form>
     </div>
     </section>
    <!-- /.content -->
</div>

<?php include 'layout/footer.php'; ?>