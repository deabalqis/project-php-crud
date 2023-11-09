<?php 
// koneksi database
include_once 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];
$gambar = $_POST['gambar'];
 
// update data ke database
mysqli_query($koneksi,"UPDATE tbl_mahasiswa SET nama='$nama', nim='$nim', email='$email', prodi='$prodi', gambar='$gambar' WHERE id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>