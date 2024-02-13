<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php");
    exit;
	}
  ?>
    <title>Penggajian</title>
<h2>Data Karyawan</h2>
<table class="table">
    <thead class="table-dark">
      <tr>
   
        <th class="text-left">No</th>
        <th class="text-left">ID</th>
        <th class="text-left">Nama Pegawai</th>
        <th class="text-left">Jabatan</th>
        <th class="text-left">Jumlah Absen</th> 
        <th class="text-left">Gaji Pokok</th>
        <th class="text-left">Bonus</th> 
        <th class="text-left">Potongan</th> 
        <th class="text-left">Total</th> 
        <th >Action</th>
      </tr>
    </thead>
    <?php
    include 'koneksi.php';
      $sql="select * from data order by id asc";
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
        
        
      </tr>
     
    <?php
    }
    ?>
 
    
  </table>
  <script>
		window.print();
	</script>
</html>