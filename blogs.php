<?php 
include 'header.php';

if(!isset($_SESSION['userkullanici_mail'])){
    Header("Location:login.php?durum=login");}


?> 	

<br>
<br>
<div class="container-fluid">
  <div class="row">
    
            <div class="col-md-12">
                <h1 class="d-flex justify-content-center">Your BLOGS</h1>
                <br><br>
            </div>
            <?php 
            
            $blogsor=$db->prepare("SELECT * FROM blog where kullanici_id =:kullanici_id order by blog_id DESC");
			$blogsor->execute(array(
				'kullanici_id' => $_SESSION['userkullanici_id']
			));

		
			
			while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC)) {

            ?>
            



            <div class="col-md-3">
                <div class="card">
                    <div class="card-img">
                        <img style="min-height:150px" class="img-fluid card-img" src="<?php echo $blogcek['blogfoto_resimyol'] ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-bold"><?php echo $blogcek['blog_ad'] ?></h5>
                        <h5><?php echo $kullanicicek['kullanici_ad'] ?></h5>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                      <a  class="btn   btn-outline-info" href="editblog.php?blog_id=<?php echo $blogcek["blog_id"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <?php
                      
                      if($blogcek['blog_durum']==1){ ?>
                            <a href='admin/netting/adminislem.php?blog_id=<?php echo $blogcek['blog_id'] ?>&blog_one=0&blog_durum=ok'  class='btn  btn-outline-danger' >Unpublish</a>
                        <?php }else  { ?>
                            <a  class='btn   btn-success' href='admin/netting/adminislem.php?blog_id=<?php echo $blogcek['blog_id'] ?>&blog_one=1&blog_durum=ok'>Publish</a>
                      <?php  } ?>
                      
                      <a  class='btn   btn-outline-danger' href='admin/netting/adminislem.php?blog_id=<?php echo $blogcek['blog_id']; ?>&blogsil=ok'><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <?php } ?>




        
  </div>
</div>




<?php 
include 'footer.php'

?> 	