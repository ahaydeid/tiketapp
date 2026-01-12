<?php
include "../../conf/conn.php";
if($_POST)
{
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$akses = $_POST['akses'];

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("INSERT INTO users(username, nama, pass, akses) VALUES (?, ?, MD5(?), ?)");
$stmt->bind_param("ssss", $username, $nama, $password, $akses);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Data Berhasil Ditambahkan !!!");
    window.location.href="../../index.php?page=data_user"</script>';
}
$stmt->close();
}