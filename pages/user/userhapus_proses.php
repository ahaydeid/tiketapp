<?php
include "../../conf/conn.php";
if($_POST)
{
$username = $_POST['username'];
$nama = $_POST['nama'];
$akses = $_POST['akses'];

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("DELETE FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Data Berhasil Dihapus !!!");
    window.location.href="../../index.php?page=data_user"</script>';
}
$stmt->close();
}