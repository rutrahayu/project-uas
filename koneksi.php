<?php
$connection = mysqli_connect('localhost', 'root','','akademik');

if (!$connection) {
	echo "Gagal Terhubung ke Database";
}
?>