<?php
include "../../conf/conn.php";
if($_POST)
{
$kodekategori = $_POST['kodekategori'];
$kategori = $_POST['kategori'];

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("DELETE FROM kategori WHERE kodekategori = ?");
$stmt->bind_param("s", $kodekategori);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Data Berhasil Dihapus !!!");
    window.location.href="../../index.php?page=data_kategori"</script>';
}
$stmt->close();
}