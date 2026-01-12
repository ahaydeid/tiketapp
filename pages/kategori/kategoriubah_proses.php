<?php
include "../../conf/conn.php";
if($_POST)
{
$kodekategori = $_POST['kodekategori'];
$kategori = $_POST['kategori'];

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("UPDATE kategori SET kategori = ? WHERE kodekategori = ?");
$stmt->bind_param("ss", $kategori, $kodekategori);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Data Berhasil Diubah !!!");
    window.location.href="../../index.php?page=data_kategori"</script>';
}
$stmt->close();
}