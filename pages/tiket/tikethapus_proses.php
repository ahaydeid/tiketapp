<?php
session_start();
include "../../conf/conn.php";
if($_POST)
{

$tanggalhariini = date ('Y-m-d H:i:s');

$notiket = $_POST['notiket'];
$status = $_POST['status'];

$query = ("delete from tiket where notiket = '".$notiket ."'");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_tiket"</script>';
}
}