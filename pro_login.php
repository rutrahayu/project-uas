<?php
if($_POST){
	$email=$_POST['email'];
	$password=$_POST['password'];
	 if(empty($email)) {
		echo "<script>alert('Email tidak boleh kosong');location.href='login.php';</script>";
	} elseif(empty($password)){
		echo "<script>alert('Password tidak boleh kosong');location.href='login.php';</script>";
	} else {
		include "koneksi.php";
		$insert=mysqli_query($connection,"insert into login (email, password) value ('".$email."','".$password."')");
		if($insert){
			echo"<script>alert('Sukses untuk Login');location.href='index.php';</script>";
		} else {
			echo "<script>alert('Gagal untuk Login');location.href='login.php';</script>";
			
		}
	}
}
?>