<?php include 'header.php';
$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id ");
$urunsor->execute(array(
  'urun_id' => $_GET['urun_id']
));


$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

if(!isset($_SESSION['userkullanici_mail'])){
  Header("Location:login.php?durum=login");}
?>
<br>
<br>
<br>
<div class="container-fluid ">
  <div class="row ">
    <div class="col-md-12">
      <form method="post" action="admin/netting/kitapekle.php" enctype="multipart/form-data">
      
      <div class="row">
        <div class="col-md-3">
          <center><h4>Book Cover</h4></center>
          <hr>
          <div class="bookbox">
            <img   class="img-fluid" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="">
          </div>
          <br>
          <hr>
        </div>
        <div class="col-md-9">

        <div class="form-group">
          <input placeholder="Book Name" value="<?php  echo $uruncek['urun_ad'] ?>" class="myform" type="text" name="urun_ad">
        </div>

        <br>
        <div class="form-group">
          <label for="">Overview</label>
          <textarea class="ckeditor" id="editor1" name="urun_detay"><?php  echo $uruncek['urun_detay'] ?></textarea>
        </div>

        <script type="text/javascript">
          CKEDITOR.replace('editor1',

            {

              filebrowserBrowseUrl: 'ckfinder/ckfinder.html',

              filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',

              filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',

              filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

              filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

              filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

              forcePasteAsPlainText: true

            }

          );
        </script>
        <br>  
        
            <input name="urun_id" value="<?php echo $uruncek['urun_id'] ?>" type="hidden">

        <div class="form-group">
            <label >Category</label>
            <select class="form-control" name="kategori_id" id="">
             
            <?php
            
            $kategorisor=$db->prepare("SELECT * from kategori order by kategori_id DESC ");
            $kategorisor->execute();

            while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { 
            ?>
            <option <?php if($kategoricek['kategori_id'] == $uruncek['kategori_id']){ echo "selected";} ?> value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>
            <?php } ?>
          
          </select>
        </div>

        <div class="form-group">
            <label >Keywords</label>
          <input placeholder="Keywords" value="<?php  echo $uruncek['urun_keyword'] ?>" class="form-control" type="text" name="urun_keyword">
        </div>

        <div class="form-group">
            <label >Author</label>
          <input placeholder="Author" value="<?php  echo $uruncek['urun_author'] ?>" class="form-control" type="text" name="urun_author">
        </div>

        <div class="row d-flex justify content-center">
          <div class="col-md-4">
            <center><button style="width:100%" class="btn btn-dark" name="kitapadduzenle" type="submit">Create new book</button></center>
          </div>
        </div>
        </div>
      </div>

    </form>
    </div>
  </div>
</div>
</div>



<?php include 'footer.php' ?>