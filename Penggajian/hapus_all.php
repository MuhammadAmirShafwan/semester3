<?php


include 'koneksi.php';

$id=$_GET['id'];


mysqli_query($koneksi,("DELETE FROM data"));
header("location:view.php");
?>