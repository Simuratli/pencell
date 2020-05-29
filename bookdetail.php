<?php include "header.php";

$urunsor=$db->prepare("SELECT * FROM urun where kullanici_id =:kullanici_id and urun_id=:urun_id order by urun_id DESC");
$urunsor->execute(array(
  'urun_id' => $_GET['urun_id'],
  'kullanici_id' => $_SESSION['userkullanici_id']
));



$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['userkullanici_mail'])){
  Header("Location:login.php?durum=login");}
?>
<br>
<br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
         



        <form  method="post" action="admin/netting/kitapekle.php" enctype="multipart/form-data">
            <div class="form-group">
              <label>Current cover</label>
              <div class="box">
                <img class="img-fluid" src="<?php echo $uruncek['urunfoto_resimyol'] ?>">
              </div>
            </div>
            <input name="eski_yol" value="<?php echo $uruncek['urunfoto_resimyol'] ?>" type="hidden">
            <input name="urun_id" value="<?php echo $uruncek['urun_id']?>" type="hidden">
            <div class="form-group">
              <label>Add new cover</label>
              <input accept="image/*" class="form-control" type="file" name="urunfoto_resimyol" enctype="multipart/form-data">
            </div>


            <div class="form-group">
             <center>
               <button name="updatebookcover"class="btn btn-info"> UPDATE</button>
             <a href="editbookname.php?urun_id=<?php echo $uruncek["urun_id"]; ?>" class="btn btn-outline-dark"> EDIT NAME AND OVERVIEW</a>
            </center>
             <br>
            </div>
         
          </form>





        </div>
        <div class="col-md-8">
          <br>
        <div class="col-md-12 col-xs-12">
          <a style="width:100%" class="btn btn-outline-success" href="addchapter.php?urun_id=<?php echo $uruncek['urun_id'] ?>">ADD NEW CHAPTER</a>
        </div>
          <div class="p-4">
            <div class="list-group">
              <a  class="list-group-item list-group-item-action active">
                <h1><?php echo $uruncek['urun_ad'] ?></h1>
              </a>
             
             <?php  
                 $chaptersor=$db->prepare("SELECT * from chapter where urun_id=:urun_id ");
                 $chaptersor->execute(array(
                   'urun_id'=> $_GET['urun_id']
                 ));
                 while ($chaptercek=$chaptersor->fetch(PDO::FETCH_ASSOC)) {  ?>

              <a href="editchapter.php?chapter_id=<?php echo $chaptercek["chapter_id"]; ?>" class="list-group-item list-group-item-action d-flex justify-content-between"><h4><?php echo $chaptercek['chapter_ad'] ?></h4>
                <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
              </a>
             
                 <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include "footer.php" ?>