<?php
include "header.php";
   
$pdfsor=$db->prepare("SELECT pdf.*,kullanici.*  FROM pdf INNER JOIN kullanici ON pdf.kullanici_id = kullanici.kullanici_id");
$pdfsor->execute();


$pdfcek=$pdfsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <center>
        <div style="overflow:hidden;height:100%; margin:5px" class="au-card">
            <div class="container-fluid">
                <div class="row">
                    <div class="row ml-2 d-flex justify-content-center ">
                        <div class="col-md-12 d-flex justify-content-center">
                            <a class="btn btn-info" href="pdf-ekle.php">Add new category</a>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <br><br>

                        <table class="table">
                            <thead class="bg-dark font-light">
                                <tr>
                                    <td>Category</td>
                                    <td>Author</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               

                                while ($pdfcek = $pdfsor->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                    <tr>
                                        <td><?php echo $pdfcek['pdf_ad'] ?></td>
                                        <td>
                                            <?php echo $pdfcek['kullanici_ad'] ?>
                                        </td>

                                        

                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>
<?php
include "footer.php"
?>