<?php
include "../../conf/conn.php";
if($_POST)
{
$kodekategori = $_POST['kodekategori'];
$kategori = $_POST['kategori'];

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("INSERT INTO kategori(kodekategori, kategori) VALUES (?, ?)");
$stmt->bind_param("ss", $kodekategori, $kategori);

if(!$stmt->execute()){
    die($mysqli->error);
}else{
    echo '<script>alert("Data Berhasil Ditambahkan !!!");
    window.location.href="../../index.php?page=data_kategori"</script>';
}
$stmt->close();
}