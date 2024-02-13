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
          <a class="nav-link active" aria-current="page" href="view.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="tambah.php">Tambah Data</a>
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
<style type="text/css">
    .link{
    color:#000000; 
     text-decoration:none;
    }
</style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container mt-3">
  <h2>Data Gaji Karyawan</h2><br>
  <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="form-inline">
  <?php 
if(isset($_POST['cari'])){
	$cari = $_POST['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
    <input  type="search" placeholder="Cari data" aria-label="Search" name="cari">
    <button  type="submit" value="cari" value="<?php echo $cari;?>">Search</button>
  </form><br>
  <button type="button" class="btn btn-outline-secondary"><a href="tambah.php" class="link">Tambah Data</a></button><br><br>
  <table class="table">
    <thead class="table-dark">
      <tr>
   
        <th class="text-left">No</th>
        <th class="text-left">ID</th>
        <th class="text-left">Nama Pegawai</th>
        <th class="text-left">Jabatan</th>
        <th class="text-left">Jumlah Absen</th> 
        <th class="text-left">Gaji Pokok</th>
        <th class="text-left">Jenis Bonus</th>
        <th class="text-left">Bonus</th> 
        <th class="text-left">Potongan</th> 
        <th class="text-left">Total</th> 
        <th >Action</th>
      </tr>
    </thead>
    <?php
    include 'koneksi.php';
    if (isset($_POST['cari'])) {
      $cari=trim($_POST['cari']);
      $sql="select * from data where kode like '%".$cari."%' or namapegawai like '%".$cari."%'order by id asc";//or jabatan like '%".$cari."%' or gaji like '%".$cari."%' or bonus like '%".$cari."%' or bonus1 like '%".$cari."%' order by id asc";

  }else {
      $sql="select * from data order by id asc";
  }
    $no=1;
    $data = mysqli_query($koneksi,$sql);
    while ($d = mysqli_fetch_array($data)){
        ?>
    <tbody>
      <tr>
      <td class="text-center"><?php echo $no++; ?></td>
        <td class="text-left"><?php echo $d['kode']; ?></td>
        <td class="text-left"><?php echo $d['namapegawai']; ?></td>
        <td class="text-left"><?php echo $d['jabatan']; ?></td>
        <td class="text-left"><?php echo $d['absen']; ?></td>
        <td class="text-left"><?php $total=$d['gaji'];echo "Rp " . number_format($total, 0, ',', '.') ;  ?></td>
        <td class="text-left"><?php echo $d['jenis_bonus']; ?></td>
        <td class="text-left"><?php $total=$d['bonus'];echo "Rp " . number_format($total, 0, ',', '.') ;  ?></td>
        <td class="text-left"><?php $total=$d['potongan'];echo "Rp " . number_format($total, 0, ',', '.') ;  ?></td>
        <td class="text-left"><?php $total=$d['total'];echo "Rp " . number_format($total, 0, ',', '.') ;  ?></td>
        <td>
        <button type="button" class="btn btn-success"><a class="link" href="update.php?id=<?php echo $d['id']; ?>">Update</a></button>
				<button type="button" class="btn btn-danger"><a class="link" href="hapus.php?id=<?php echo $d['id']; ?>">Delete</a></button>
		</td>
      </tr>
     
    <?php
    }
    ?>
  </table>
 <a href="cetak.php" class="btn btn-primary">Cetak Data</a>
 <a href="hapus_all.php" class="btn btn-primary">Delete All</a>

</div>
</body>
</html>