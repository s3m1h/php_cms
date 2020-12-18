<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Site Ayarları
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
<?php 

if($_SESSION['uye_yetki'] == 1 or $_SESSION['uye_yetki'] == 2){
	
	$sql = "SELECT * FROM ayarlar";
	$sql_result = mysqli_query($baglan, $sql);
	$sitegelen = mysqli_fetch_array($sql_result);
	
	if($_POST){
		
		$site_baslik = $_POST["site_baslik"];
		$site_anahtar_kelimeler = $_POST["site_anahtarkelimeler"];
		$site_aciklama = $_POST["site_aciklama"];
		$site_durum = $_POST["site_durum"];
		$site_tema = $_POST["site_tema"];
		$site_iletisim = $_POST["site_telno"];
		$site_email = $_POST["site_eposta"];
		$site_facebook = $_POST["site_facebook"];
		$site_twitter = $_POST["site_twitter"];
		$site_linkedin = $_POST["site_linkedin"];
		
		$sql2 = "
		UPDATE ayarlar SET 
		site_baslik='$site_baslik',
		site_anahtarkelimeler='$site_anahtar_kelimeler',
		site_aciklama='$site_aciklama',
		site_durum='$site_durum',
		site_tema='$site_tema',
		site_iletisimno='$site_iletisim',
		site_eposta='$site_email',
		site_facebook='$site_facebook',
		site_twitter='$site_twitter',
		site_linkedin='$site_linkedin'
		";
		$sql2_update = mysqli_query($baglan, $sql2);
		
		if($sql2_update){ 
						$aciklama = "site ayarları güncellendi";
						$yapilanislem = "kayıt güncelleme";
						$sistemkayitquery = "
									INSERT INTO ayarlar SET 
									aciklama='$aciklama',
									yapilanislem='$yapilanislem',
									yapan='$kadi'
									";
									$sistemkayit = mysqli_query($baglan,$sistemkayitquery);
						?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
							<h4><i class="icon fa fa-check"></i> Alert!</h4>
							Başarılı bir şekilde Güncellendi
						</div>
						<?php
						//echo "<font color='green'> Başarılı bir şekilde güncellendi</font>";
						header('Refresh:1;url = http://localhost/login/yonetici.php?do=siteayarlari',true);
					}
					else{echo "<font color='red'>Güncelleme Başarısız...</font>";}
	}
	
?>

    <div class="box box-info bg-info">
	
        <div class="box-header with-border">
            <h3 class="box-title">Hoşgeldiniz...</h3>
        </div>
        <div class="box-body">
			<form method="POST">
				<div class="input-group">
					<span class="input-group-addon"><b>Site Başlığı</b></span>
					<input name = "site_baslik" value="<?php echo $sitegelen["site_baslik"]; ?>" type="text" class="form-control" placeholder="birşeyler yazın..">
				</div>
				<br>


				<div class="input-group">
					<span class="input-group-addon"><b>Site Anahtar kelimeler</b></span>
					<input name= "site_anahtarkelimeler" value="<?php echo $sitegelen["site_anahtarkelimeler"]; ?>" type="text" class="form-control">
					
				</div>
				<br>
				<div class="input-group">
					<span class="input-group-addon"><b>Site Açıklaması</b></span>
					<input name = "site_aciklama" value="<?php echo $sitegelen["site_aciklama"]; ?>" type="text" class="form-control">
					
				</div>
				<br>
				  <span class="input-group-addon"><b>Site Durumu</b></span>
				<select style= "text-align-last:center;" name="site_durum" class="form-control form-control-sm">
						<option value="0" <?php if($sitegelen["site_durum"] ==0)echo "selected"?>>Kapalı</option>
						<option value ="1" <?php if($sitegelen["site_durum"] ==1)echo "selected"?>>Açık</option>
				</select>
				<br>
				<span class="input-group-addon"><b>Site Tema</b></span>
				<select style= "text-align-last:center;" name="site_tema" class="form-control form-control-sm">
						<option value ="0" <?php if($sitegelen["site_tema"] =="0")echo "selected"?>>Default</option>
						<option value ="1" <?php if($sitegelen["site_tema"] =="1")echo "selected"?>>Mavi</option>
						<option value ="2" <?php if($sitegelen["site_tema"] =="2")echo "selected"?>>Yeşil</option>
						<option value ="3" <?php if($sitegelen["site_tema"] =="3")echo "selected"?>>Kırmızı</option>
						<option value ="4" <?php if($sitegelen["site_tema"] =="4")echo "selected"?>>Sarı</option>
				</select>
				<br>
					
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-phone"></i></span>
					<input name="site_telno" value="<?php echo $sitegelen["site_iletisimno"]; ?>" type="text" class="form-control">
					
				</div>
				<br>
				<div class="input-group">
				<span class="input-group-addon"><b><i class="fa fa-envelope"></i></b></span>
				<input name="site_eposta" value="<?php echo $sitegelen["site_eposta"]; ?>" type="text" class="form-control">
					
				  </div>
				  <br>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-facebook"></i></span>
					<input name= "site_facebook" value="<?php echo $sitegelen["site_facebook"]; ?>" type="text" class="form-control">
					
				  </div>
				  <br>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-twitter"></i></span>
					<input name="site_twitter" value="<?php echo $sitegelen["site_twitter"]; ?>" type="text" class="form-control">
					
				  </div>
				  <br>
				  <div class="input-group">
					<span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
					<input name="site_linkedin" value="<?php echo $sitegelen["site_linkedin"]; ?>" type="text" class="form-control">
					
				  </div>
				  <br>
				  <div class="input-group input-group-sm">
						<span class="input-group-btn">
						  <button type="submit" class="btn btn-info btn-flat">Değişiklikleri Kaydet</button>
						</span>
				  </div>
			  
              <!-- /input-group -->
			  </form>
			  <br>
			  
        </div>
            <!-- /.box-body -->
    </div>
<?php
}else{
	echo "bu sayfada işlem yapmaya yetkiniz yok";
	header("Refresh:3; url=yonetici.php",true,303);
} ?>
    </section>
    <!-- /.content -->