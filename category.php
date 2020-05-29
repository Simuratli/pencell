<?php
include 'header.php';


?>


<?php
$sayfada = 4; // sayfada gösterilecek içerik miktarını belirtiyoruz.
$sorgu = $db->prepare("SELECT * FROM urun");
$sorgu->execute();
$toplam_icerik = $sorgu->rowCount();
$toplam_sayfa = ceil($toplam_icerik / $sayfada);
// eğer sayfa girilmemişse 1 varsayalım.
$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
if ($sayfa < 1) $sayfa = 1;
// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
$limit = ($sayfa - 1) * $sayfada;
//aşağısı bir önceki default kodumuz...
if (isset($_GET['sef'])) {
    $kategorisor = $db->prepare("SELECT * FROM kategori where kategori_seourl=:seourl");
    $kategorisor->execute(array(
        'seourl' => $_GET['sef']
    ));
    $kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);
    $kategori_id = $kategoricek['kategori_id'];

    $urunsor = $db->prepare("SELECT * FROM urun where kategori_id=:kategori_id order by urun_id DESC limit $limit,$sayfada");
    $urunsor->execute(array(
        'kategori_id' => $kategori_id
    ));
    $say = $urunsor->rowCount();

    $blogsor = $db->prepare("SELECT * FROM blog where kategori_id=:kategori_id order by blog_id DESC limit $limit,$sayfada");
    $blogsor->execute(array(
        'kategori_id' => $kategori_id
    ));
    $sayblog = $blogsor->rowCount();

    $pdfsor = $db->prepare("SELECT * FROM pdf where kategori_id=:kategori_id order by pdf_id DESC limit $limit,$sayfada");
    $pdfsor->execute(array(
        'kategori_id' => $kategori_id
    ));
    $saypdf = $pdfsor->rowCount();
    
} else {
    $urunsor = $db->prepare("SELECT * FROM urun order by urun_id DESC limit $limit,$sayfada");
    $urunsor->execute();
    $blogsor = $db->prepare("SELECT * FROM blog order by blog_id DESC limit $limit,$sayfada");
    $blogsor->execute();
    $pdfsor = $db->prepare("SELECT * FROM pdf order by pdf_id DESC limit $limit,$sayfada");
    $pdfsor->execute();
}
if ($toplam_icerik == 0) {
    echo "Bu kate goride ürün bulunamadı";
}



?>
<br>
<br>

<div class="continer">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h1> BOOKS</h1>
                <hr>
                <br>
            </center>
        </div>

<div class="container-fluid">
    <div class="row d-flex justify-content-center">


        <?php


        while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <div class="col-md-2 card">
                <a class="link" href="#"><img width="100%" src="<?php echo $uruncek['urunfoto_resimyol'] ?>">
                    
                    <div align='center'>
                            <hr>
                            <a style="width:100%" class="btn btn-sm btn-outline-info" href="readurun-<?= seo($uruncek["urun_ad"]) . '-' . $uruncek["urun_id"] ?>">Read</a>
                        </div>
                </a>
            </div>
        <?php } ?>
    </div>
    </div>
</div>
    <div class="row">

        <div class="col-md-12">
            <center>
                <hr>
                <h1>Blogs</h1>
                <hr>
            </center>
        </div>
        <?php



        while ($blogcek = $blogsor->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-img">
                        <img class="img-fluid card-img" src="<?php echo $blogcek['blogfoto_resimyol'] ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-bold"><?php echo $blogcek['blog_ad'] ?></h5>
                        <h6><?php echo $blogcek['blog_author'] ?></h6>
                        <div align='center'>
                            <hr>
                            <a style="width:100%" class="btn btn-sm btn-outline-info" href="readblog-<?= seo($blogcek["blog_ad"]) . '-' . $blogcek["blog_id"] ?>">Read</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p><i class="fa fa-heart-o" aria-hidden="true"></i><span style="position:relative;left:5px; top:-2px;">21312</span> </p>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>



    <div class="row">
        <div class="col-md-12">
        <div class="list-group">
        <?php
        while ($pdfcek = $pdfsor->fetch(PDO::FETCH_ASSOC)) {  ?>


            <a href="pdf-<?= seo($pdfcek["pdf_ad"]) . '-' . $pdfcek["pdf_id"] ?>" class="list-group-item list-group-item-action"><?php echo $pdfcek['pdf_ad']; ?></a>
        <?php } ?>
    </div>
        </div>
    </div>
</div>
</div>

<br>
<br>

<nav style="z-index:-23" aria-label="Page navigation example">
    <ul class="pagination justify-content-center">


        <?php for ($i = 1; $i <= $toplam_sayfa; $i++) {
            if ($i == $sayfa) { ?>
                <li class="active page-item">
                    <a  class="page-link" href="category-<?php echo $_GET['sef'] ?>-<?php echo $_GET['kategori_id']; ?>?sayfa=<?php echo $i ?>"><?php echo $i; ?></a>
                </li>
            <?php } else { ?>
                <li class="page-item">
                    <a class="page-link" href="category-<?php echo $_GET['sef'] ?>-<?php echo $_GET['kategori_id']; ?>?sayfa=<?php echo $i ?>"><?php echo $i; ?></a>
                </li>
        <?php }
        } ?>






    </ul>
</nav>


<br>
<br>
<br>
<br>
<br>

<?php
include 'footer.php';

?>