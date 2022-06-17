<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include "../../conf/conn.php";
if($_POST)
{

$tanggalhariini = date('Y-m-d H:i:s');
$users = $_SESSION['username'];
$notiket = $_POST['notiket'];
$tanggal = $tanggalhariini;
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$kodekategori = $_POST['kodekategori'];
$username = $users;
$status = 'Open';


$query = ("INSERT INTO tiket(notiket,tanggal,judul,deskripsi,kodekategori,username,status)
                    VALUES ('".$notiket."','".$tanggal."','".$judul."','".$deskripsi."','".$kodekategori."','".$username."','".$status."')");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=datatiket_users"</script>';
}
}