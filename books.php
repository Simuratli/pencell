<?php 
include 'header.php';


if(!isset($_SESSION['userkullanici_mail'])){
    Header("Location:login.php?durum=login");}


?>
<br>
<br>

    <div class="container-fluid">
      <div class="row">
               <div class="row">
            <div class="col-md-12">
                <h1 class="d-flex justify-content-center">Your Books</h1>
                <br>
            </div>
            <!--Book 1-->
            <?php 
            
            $urunsor=$db->prepare("SELECT * FROM urun where kullanici_id=:kullanici_id");
			$urunsor->execute(array(
				'kullanici_id' => $_SESSION['userkullanici_id']
			));

			
			while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
            
            ?>
            <div class="col-md-2 col-xs-12">
                <div class="card">
                    <div class="card-img">
                        <img style="min-height: 200px;" class="img-fluid p-2" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="">
                    </div>
                    <br>
                    <br>
                    
                    <div align='center'>
                        <a href="bookdetail.php?urun_id=<?php echo $uruncek["urun_id"]; ?>" class="btn btn-outline-info btn-sm">Edit</a>
                        <?php
                      
                      if($uruncek['urun_durum']==1){ ?>
                            <a href='admin/netting/adminislem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_one=0&urun_durum=ok'  class='btn  btn-sm btn-outline-danger' >Unpublish</a>
                        <?php }else  { ?>
                            <a class='btn btn-sm  btn-success' href='admin/netting/adminislem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_one=1&urun_durum=ok'>Publish</a>
                      <?php  } ?>
                        <a  onclick="return confirm('Are you sure deleting this book?')" href="admin/netting/adminislem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                    <br>
                        <div class="card-footer">
                        <p><i class="fa fa-heart-o" aria-hidden="true"></i><span style="position:relative;left:5px; top:-2px;">21312</span> </p>
                        </div>
                </div>
            </div>

            <?php } ?>
            <!--Book 1 edn-->



        </div>
      </div>
    </div>
   
   <?php 
include 'footer.php';
?>

