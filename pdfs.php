<?php include 'header.php' ?>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h1>PDF files </h1>
            </center>
        </div>
    </div>
    <div class="list-group">
        <?php

        $pdfsor = $db->prepare("SELECT * from pdf  order by pdf_id DESC limit 12 ");
        $pdfsor->execute(array(
            'pdf_durum' => 1
        ));
        while ($pdfcek = $pdfsor->fetch(PDO::FETCH_ASSOC)) {  ?>


            <a href="pdf-<?= seo($pdfcek["pdf_ad"]) . '-' . $pdfcek["pdf_id"] ?>" class="list-group-item list-group-item-action"><?php echo $pdfcek['pdf_ad']; ?></a>
        <?php } ?>
    </div>

</div>

<?php include 'footer.php' ?>