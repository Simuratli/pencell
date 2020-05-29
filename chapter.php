<?php
include 'header.php';


?>
<?php

$puansay = $db->prepare("SELECT COUNT(liked.liked) as say, SUM(liked.liked) as topla , liked.*,chapter.* FROM liked INNER JOIN chapter ON liked.chapter_id=chapter.chapter_id where chapter.chapter_id=:id ");
$puansay->execute(array(
    'id' => $_GET['chapter_id']
));
$puancek = $puansay->fetch(PDO::FETCH_ASSOC);

$likedsor = $db->prepare("SELECT * from liked where kullanici_id=:id and chapter_id=:chapter_id");
$likedsor->execute(array(
    'id' => $_SESSION['userkullanici_id'],
    'chapter_id' => $_GET['chapter_id']
));

//dönen satır sayısını belirtir
$say = $likedsor->rowCount();
?>

<br>
<br>
<br>

<div class="container">
    <div class="row">

        <div class="col">
            <br>
            <div class="dropdown">
                <button style="width:100%" class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Chapters
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                    <?php


                    $chaptersor = $db->prepare("SELECT chapter.*,urun.* FROM chapter INNER JOIN urun ON chapter.urun_id=urun.urun_id");
                    $chaptersor->execute();

                    while ($chaptercek = $chaptersor->fetch(PDO::FETCH_ASSOC)) {
                        ?>


                        <div class="col-md-12">
                            <a style="width:100% !important" class="dropdown-item" href="chapter-<?= seo($chaptercek["chapter_ad"]) . '-' . $chaptercek["chapter_id"] ?>"><?php echo $chaptercek['chapter_ad'] ?> </a>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>

        <form type method="post" action="admin/netting/kitapekle.php">
            <input name="liked" value="1" type="hidden">


            <div class="col">
                <input name="chapter_id" value="<?php echo $_GET['chapter_id'] ?>" type="hidden">
                <br>


                <?php
                if ($say == 0) { ?>

                    <button style="width: 100%" type="submit" name="chapterpoint" class=" btn  btn-outline-warning"><i class="fa fa-star-o"></i></button>

                <?php   } else  if ($say == 1) { ?>
                    <a style="width: 100%" class=" btn  btn-warning"><i class="fa fa-star"></i></a>

                <?php } ?>
            </div>


    </div>
</div>

<br>
<hr>
<br>


<?php


$chaptersor = $db->prepare("SELECT * from chapter where chapter_id=:chapter_id");
$chaptersor->execute(array(
    "chapter_id" => $_GET["chapter_id"]
));
$chaptercek = $chaptersor->fetch(PDO::FETCH_ASSOC);
?>

<meta property="og:title" content="<?php echo $chaptercek['chapter_ad']; ?>" />
 <meta property="og:type" content="Chapter" />
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <center>
                <h1><?php echo $chaptercek['chapter_ad']; ?></h1>
                <hr style="width:350px">
                <div class="container">
                    <div class="row">

                        <div align='right' class="col">
                            <i class="fa fa-star-o" aria-hidden="true"><?php echo $puancek['say'] ?></i>
                        </div>

                        <div align='left' class="col">
                            <i class="fa fa-comment-o" aria-hidden="true">

                                <?php

                                $yorumsay = $db->prepare("SELECT COUNT(chapter_id) as say FROM yorumlar where chapter_id=:id");
                                $yorumsay->execute(array(
                                    'id' => $_GET['chapter_id']
                                ));
                                $yorumcek = $yorumsay->fetch(PDO::FETCH_ASSOC);
                                echo $yorumcek['say']
                                ?>
                            </i>
                        </div>
                    </div>
                </div>
            </center>
        </div>
        <hr>
        <br>
        <input type="hidden" name="like_id" value="<?php echo $puancek['like_id'] ?>">
        <input type="hidden" name="gelen_url" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . ""; ?>">
        </form>
        <div class="col-md-8">
            <br>

            <p>
                <?php echo $chaptercek['chapter_detay']; ?>
            </p>

            <br>
            <hr>
            <br>


            <?php

            $kullanici_id = $kullanicicek["kullanici_id"];
            $chapter_id = $chaptercek["chapter_id"];

            $yorumsor = $db->prepare("SELECT yorumlar.*,kullanici.*  FROM yorumlar INNER JOIN kullanici ON yorumlar.kullanici_id=kullanici.kullanici_id where  chapter_id=:chapter_id order by yorum_id DESC");

            $yorumsor->execute(array(
                'chapter_id' => $chapter_id,
            ));

            ?>

            <div class="comment">
                <form method="POST" action="admin/netting/islem.php">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Write comment</label>
                        <textarea name='yorum_detay' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="gelen_url" value="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . ""; ?>">
                    <input type="hidden" name="chapter_id" value="<?php echo $chaptercek['chapter_id'] ?>">
                    <div class="form-group">
                        <button name="yorumkaydet" type="submit" class="btn btn-info">Send</button>
                    </div>
                </form>
                <hr>
                <br>


                <?php



                while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {
                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="imgbox2">
                                    <img class="img-fluid" src="<?php echo $yorumcek['kullanici_magazafoto'] ?>" alt="">
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
    </div>
</div>

<br>
<br>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">

        </div>
    </div>
</div>

<br>
<br>
<br>
<?php
include 'footer.php';

?>