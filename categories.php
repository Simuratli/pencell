<?php

include 'header.php';

?>

<br><br>
<br><br>

<section class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-9">
      <div class="row">
        <?php

        $kategorisor = $db->prepare("SELECT * from kategori ");
        $kategorisor->execute();
        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
          ?>
          <div class="col-md-4">
            <p class="boxcat"><a href="category-<?=seo($kategoricek['kategori_ad']).'-'.$kategoricek['kategori_id']?>"><?php echo $kategoricek['kategori_ad'] ?> <span>
              
            (
              <?php
            
            $urunsay=$db->prepare("SELECT COUNT(kategori_id) as say FROM urun where kategori_id=:id");
            $urunsay->execute(array(
                'id'=> $kategoricek['kategori_id']
            ));
            $saycek = $urunsay->fetch(PDO::FETCH_ASSOC);
            $blogsay=$db->prepare("SELECT COUNT(kategori_id) as say2 FROM blog where kategori_id=:id");
            $blogsay->execute(array(
                'id'=> $kategoricek['kategori_id']
            ));
            $blogsaycek = $blogsay->fetch(PDO::FETCH_ASSOC);
           
            $pdfsay=$db->prepare("SELECT COUNT(kategori_id) as say3 FROM pdf where kategori_id=:id");
            $pdfsay->execute(array(
                'id'=> $kategoricek['kategori_id']
            ));
            $pdfsaycek = $pdfsay->fetch(PDO::FETCH_ASSOC);

            echo $saycek['say']+$blogsaycek['say2']+$pdfsaycek['say3']
            ?>

            )

            </span></a></p>
          </div>

        <?php } ?>
      </div>
    </div>
  </div>
  </div>

</section>

<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<?php

include 'footer.php';
?>