<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
include "../../conf/conn.php";
if($_POST)
{

$tanggalhariini = date('Y-m-d H:i:s');

$notiket = $_POST['notiket'];
$status = $_POST['status'];


$query = ("update tiket set status = '".$status."'where notiket = '".$notiket."'");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Update status sukses !!!");
window.location.href="../../index.php?page=data_tiket"</script>';
}
}
?>