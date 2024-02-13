<?php
// Load file koneksi.php

include "koneksi.php";
// Ambil Data yang Dikirim dari Form
$username=$_POST['username'];
$password=$_POST['password'];

mysqli_query($koneksi,"insert into admin values('$username',md5('$password'))");
header("location:index.php?pesan=true");

?>