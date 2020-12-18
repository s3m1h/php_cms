<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ANA SAYFA
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
	<script type="text/javascript">
			function siluyari(){
				var kabul = confirm("bu kaydı silmek istiyor musunuz");
				if(kabul){
					return true;
				}
				else{
					return false;
				}
			}
		</script>

	<?php 
	//require_once "../sistem/ayar.php";

	// Kullanici oturumu yoksa login olmalısınız mesajıjnı versin ve yönlendirsin
		if ($_SESSION["kull_adi"] ==""){ 
			echo "<font color='red'> <p> Login olmalısınız</font>";
			header("Refresh:3; url=index.php",true,303);
			
		
	}// Uye yetkisi yazar veya okur ise Yetkiniz yok mesajını versin ve yönlendirsin
		else if($_SESSION['uye_yetki'] == 3 or $_SESSION['uye_yetki'] == 4){
			echo "<font color='red'> <p> Yetkiniz yok</font>";
			header("Refresh:3; url=yonetici.php",true,303);
		}
		else{
			
			?>
		<?php 
			
			$uyeler = mysqli_query($baglan,"SELECT * FROM uyeler");
			$d_sorgu = mysqli_affected_rows($baglan);	
			
			if($_POST){
				
				$arama = $_POST["ara"];
				$hangialan = $_POST["hangialanagore"];
				
				####### Filtrelemek
				$uyeler = mysqli_query($baglan,"SELECT * FROM uyeler WHERE $hangialan=$arama LIKE '$ara%'");
				$d_sorgu = mysqli_affected_rows($baglan);
			}
			
			
		?>
	
		<h3> HOşgeldin</h3>
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<form method="post">

              <div class="box-tools" style=" " >
				<h3 class="box-title">Sistemde <b><?php echo ''.$d_sorgu ?> </b> kullanici var</h3>
				<div class="input-group input-group-sm " style="width: 30%; float:right;">
				
					<input type="text" name="ara" class="form-control pull-left" placeholder="Search">
					<div class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
					</div>
				</div>
				<select class= "pull-right" name="hangialanagore" style="width:10%; margin-left:2rem;">
					<option value="kull_adi">Kullanici Adi</option>
					<option value="uye_mail">E-posta</option>
				</select>
              </div>
			  </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">

                <tr>
					<th>Uye ID </th>
					<th> Kullanıcı Adı </th>
					<th> Uye Eposta </th>
					<th> Uye Durumu </th>
					<th> Uye Yetki </th>
					<th> Uye Zamanı </th>
					<th> İşlemler </th>

                </tr>
				<?php while($sorgu_array = mysqli_fetch_array($uyeler)){ ?>
	
				<tr align="">
					<td><?php echo $sorgu_array["id"];?></td>
					<td><?php echo $sorgu_array["kull_adi"];?></td>
					<td><?php echo $sorgu_array["uye_mail"];?></td>
					
					<td>
					<!-- 
					label label-success
					label label-warning
					label label-primary
					label label-danger
					-->
					<?php //############# Uye durumu bilgisi
						if($sorgu_array["uye_durum"] == 1) { echo "<font class='label label-success' > <b> Aktif</font>";} 
						else{echo "<font class='label label-danger'> <b> Aktif Değil</font>";}?>	
					</td>

					<td>
					<?php //############# Uye yetki bilgisi
						if($sorgu_array["uye_yetki"] == 1){ echo "<font class='label label-danger'> <b> Yönetici</font>";}
						else if($sorgu_array["uye_yetki"] == 2){ echo "<font class='label label-warning'> <b> Editör</font>";}
						else if($sorgu_array["uye_yetki"] == 3){ echo "<font class='label label-primary'> <b> Yazar</font>";}
						else if($sorgu_array["uye_yetki"] == 0){ echo "<font class='label label-success'> <b> Kurucu</font>";}
						else { echo "<font class='label label-info'> <b> Okur</font>";}
					?></td>
					
					<td><?php echo $sorgu_array["kayit_tarih"];?></td>
					<td>
		
						<a 
						
						href="yonetici.php?do=uyeduzenle&uyeid=<?php echo $sorgu_array["id"];?>&uyeadi=<?php echo $sorgu_array["kull_adi"];?>">
							<i style="
								color:#f5f6fa;
								font-size:25px;
								background-color:#c23616;
								padding:.6rem;
								" 
								class="fa fa-pencil "></i>
						</a>
						
						
						<a
						style="margin-left:10px;" 
						onClick="return siluyari();" 
						href="yonetici.php?do=uyesil&uyeid=<?php echo $sorgu_array["id"];?>&uyeadi=<?php echo $sorgu_array["kull_adi"];?>&uyeyetki=<?php echo $sorgu_array["uye_yetki"];?>">
							<i style="
								color: #f5f6fa; 
								font-size:25px;
								background-color:#0652DD;
								padding:.6rem;
								" 
								class="fa fa-trash "></i>
						</a>
	
					</td>
				</tr>
				
				
				<?php }?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
	<?php }?>