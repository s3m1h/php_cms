



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
	<?php 
	if($_SESSION['uye_yetki'] == 0 || $_SESSION['uye_yetki'] == 1){

	?>
	<?php
	$sqlquery = "SELECT * FROM sistem_kayitlari";
	$kayitlar = mysqli_query($baglan, $sqlquery);
	$sorgudonensatir = mysqli_affected_rows($baglan);
	?>
		<h3> Sistem kayıtları</h3>
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo 'Sistemde <b>'.$sorgudonensatir.'</b> kayıt bulunmaktadır.'?></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
			  
                <tr>
					<th>ID </th>
					<th> Açıklama</th>
					<th> Yapılan İşlem </th>
					<th> Yapan </th>
					<th> Tarih </th>
                </tr>
				<?php while($sorgu_array = mysqli_fetch_array($kayitlar)){ ?>
				<tr align="">
					<td><?php echo $sorgu_array["id"];?></td>
					<td><?php echo $sorgu_array["aciklama"];?></td>
					<td><?php echo $sorgu_array["yapilan_islem"];?></td>
					<td><?php echo $sorgu_array["yapan_kisi"];?></td>
					<td><?php echo $sorgu_array["tarih"];?></td>
				</tr>
				<?php } ?>
				<!--
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>-->
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	<?php }else{ ?>
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Başarılı bir şekilde çıkış yaptınız...
              </div>
		
	<?php header("Refresh:3; url=http://localhost/login/yonetici.php");}?>
    </section>
    <!-- /.content -->
	
	
	