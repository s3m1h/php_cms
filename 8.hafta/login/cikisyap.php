<?php require_once "../sistem/ayar.php";
		
		// oturumu sonlandırmak
		session_destroy();
		header("Refresh:3; url=/login",true,303);


	?>

<html>

	<body>
		<p><b> <font color = "green">Başarılı bir şekilde çıkış yaptınız...</font></b>
	</body>
</html>