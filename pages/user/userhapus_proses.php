<?php
include "../../conf/conn.php";
if($_POST)
{
$username = $_POST['username'];
$nama = $_POST['nama'];
$akses = $_POST['akses'];

$query = ("delete from users where username = '".$username  ."'");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_user"</script>';
}
}