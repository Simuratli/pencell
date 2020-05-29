<?php include 'header.php';

if (!isset($_SESSION['userkullanici_mail'])) {
  Header("Location:login.php?durum=login");
}


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
            <center>
              <h4>Book Cover</h4>
            </center>
            <hr>
            <div class="bookbox">
              <img id="blah" class="img-fluid" src="http://placehold.it/300x450" alt="">
            </div>
            <br>
            <div class="form-group">
              <input onchange="readURL(this);" class="form-group" name="urunfoto_resimyol" type="file">
            </div>
            <hr>
          </div>
          <div class="col-md-9">

            <div class="form-group">
              <input placeholder="Book Name" class="myform" type="text" name="urun_ad">
            </div>

            <br>
            <div class="form-group">
              <label for="">Overview</label>
              <div id="editor">
                <textarea id='edit' name='urun_detay' style="margin-top: 30px;">

      </textarea>

                <!-- bura textarea-->
              </div>
            </div>

            <br>



            <div class="form-group">
              <label>Category</label>
              <select class="form-control" name="kategori_id" id="">

                <?php

                $kategorisor = $db->prepare("SELECT * from kategori order by kategori_id DESC ");
                $kategorisor->execute();

                while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <option value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>
                <?php } ?>

              </select>
            </div>

            <div class="form-group">
              <label>Keywords</label>
              <input placeholder="Keywords" class="form-control" type="text" name="urun_keyword">
            </div>

            <div class="form-group">
              <label>Author</label>
              <input placeholder="Author" class="form-control" type="text" name="urun_author">
            </div>

            <div class="row d-flex justify content-center">
              <div class="col-md-4">
                <center><button style="width:100%" class="btn btn-dark" name="kitapekle" type="submit">Create new book</button></center>
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