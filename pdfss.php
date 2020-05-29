<?php include 'header.php';


$pdfsor = $db->prepare("SELECT pdf.*,kullanici.* from pdf INNER JOIN kullanici ON pdf.kullanici_id=kullanici.kullanici_id where pdf_id=:id");
$pdfsor->execute(array(
    "id" => $_GET["pdf_id"]
));
$pdfcek = $pdfsor->fetch(PDO::FETCH_ASSOC);



?>
<br>
<br>



<div class="container">
<div class="row">
    <div class="col-md-12">
        <center><h1><?php  echo $pdfcek['kullanici_ad'].'-'.$pdfcek['pdf_ad']; ?></h1></center>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <embed src= "<?php echo $pdfcek['pdf']; ?>" width="100%" height="500px" >
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
    <center>
        <a href="<?php echo $pdfcek['pdf']; ?>" class="btn btn-xl btn-success">DOWNLOAD PDF</a>
    </center>
    </div>
</div>
</div>


<?php include 'footer.php'; ?>


