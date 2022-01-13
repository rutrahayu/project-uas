<?php 
   include 'koneksi.php';
   if (isset($_GET['nim'])) {
   	$hapus = mysqli_query($connection, "DELETE FROM t_pembayaran where nim='".$_GET['nim']."'");
   	header('location:tampil_data_pembayaran.php');
   }
?>