<?php
include "../../conf/conn.php";
if($_POST)
{
$kodekategori = $_POST['kodekategori'];
$kategori = $_POST['kategori'];

$query = ("INSERT INTO kategori(kodekategori,kategori)
                    VALUES ('".$kodekategori."','".$kategori."')");
if(!mysqli_query($mysqli,$query)){
die(mysqli_error($mysqli));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_kategori"</script>';
}
}