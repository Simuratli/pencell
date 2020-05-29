<style>
  div#editor {
    width: 100% !important;
    margin: auto !important;
    text-align: left !important;
  }
</style>
<?php include 'header.php';

$blogsor = $db->prepare("SELECT * FROM blog where kullanici_id =:kullanici_id and blog_id=:blog_id order by blog_id DESC");
$blogsor->execute(array(
  'blog_id' => $_GET['blog_id'],
  'kullanici_id' => $_SESSION['userkullanici_id']
));



$blogcek = $blogsor->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['userkullanici_mail'])) {
  Header("Location:login.php?durum=login");
}
?>

<div class="container-fluid p-5">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <form method="post" action="admin/netting/adminislem.php" enctype="multipart/form-data">

        <div style="width:50%" class="form-group">
          <label>Picture</label>
          <img class="img-fluid" src="<?php echo $blogcek['blogfoto_resimyol'] ?>" alt="">
        </div>
        <br>
        <div class="form-group">
          <label>Picture</label>
          <input placeholder="" class="form-control" type="file" name="blogfoto_resimyol">
        </div>
        <br>

        <div class="form-group">
          <input placeholder="  ADD TITLE" value="<?php echo $blogcek['blog_ad'] ?>" class="myform" type="text" name="blog_ad">
        </div>

        <br>
        <div class="form-group">

          <div id="editor">
            <textarea id='edit' name='blog_detay' style="margin-top: 30px;">
                <?php echo $blogcek['blog_detay'] ?>
            </textarea>
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
              <option <?php if ($kategoricek['kategori_id'] == $blogcek['kategori_id']) {
                          echo "selected";
                        } ?> value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>
            <?php } ?>

          </select>
        </div>

        <div class="form-group">
          <label>Keywords</label>
          <input placeholder="Keywords" value="<?php echo $blogcek['blog_keyword'] ?>" class="form-control" type="text" name="blog_keyword">
        </div>

        <div class="form-group">
          <label>Author</label>
          <input value="<?php echo $blogcek['blog_author'] ?>" placeholder="Author" class="form-control" type="text" name="blog_author">
        </div>

        <input name="blog_id" value="<?php echo $blogcek['blog_id'] ?>" type="hidden">
        <input name="eski_yol" value="<?php echo $blogcek['blogfoto_resimyol'] ?>" type="hidden">
        <div class="row d-flex justify content-center">
          <div class="col-md-4">
            <center><button style="width:100%" class="btn btn-dark" name="blogduzenle" type="submit">Edit</button></center>
          </div>
        </div>
    </div>

    </form>
  </div>
</div>
</div>



<?php include 'footer.php' ?>