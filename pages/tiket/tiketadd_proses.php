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


// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("INSERT INTO tiket(notiket, tanggal, judul, deskripsi, kodekategori, username, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $notiket, $tanggal, $judul, $deskripsi, $kodekategori, $username, $status);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Data Berhasil Ditambahkan !!!");
    window.location.href="../../index.php?page=datatiket_users"</script>';
}
$stmt->close();
}