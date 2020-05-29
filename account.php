<?php
include 'header.php';
if (!isset($_SESSION['userkullanici_mail'])) {
  Header("Location:login.php?durum=login");
}
?>


<div class="container-fluid">
  <div class="row d-flex justify-content-center">
    <div class="col-md-7">
      <center>
        <div class="profpic">
          <img style="z-index: -12" class="img-fluid" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>">
        </div>
      </center>
      <hr>
      <div class="d-flex justify-content-center">
        <h3><?php echo $kullanicicek['kullanici_ad'] ?> <span><a href="useredit" class="btn btn-sm btn-warning"><img width="20px" class="img-fluid" src="img/writing.png" alt=""></a></span></h3>
      </div>
    </div>
  </div>
  <br>
  <hr>
  <br>
  <div class="col-md-12 d-flex justify-content-center">
    <div class="col-md-8">
      <div class="card cardshadow p-3">
        <div class="row">
          <div class="col-md-12">

            <div class="row">
             
           
              <div class="col-md-6">
                <div align="center" class="imgpic">
                  <img width="50px" class="img-fluid" src="img/open-book.png">
                </div>
                <center>
                  <h5><a href="#">BOOKS</a></h5>
                </center>
                <center>
                  <h3>

                    <?php

                    $urunsay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM urun where kullanici_id=:id");
                    $urunsay->execute(array(
                      'id' => $kullanicicek['kullanici_id']
                    ));
                    $saycek = $urunsay->fetch(PDO::FETCH_ASSOC);
                    echo $saycek['say']
                    ?>
                  </h3>
                </center>
              </div>
              <div class="col-md-6">
                <div align="center" class="imgpic">
                  <img width="50px" class="img-fluid" src="img/blogging.png">
                </div>
                <center>
                  <h5><a href="#">BLOGS</a></h5>
                </center>
                <center>
                  <h3>
                    <?php

                    $blogsay = $db->prepare("SELECT COUNT(kullanici_id) as say FROM blog where kullanici_id=:id");
                    $blogsay->execute(array(
                      'id' => $kullanicicek['kullanici_id']
                    ));
                    $saycek = $blogsay->fetch(PDO::FETCH_ASSOC);
                    echo $saycek['say']
                    ?></h3>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>

</div>





<br>
<hr>
<br>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 card p-3 cardshadow">
      <div class="row">
      <div class="col-md-12">
          <center>
            <br>

            <div class="imgpic">
              <img width="30px" class="img-fluid" src="img/open-book.png"> <span>
                <h1>Book</h1>
              </span>
            </div>
          </center>
        </div>
      <div class="col-md-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <?php

                    $urunsor = $db->prepare("SELECT * from urun  where urun_durum=:urun_durum and kullanici_id=:kullanici_id  order by urun_id DESC limit 12 ");
                    $urunsor->execute(array(
                        'urun_durum' => 1,
                        'kullanici_id' => $_SESSION['userkullanici_id']
                    ));
                    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {  ?>



                        <div class="swiper-slide">
                            <div class="boxpic">
                                <a href="book-<?= seo($uruncek["urun_ad"]) . '-' . $uruncek["urun_id"] ?>"> <img class="img-fluid" src="<?php echo $uruncek['urunfoto_resimyol'] ?>"></a>
                            </div>
                            <div class="box">
                                <a href="book-<?= seo($uruncek["urun_ad"]) . '-' . $uruncek["urun_id"] ?>">
                                    <h6><?php echo $uruncek['urun_author'] ?></h6>
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <!-- Add Pagination -->

            </div>
        </div>
      </div>
    </div>
  </div>
</div>






<hr>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 card cardshadow">
      <div class="row">
        <div class="col-md-12">
          <center>
            <br>

            <div class="imgpic">
              <img width="30px" class="img-fluid" src="img/writing.png"> <span>
                <h1>Blogs</h1>
              </span>
            </div>
          </center>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col-md-12">


        <div class="swiper-container">
                    <div class="swiper-wrapper">


                        <?php

                        $blogsor = $db->prepare("SELECT * from blog where blog_durum=:blog_durum and kullanici_id=:kullanici_id order by blog_id DESC limit 12");
                        $blogsor->execute(array(
                            'blog_durum' => 1,
                            'kullanici_id' => $_SESSION['userkullanici_id'],
                        ));
                        while ($blogcek = $blogsor->fetch(PDO::FETCH_ASSOC)) {  ?>

                            <div class="swiper-slide">

                                <a href="readblog-<?= seo($blogcek["blog_ad"]) . '-' . $blogcek["blog_id"] ?>">
                                    <div class="card  text-white">
                                        <img class="card-img" src="<?php echo $blogcek['blogfoto_resimyol'] ?>" alt="Card image">
                                        <div class="card-img-overlay ">
                                            <h6 class="card-title"><?php echo $blogcek['blog_ad'] ?></h6>
                                        </div>
                                    </div>
                                </a>

                            </div>

                        <?php } ?>





                    </div>
<br>
<br>
<br>
                </div>


        </div>
      </div>
    </div>
  </div>
</div>


</section>
<?php
include 'footer.php';
?>