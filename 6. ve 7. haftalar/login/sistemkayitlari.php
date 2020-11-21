<?php require_once "../sistem/ayar.php";

$sqlquery = "SELECT * FROM sistemkayitlari";
$kayitlar = mysqli_query($baglan, $sqlquery);


?>
<a href="http://localhost/login/yonetici.php"> Geri Dön</a>
<table border="1px" align="center">
<tr >
	<th>ID </th>
	<th> Açıklama</th>
	<th> Yapılan İşlem </th>
	<th> Yapan </th>
	<th> Tarih </th>

</tr>
<?php while($sorgu_array = mysqli_fetch_array($kayitlar)){ ?>
<tr align="center">
	<td><?php echo $sorgu_array["id"];?></td>
	<td><?php echo $sorgu_array["aciklama"];?></td>
	<td><?php echo $sorgu_array["yapilanislem"];?></td>
	<td><?php echo $sorgu_array["yapan"];?></td>
	<td><?php echo $sorgu_array["tarih"];?></td>
</tr>
<?php } ?>
</table>
