

<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ÇIKIŞ Yap Sayfası
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
		<h3> Çıkış Yapıldı</h3>
		  <?php 
			
			// oturumu sonlandırmak
			
			session_destroy();
			
			#header("Refresh:1;",true);
			header("Refresh:2; url=/login",true,303);
			echo "deneme";
			

		?>

		
	<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Başarılı bir şekilde çıkış yaptınız...
              </div>
	
    </section>
    <!-- /.content -->