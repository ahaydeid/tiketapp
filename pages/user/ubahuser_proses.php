<?php
include "../../conf/conn.php";
if($_POST)
{
$username = $_POST['username'];
$nama = $_POST['nama']; 
$pass = $_POST['pass'];
$akses = $_POST['akses'];

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("UPDATE users SET nama = ?, akses = ? WHERE username = ?");
$stmt->bind_param("sss", $nama, $akses, $username);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Data Berhasil Diubah !!!");
    window.location.href="../../index.php?page=data_user"</script>';
}
$stmt->close();
}