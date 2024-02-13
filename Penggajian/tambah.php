<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Penggajian</title>
  </head>
  <?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php");
    exit;
	}
  ?>
  <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "hapus"){
            echo '<script language="JavaScript" type="text/javascript">';
            echo 'alert("Data berhasil di hapus!");';
            echo '</script>';
        } 
        else if($_GET['pesan'] == "tambah"){
          echo '<script language="JavaScript" type="text/javascript">';
          echo 'alert("Data berhasil di Tambahkan!");';
          echo '</script>';
      } 
      else if($_GET['pesan'] == "update"){
        echo '<script language="JavaScript" type="text/javascript">';
        echo 'alert("Data berhasil di Update!");';
        echo '</script>';
     }
     else if($_GET['pesan'] == "gagal"){
        echo '<script language="JavaScript" type="text/javascript">';
        echo 'alert("ID sudah di gunakan, gunakan id lain!");';
        echo '</script>';
    }  
    }
?>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark "style="background-color:#6666ff">
  <div class="container">
    <a class="navbar-brand" href="#">Karyawan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="view.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tambah.php">Tambah Data</a>
        </li>
      
      </ul>
    
      <li class="nav dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <img src=https://cdn.onlinewebfonts.com/svg/img_303834.png width="30px" class="rounded-circle">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="logout.php">Log Out</a>
          </ul>
        </li>
        
      
    </div>
  </div>
</nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <div class="container mt-3">
  <h2>Input Data Karyawan</h2>
  <form method="post" enctype="multipart/form-data" action="aksi_tambah.php">

  
    <div class="mb-3 mt-3">
    <label for="email">Masukkan id karyawan:</label>
      <input type="text" class="form-control" placeholder="Masukan ID Karyawan" name="kode">
    </div>
    <div class="mb-3">
</div>
    <div>
      <label for="email">Nama karyawan:</label>
      <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama karyawan" > 
    </div><br>
    <div class="mb-3">
      <label for="pwd">Jabatan:</label><br>
        <select name="jabatan" class="form-control" >
          <option value="Pilih Jabatan">Pilih Jabatan</option>
          <option value="Direks / CEO">Direksi / CEO</option>
          <option value="Direktur Utama">Direktur Utama</option>
          <option value="Bagian Keuangan">Bagian Keuangan</option>
          <option value="Bagian Direktur">Bagian Direktur</option>
          <option value="Manager">Manager</option>     
          <option value="Jabatan Personalia">Jabatan Personalia</option>
          <option value="Administrasi dan Pergudangan">Administrasi dan Pergudangan</option>
          <option value="Divisi Perusahaan Area Regional">Divisi Perusahaan Area Regional</option>
        </select>
    </div>
    <div class="mb-3">
      <label for="pwd">Bonus:</label><br>
        <select name="jenis_bonus" class="form-control">
          <option value="Pilih Bonus">Pilih Bonus</option>
          <option value="THR">THR</option>
          <option value="Lembur">Lembur</option>
          <option value="Tahunan">Tahunan</option>
          <option value="Prestasi">Prestasi</option>
          <option value="Retensi">Retensi</option>
          <option value="Loyalitas">Loyalitas</option>
          <option value="Kehadiran">Kehadiran</option>
        </select>
    </div>
    <div class="mb-3">
      <label for="pwd">Jumlah Absen:</label>
      <input type="text" class="form-control" name="absen" id="absen" placeholder="Masukan Absen karyawan" >
    </div>
    <button type="submit" class="btn btn-success"  >Submit</button>
    <a href="view.php" class="btn btn-primary">Cancel</a>
  </form>
</div>
  </body>
</html>






