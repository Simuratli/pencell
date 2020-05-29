<?php include 'header.php' ?>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h1>PDF files of you</h1>
            </center>
        </div>
    </div>
    <div class="list-group">
        <?php

        $pdfsor = $db->prepare("SELECT * from pdf where kullanici_id=:kullanici_id  order by pdf_id DESC  ");
        $pdfsor->execute(array(
            'kullanici_id'=>$_SESSION['userkullanici_id']
        ));
        while ($pdfcek = $pdfsor->fetch(PDO::FETCH_ASSOC)) {  ?>


            <a href="pdf-<?= seo($pdfcek["pdf_ad"]) . '-' . $pdfcek["pdf_id"] ?>" class="list-group-item list-group-item-action"><?php echo $pdfcek['pdf_ad']; ?></a>
        <?php } ?>
    </div>

</div>

<?php include 'footer.php' ?>