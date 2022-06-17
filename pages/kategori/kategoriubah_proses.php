<?php
include "../../conf/conn.php";
if($_POST)
{
$kodekategori = $_POST['kodekategori'];
$kategori = $_POST['kategori'];

$query = ("update kategori set kategori = '".$kategori."' where kodekategori = '".$kodekategori ."'");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_kategori"</script>';
}
}