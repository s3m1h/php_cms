<?php 
require_once "../sistem/ayar.php";

if ($_SESSION["kull_adi"] ==""){
	echo "hayırdır emmi ?";
	header("location: index.php");
}else{


?>


<html>

<body>
	<h1> Yönetim sayfasi </h1>
	
<p> <b> Hoş Geldin	<?php echo $_SESSION["kull_adi"];?>
</body>
</html>

<?php } ?>

