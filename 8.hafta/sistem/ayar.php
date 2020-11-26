<?php

	# SESSION START
	session_start();
	error_reporting(0);
	# baglantı degişkenleri
	$host ="localhost";
	$user ="root";
	$pass ="";
	$db ="my_database";
	
	# MYSQL baglantısı
	$baglan = mysqli_connect($host,$user,$pass,$db) or die(mysqli_Error());
	
	# ayarlar tablosundan herşeyi seç
	$query = mysqli_query($baglan,"select * from ayarlar");
	
	# ayarlar tablosundaki verileri dizi şeklinte satir değişkenine aktardı
	$satir = mysqli_fetch_array($query);
	
	
	# gelen karakterleri utf-8 ile getir
	mysqli_set_charset($baglan,"UTF-8");	
	
?>