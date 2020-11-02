<?php require_once "../sistem/ayar.php";?>

<?php ?>
<html >
	<head> <title> Kayıt Formu</title></head>
	<style>
	.margin-ust{
		margin-top:3rem;
	}
	.margin-alt{
		margin-bottom:3rem;
	}
	.background1{
		background-image: linear-gradient(black,black,black,.5);
	}
	.bordersıfır{
		border:0px;
	}
	</style>
	<body style='margin:0px;'>
	
	
		<?php 
		
			$random = rand(1,20);
			$random2 = rand(1,20);
			$random_sonuc = $random + $random2;
		
		// #################### POST Verileri başlangıc
			if($_POST){
				
				$kull_adi = $_POST["kullanici_adi"];
				$sifre = md5($_POST["sifre"]);
				$tekrar_sifre = md5($_POST["tsifre"]);
				$eposta = $_POST['eposta'];
				$rol = $_POST['rol'];
				
				// #### Güvenlik 
				$random_sakla = $_POST['random1'];
				$random_sakla2 = $_POST['random2'];
				$random_topla = $_POST['randomtopla'];
				$t_sonuc = $_POST['toplamsonuc'];
				// #### Güvenlik bitiş
				
				
				// ################# kullanici Adi ve E-posta sorgulama
				$varmi = "select * from uyeler where kull_adi='$kull_adi' OR uye_mail='$eposta'";
				$varmisonuc = mysqli_query($baglan,$varmi);
				$gelenvarmi = mysqli_num_rows($varmisonuc);
				
				
				if($kull_adi !="" and $sifre !="" and $tekrar_sifre !="" and $eposta !=""){
				if($t_sonuc == $random_topla){
					if($sifre == $tekrar_sifre){	
						if (!$gelenvarmi){
						$sql="INSERT INTO uyeler SET 
						kull_adi='$kull_adi',
						kull_sifre='$sifre',
						uye_mail='$eposta',
						uye_durum='0',
						uye_yetki='$rol'";
						$sonuc = mysqli_query($baglan,$sql);
							if($sonuc == 1){ // 1 == True
								echo "<font color='green'> <p> Kaydınız Başarıllı</font>";
							}
							else{
								echo "<font color='red'> <p> Kaydınız başarısız</font>";
							}
						}
						else{
							echo "<font color='red'><b>Bu kullanici adi veya e-posta adresi kullanılmaktadır..</b></font>";
						}
					}
					
					else{
						echo "<font color='red'> <p> şifreler uyuşmuyor</font>";
						
					}
				}
				else{
					echo "<font color='red'> <p> Kayıt Doğrulama Başarısız</font>";
					
				}
			}
			}
			else{
				if($_POST){
					
				echo "<font color='red'> <p> Boş alanları doldurunuz</font>";
				}
			}
			// #################### POST Verileri bitiş
			
			
		?>
	
		<!-- https://webgradients.com/ -->
		<div " align="center">
			<div style="
			font-size:20px;
			width:500px;
			height:500px;
			padding:5rem;
			
			">	
			
				<h1 style="width:100px; background: #20bf6b; padding:2.5rem 0rem; border-radius:50%;"> </h1>
				<h1 style="background: #20bf6b; padding:1rem 0rem; border-radius:50%;"> Kayıt Formu </h1>
				<form action="" method="POST">
					<table >
						<tr >
							<td ><b> Kullanici Adi:: </b></td>
							<td><input type="text" name="kullanici_adi" value="<?php if($_POST){ echo $kull_adi;}?>"></input></td>
						</tr>
						<tr>
							<td><b> Şifreniz:: </b></td>
							<td><input  type="password" name="sifre"></input></td>
						</tr>
						<tr>
							<td><b> Tekrar Şifre:: </b></td>
							<td><input  type="password" name="tsifre"></input></td>
						</tr>
						<tr>
							<td><b> E-Posta:: </b></td>
							<td><input  type="email" name="eposta" value="<?php if($_POST) {echo $eposta;}?>"></input></td>
						</tr>
						<tr>
							<td><b> Hangi Rol:: </b></td>
							<td>
								<select  name="rol">
									<option value="1" <?php if($_POST){ if($rol == 1){echo "selected";}} ?>> Site Yöneticisi</option>
									<option value="2" <?php if($_POST){ if($rol == 1){echo "selected";}} ?>> Editör</option>
									<option value="3" <?php if($_POST){ if($rol == 1){echo "selected";}} ?>> Yazar</option>
									<option value="4" <?php if($_POST){ if($rol == 1){echo "selected";}} ?>> Okur</option>
								</select>
							</td>
						</tr>
						<tr>
							<td align="center" colspan="2"><b> <?php echo $random." + ".$random2." ? "; ?> </b>
							<input type="hidden" name="random1" value="<?php echo $random;?>"></input>
							<input type="hidden" name="random2" value="<?php echo $random2;?>"></input>
							<input type="hidden" name="randomtopla" value="<?php echo $random_sonuc;?>"></input>
							
							</td>
							
						</tr>
						<tr>
							<td colspan="2"><input style="width:100%;" type="text" name="toplamsonuc" value=""></input></td>
						</tr>
						<tr>
							
							<td colspan="2"><p align="right">
							<input 
							style = "
							cursor:hand;
							width:100%;
							padding: .5rem 3.7rem; 
							border:0px;
							background: #20bf6b;
							
							"
							type="submit" 
							value="Kayıt ol"></input></td>
						</tr>
					</table>
				</form>
				
			</div>
		</div>
	</body>
</html>

