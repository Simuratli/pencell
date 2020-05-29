<?php

include "header.php";

?>
<br>
<br>
<div class="container-fluid full">

    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <?php
                    if ($_GET['durum'] == "girisbasarili") {
                        echo " <div class='alert display-4 alert-success'>Register Succesfully! Pleace Log in!</div>";
                    } else if ($_GET['durum'] == 'basarisizgiris') {
                        echo " <div class='alert display-4 alert-danger'>Anything is wrong!</div>";
                    }

                    ?>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <br><br>
            <br><br>
            <h1 style=" font-family: 'Calistoga', cursive;">Buttocker</h1>

            <p>
                <?php echo substr($hakkimizdacek['hakkimizda_icerik'], 0, 300) . "..." ?>
            </p>

            <a href="about" class="btn btn-warning">More about us <i class="fa fa-angle-right" aria-hidden="true"></i></a>
        </div>
        <div class="col-md-6">
            <br>
            <img  width="100%" class="img-fluid" src="img/wall.jpg" alt="">
        </div>
    </div>

</div>

<br>

<section class="container-fluid">
    <!--Book Section-->

<br>
<br>
<br>

    <div class="row">
        <div class="col-md-12">
            <br>
            <h1 class="d-flex justify-content-center">Famous books</h1>
            <br>
            <br>
        </div>
        <!--Book 1-->
        <div class="col-md-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <?php

                    $urunsor = $db->prepare("SELECT * from urun where  urun_durum=:urun_durum order by urun_id DESC limit 12 ");
                    $urunsor->execute(array(
                        'urun_durum' => 1
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
    <hr>
    <br>

    <br><br>

    <hr>



    <div class="row">
        <div class="col-md-12">
            <h1 class="d-flex justify-content-center">Latest books</h1>
            <br><br>
            <br>
        </div>
        <!--Book 1-->
        <div class="col-md-12">
            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <?php

                    $urunsor = $db->prepare("SELECT * from urun where urun_onecikar=:urun_onecikar and urun_durum=:urun_durum order by urun_id DESC limit 12");
                    $urunsor->execute(array(
                        'urun_onecikar' => 1,
                        'urun_durum' => 1
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
    <br>

    
    <br>
    <br><br>



    <div class="row">
        <div class="col-md-12">
            <h1 class="d-flex justify-content-center">NEW BLOGS</h1>
            <br><br>
        </div>

        <div class="row">

            <div class="container">
                <div class="swiper-container">
                    <div class="swiper-wrapper">


                        <?php

                        $blogsor = $db->prepare("SELECT * from blog where blog_durum=:blog_durum order by blog_id DESC limit 12");
                        $blogsor->execute(array(
                            'blog_durum' => 1
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

                </div>
                <!-- Add Pagination -->

            </div>
        </div>

    </div>


    <br>
    <hr>
    
    <br><br>

    <br>
    <br>


    <div class="row">
        <div class="col-md-12">
            <h1 class="d-flex justify-content-center">Famous BLOGS</h1>
            <br><br>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">

                <?php


                $blogsor = $db->prepare("SELECT * FROM blog where blog_durum=:blog_durum and blog_onecikar=:blog_onecikar order by blog_id DESC limit 12 ");
                $blogsor->execute(array(
                    'blog_durum' => 1,
                    'blog_onecikar' => 1
                ));

                while ($blogcek = $blogsor->fetch(PDO::FETCH_ASSOC)) {

                    ?>

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

        </div>



    </div>
<br>
<br>
<br>
    <div class="row">
        <div class="col-md-12">
            <center><h1>PDF FILES</h1></center>
        </div>
        <div class="col-md-12">
        <div class="list-group">
        <?php

        $pdfsor = $db->prepare("SELECT * from pdf  order by pdf_id DESC limit 12 ");
        $pdfsor->execute();
        while ($pdfcek = $pdfsor->fetch(PDO::FETCH_ASSOC)) {  ?>


            <a href="pdf-<?= seo($pdfcek["pdf_ad"]) . '-' . $pdfcek["pdf_id"] ?>" class="list-group-item list-group-item-action"><?php echo $pdfcek['pdf_ad']; ?></a>
        <?php } ?>
    </div>
        </div>
    </div>
    <br>

   
    
    <br><br>

</section>
</section>

<?php
include "footer.php"
?>


