<?php
session_start();
include "../../conf/conn.php";
if($_POST)
{

$tanggalhariini = date ('Y-m-d H:i:s');

$notiket = $_POST['notiket'];
$status = $_POST['status'];

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("DELETE FROM tiket WHERE notiket = ?");
$stmt->bind_param("s", $notiket);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Data Berhasil Dihapus !!!");
    window.location.href="../../index.php?page=data_tiket"</script>';
}
$stmt->close();
}