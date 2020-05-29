<?php include 'header.php';

if(!isset($_SESSION['userkullanici_mail'])){
  Header("Location:login.php?durum=login");}
  ?>


<div class="container-fluid p-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <form method="post" action="admin/netting/adminislem.php" enctype="multipart/form-data">
      


        <div class="form-group">
          <input placeholder="  ADD TITLE" class="myform" type="text" name="blog_ad">
        </div>

        <br>
        <div class="form-group">
        <div id="editor">
      <textarea id='edit' name='blog_detay' style="margin-top: 30px;">
      
      </textarea>
          
<!-- bura textarea-->
        </div>
        </div>

<!-- bura link-->



        <br>  
        <br>  
    <div class="form-group">
            <label >Picture</label>
          <input placeholder="ADD TITLE" class="form-control" type="file" name="blogfoto_resimyol">
        </div>

        <div class="form-group">
            <label >Category</label>
            <select class="form-control" name="kategori_id" id="">
             
            <?php
            
            $kategorisor=$db->prepare("SELECT * from kategori order by kategori_id DESC ");
            $kategorisor->execute();

            while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { 
            ?>
            <option value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>
            <?php } ?>
          
          </select>
        </div>

        <div class="form-group">
            <label >Keywords</label>
          <input placeholder="Keywords" class="form-control" type="text" name="blog_keyword">
        </div>

        <div class="form-group">
            <label >Author</label>
          <input placeholder="Author" class="form-control" type="text" name="blog_author">
        </div>


        <div class="row d-flex justify content-center">
          <div class="col-md-4">
            <center><button style="width:100%" class="btn btn-dark" name="blogekle" type="submit">Publish</button></center>
          </div>
        </div>
    </div>

    </form>
  </div>
</div>
</div>



<?php include 'footer.php' ?>