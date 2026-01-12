<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include "../../conf/conn.php";
if($_POST)
{

$tanggalhariini = date('Y-m-d H:i:s');

$notiket = $_POST['notiket'];
$status = $_POST['status'];


// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("UPDATE tiket SET status = ? WHERE notiket = ?");
$stmt->bind_param("ss", $status, $notiket);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Update status sukses !!!");
    window.location.href="../../index.php?page=data_tiket"</script>';
}
$stmt->close();
}
?>