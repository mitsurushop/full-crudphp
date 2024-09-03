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

$title = 'Daftar Akun';

include 'layout/header.php';

//tampil seluruh data
$data_akun = select("SELECT * FROM akun");

//tampil data berdasarkan user login
$id_akun = $_SESSION['id_akun']; 
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");

//jika tombol tambah di tekan jalankan script berikut
if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
               alert('Data Akun Berhasil Ditambahkan');
               document.location.href = 'crud-modal.php';
              </script>";
    } else {
        echo "<script>
               alert('Data Akun Gagal Ditambahkan');
               document.location.href = 'crud-modal.php';
              </script>";
    }
}

//jika tombol ubah di tekan jalankan script berikut
if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0) {
        echo "<script>
               alert('Data Akun Berhasil Diubah');
               document.location.href = 'crud-modal.php';
              </script>";
    } else {
        echo "<script>
               alert('Data Akun Gagal Diubah');
               document.location.href = 'crud-modal.php';
              </script>";
    }
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Akun</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<div class="container mt-5">
    <h1>Data Akun</h1>
    <hr>

    <?php if($_SESSION['level']== 1) : ?>
    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus"></i>Tambah</button>
    <?php endif; ?>

    <table class="table table-bordered table-striped mt-3" id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1;?>
        <?php if ($_SESSION['level'] == 1) :?>
            <?php foreach($data_akun as $akun) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $akun['nama']; ?></td>
                <td><?= $akun['username']; ?></td>
                <td><?= $akun['email']; ?></td>
                <td>Password Ter-enkripsi</td>
                <td class="text-center">
                    <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">Ubah</button>

                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <!-- tampil data berdasarkan user login -->
            <?php foreach($data_bylogin as $akun) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $akun['nama']; ?></td>
                <td><?= $akun['username']; ?></td>
                <td><?= $akun['email']; ?></td>
                <td>Password Ter-enkripsi</td>
                <td class="text-center">
                    <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>">Ubah</button>

                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white" >
                <h5 class="modal-title" id="exampleModalLabel">Tambah akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>

                    <div class="mb-3">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">-- pilih level --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator Barang</option>
                            <option value="3">Operator Mahasiswa</option>

                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

 <!-- Modal Tambah -->
<?php foreach($data_akun as $akun) :?>
   
<div class="modal fade" id="modalUbah<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white" >
                <h5 class="modal-title" id="exampleModalLabel">Ubah Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

                    <div class="mb-3">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>"required>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control"  value="<?= $akun['username']; ?>"required>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"  value="<?= $akun['email']; ?>"required>
                    </div>

                    <div class="mb-3">
                        <label for="password">Password <small>(Masukkan password baru/lama)</small></label>
                        <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    </div>

                   <?php if ($_SESSION['level']== 1 ):?>
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                  <?php $level = $akun['level']; ?>
                                  <option value="1" <?= $level == '1' ? 'selected' : null ?>>Admin</option>
                                  <option value="2" <?= $level == '2' ? 'selected' : null ?>>Operator Barang</option>
                                  <option value="3" <?= $level == '3' ? 'selected' : null ?>>operator mahasiswa</option>
                            </select>
                        </div>
                        <?php else: ?>
                       <input type="hidden" name="level" value="<?= $akun['level'];?>">
                    <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                <button type="submit" name="ubah" class="btn btn-success">ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>

<!-- Modal Hapus -->
<?php foreach ($data_akun as $akun) : ?>

<div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white" >
                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                   <p>beneran nih data akun akan dihpus : <?= $akun['nama']; ?> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php include 'layout/footer.php'; ?>
    