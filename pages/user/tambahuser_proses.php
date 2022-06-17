<?php
include "../../conf/conn.php";
if($_POST)
{
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$akses = $_POST['akses'];

$query = ("INSERT INTO users(username,nama,pass,akses)
                    VALUES ('".$username."','".$nama."',md5('".$password."'),'".$akses."')");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_user"</script>';
}
}