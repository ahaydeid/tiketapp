<?php
include "../../conf/conn.php";
if($_POST)
{
$username = $_POST['username'];
$nama = $_POST['nama']; 
$pass = $_POST['pass'];
$akses = $_POST['akses'];

$query = ("update users set nama = '".$nama."',
akses = '".$akses."'
where username = '".$username ."'");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_user"</script>';
}
}