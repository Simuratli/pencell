<?php include 'header.php';

if (isset($_POST['search'])) {

    $searched = $_POST['searched'];
    $urunsor = $db->prepare("SELECT * FROM urun where urun_ad LIKE ?");
    $urunsor->execute(array("%$searched%"));

    $say = $urunsor->rowCount();
} else {

    Header("Location:search.php?durum=bos");
}



if (isset($_POST['search'])) {

    $searched = $_POST['searched'];
    $blogsor = $db->prepare("SELECT * FROM blog where blog_ad LIKE ?");
    $blogsor->execute(array("%$searched%"));

    $say = $blogsor->rowCount();
}



if (isset($_POST['search'])) {

    $searched = $_POST['searched'];
    $pdfsor = $db->prepare("SELECT * FROM pdf where pdf_ad LIKE ?");
    $pdfsor->execute(array("%$searched%"));

    $say = $pdfsor->rowCount();
}
?>




<br>
<br>
<br>
<br>

<div class="container">

    <div class="row">

        <?php



        while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <div class="col-md-2">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <a href="#" style="width: 100%" class="btn btn-outline-dark">READ</a>
                    </div>
                </div>
            </div>

        <?php } ?>


    </div>
</div>


<br>
<br>
<br>

<div class="container">
    <div class="row">

        <?php



        while ($blogcek = $blogsor->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $blogcek['blogfoto_resimyol'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-title">
                            <h6><?php echo $blogcek['blog_ad'] ?></h6>
                        </p>
                        <a href="#" style="width: 100%" class="btn btn-outline-dark">READ</a>
                    </div>
                </div>
            </div>

        <?php } ?>


    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="list-group">
                <?php


                while ($pdfcek = $pdfsor->fetch(PDO::FETCH_ASSOC)) {  ?>


                    <a href="pdf-<?= seo($pdfcek["pdf_ad"]) . '-' . $pdfcek["pdf_id"] ?>" class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-md-9">
                            <h3><?php echo $pdfcek['pdf_ad'] ?></h3>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end">
                            <p>PDF</p>
                        </div>
                    </div>
                    </a>
                <?php } ?>

            </div>
        </div>

    </div>
</div>


















<?php
include 'footer.php'
?>