<?php
include "../../conf/conn.php";
if($_POST)
{
$kodekategori = $_POST['kodekategori'];
$kategori = $_POST['kategori'];

$query = ("delete from kategori where kodekategori = '".$kodekategori ."'");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_kategori"</script>';
}
}