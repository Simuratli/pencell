
<?php
include 'header.php';



$urunsor = $db->prepare("SELECT urun.*,kullanici.* from urun INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id where urun_id=:id");
$urunsor->execute(array(
    "id" => $_GET["urun_id"]
));
$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);



?>
<br>
<br>
<br>
<br>
<meta property="og:title" content="<?php echo $uruncek['urun_ad']; ?>" />
<meta property="og:type" content="book" />
<section class="container">

    <div class="row">
        <div align='center' class="col-md-3 ">
            <div style="display:inline-block" class="imgbox2">
                <img class="img-fluid" src="<?php echo $uruncek['kullanici_magazafoto'] ?>" alt="">
            </div>
            <a href="user-<?= seo($uruncek["kullanici_ad"]) . '-' . $uruncek["kullanici_id"] ?>">
                <p style="display:inline-block; top:-15px;left:10px; position:relative"><?php echo $uruncek['kullanici_ad'] ?></p>
            </a>
            <br>
            <img class="img-fluid" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="">
        </div>
        <div class="col-md-6">
            <div>
                <br>
                <center>
                    <h1><?php echo $uruncek['urun_ad']; ?></h1>
                    <div class="container">
                        <div class="row">

                            <div align='right' class="col">
                                <i class="fa fa-star-o" aria-hidden="true"><?php echo $puancek['say'] ?></i>
                            </div>

                            <div align='left' class="col">
                                <i class="fa fa-comment-o" aria-hidden="true">

                                    <?php

                                    $yorumsay = $db->prepare("SELECT COUNT(urun_id) as say FROM yorumlar where urun_id=:id");
                                    $yorumsay->execute(array(
                                        'id' => $_GET['urun_id']
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
            <div>
                <p style="word-break:break-all" class="p-3">
                    <?php echo $uruncek['urun_detay']; ?>
                </p>
                <hr>

            </div>
            <?php

            $kullanici_id = $kullanicicek["kullanici_id"];
            $urun_id = $uruncek["urun_id"];

            $yorumsor = $db->prepare("SELECT yorumlar.*,kullanici.*  FROM yorumlar INNER JOIN kullanici ON yorumlar.kullanici_id=kullanici.kullanici_id where  urun_id=:urun_id order by yorum_id DESC");

            $yorumsor->execute(array(
                'urun_id' => $urun_id,
            ));

            ?>
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="admin/netting/islem.php">
                        <div class="form-group">
                            <label class="text-secondary" for="">Comment to the book</label>
                            <textarea style="width:100%" name="yorum_detay" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="commentbook" style="width:100%" class="btn btn-outline-warning">Send</button>
                            <hr>
                            <input type="hidden" name="gelen_url" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . ""; ?>">
                            <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
                        </div>
                    </form>
                </div>


                <?php



                while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-md-12 card p-2">
                        <div class="row  ">
                            <div class="col-md-2">
                                <div class="imgbox2">
                                    <a href="user-<?= seo($yorumcek["kullanici_ad"]) . '-' . $yorumcek["kullanici_id"] ?>"><img class="img-fluid" src="<?php echo $yorumcek['kullanici_magazafoto'] ?>" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <p style="font-size: 14px !important"><?php echo $yorumcek['yorum_detay'] ?></p>
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
        <div class="col-md-3">
            <br>
            <br>
            <div class="list-group ">
                <?php

                $chaptersor = $db->prepare("SELECT * from chapter where urun_id=:urun_id order by chapter_id ASC");
                $chaptersor->execute(array(
                    'urun_id' => $_GET['urun_id']
                ));

                while ($chaptercek = $chaptersor->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                    <a href="chapter-<?= seo($chaptercek["chapter_ad"]) . '-' . $chaptercek["chapter_id"] ?>" class="list-group-item bg-warning text-white list-group-item-action"><?php echo $chaptercek['chapter_ad']; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>

</section>




<?php
include 'footer.php';
?>