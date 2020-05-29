<?php
include 'header.php';
$blogsor = $db->prepare("SELECT blog.*,kullanici.* from blog INNER JOIN kullanici ON blog.kullanici_id=kullanici.kullanici_id where blog_id=:blog_id");
$blogsor->execute(array(
    "blog_id" => $_GET["blog_id"]
));
$blogcek = $blogsor->fetch(PDO::FETCH_ASSOC);


$puansay = $db->prepare("SELECT COUNT(liked.liked) as say, SUM(liked.liked) as topla , liked.*,blog.* FROM liked INNER JOIN blog ON liked.blog_id=blog.blog_id where blog.blog_id=:id ");
$puansay->execute(array(
    'id' => $_GET['blog_id']
));
$puancek = $puansay->fetch(PDO::FETCH_ASSOC);

$likedsor = $db->prepare("SELECT * from liked where kullanici_id=:id and blog_id=:blog_id");
$likedsor->execute(array(
    'id' => $_SESSION['userkullanici_id'],
    'blog_id' => $_GET['blog_id']
));

//dönen satır sayısını belirtir
$say = $likedsor->rowCount();
?>
<meta property="og:title" content="<?php echo $blogcek['blog_ad']; ?>" />
<meta property="og:type" content="article" />
<br>
<br>
<br>
<div class="container">
    <div class="col-md-12">
        <center>
            <h1> <?php echo $blogcek['blog_ad']; ?></h1>

            <div class="container">
                <div class="row">

                    <div align='right' class="col">
                        <i class="fa fa-star-o" aria-hidden="true"><?php echo $puancek['say'] ?></i>
                    </div>

                    <div align='left' class="col">
                        <i class="fa fa-comment-o" aria-hidden="true">

                            <?php

                            $yorumsay = $db->prepare("SELECT COUNT(blog_id) as say FROM yorumlar where blog_id=:id");
                            $yorumsay->execute(array(
                                'id' => $_GET['blog_id']
                            ));
                            $yorumcek = $yorumsay->fetch(PDO::FETCH_ASSOC);
                            echo $yorumcek['say']
                            ?>
                        </i>
                    </div>
                </div>
            </div>
            <hr>

        </center>
    </div>
    <div class="row d-flex justify-content-center ">
        <div class="col-md-4 ">
            <div class="imgbox2">
                <img class="img-fluid" src="<?php echo $blogcek['kullanici_magazafoto'] ?>" alt="">
            </div>
            <span style="position:relative;left:10x;top:-25px;"><a href="user-<?= seo($blogcek["kullanici_ad"]) . '-' . $blogcek["kullanici_id"] ?>"><?php echo $blogcek['kullanici_ad'] ?></a></span>
            <br>
            <span style="position:relative;left:55px;top:-30px; font-size:10px"><?php echo $blogcek['blog_zaman'] ?></span>
        </div>
        <div class="col-md-3 d-flex justify-content-center">
            <a class="mr-1" href="<?php echo $blogcek['kullanici_facebook'] ?>"><i class="fa fa-2x fa-facebook-official" aria-hidden="true"></i></a>
            <a class="mr-1" href="<?php echo $blogcek['kullanici_twitter'] ?>"><i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <center>
                <img width="60%" class="img-fluid" src="<?php echo $blogcek['blogfoto_resimyol'] ?>" alt="">
                <br><br>
                <hr>
            </center>
        </div>

        <div class="col-md-12 d-flex justify-content-center">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="admin/netting/kitapekle.php">
                        <input name="liked" value="1" type="hidden">
                        <input name="blog_id" value="<?php echo $_GET['blog_id'] ?>" type="hidden">
                        <br>
                        <?php
                        if ($say == 0) { ?>

                            <button style="width: 100%" type="submit" name="blogpoint" class=" btn  btn-outline-warning"><i class="fa fa-star-o"></i></button>

                        <?php   } else  if ($say == 1) { ?>
                            <a style="width: 100%" class=" btn  btn-warning"><i class="fa fa-star"></i></a>

                        <?php } ?>


                        <input type="hidden" name="gelen_url" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . ""; ?>">
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-10 ">


            <p>
                <?php

                echo $blogcek['blog_detay'];
                ?>
            </p>
        </div>

        

    </div>
</div>
<br>
<hr>
<br>
<div class="container">


    <?php

    $kullanici_id = $kullanicicek["kullanici_id"];
    $blog_id = $blogcek["blog_id"];

    $yorumsor = $db->prepare("SELECT yorumlar.*,kullanici.*  FROM yorumlar INNER JOIN kullanici ON yorumlar.kullanici_id=kullanici.kullanici_id where  blog_id=:blog_id order by yorum_id DESC");

    $yorumsor->execute(array(
        'blog_id' => $blog_id,
    ));

    ?>

    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <form method="post" action="admin/netting/islem.php">
                <div class="form-group">
                    <label for="">Comment</label>
                    <textarea name="yorum_detay" id="" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button name="commmentblog" style="width:100%" class="btn btn-outline-info">SEND</button>
                    <hr>
                    <input type="hidden" name="gelen_url" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . ""; ?>">
                    <input type="hidden" name="blog_id" value="<?php echo $blogcek['blog_id'] ?>">
                </div>
            </form>
        </div>


        <?php



        while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="col-md-12 card p-2">
                <div class="row">
                    <div class="col-md-2">
                        <div class="imgbox2">
                            <a href="user-<?= seo($yorumcek["kullanici_ad"]) . '-' . $yorumcek["kullanici_id"] ?>"><img class="img-fluid" src="<?php echo $yorumcek['kullanici_magazafoto'] ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <p><?php echo $yorumcek['yorum_detay'] ?></p>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <p style="font-size:14px !important;"><?php echo substr($yorumcek['yorum_zaman'], 0, 10) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        <?php } ?>

    </div>

</div>



<?php
include 'footer.php';

?>