<?php
include "header.php"

?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <center>
        <div style="overflow:hidden;height:100%; margin:5px" class="au-card">
            <div class="container-fluid">
                <div class="row">
                    <div class="row ml-2 d-flex justify-content-center ">
                        <div class="col-md-12 d-flex justify-content-center">
                            <a class="btn btn-info" href="kategori-ekle.php">Add new category</a>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <br><br>

                        <table class="table">
                            <thead class="bg-dark font-light">
                                <tr>
                                    <td>Category</td>
                                    <td>Number</td>
                                    <td>Delete</td>
                                    <td>VIP</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $kategorisor = $db->prepare("SELECT * from kategori order by kategori_id DESC ");
                                $kategorisor->execute();

                                while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                    <tr>
                                        <td><?php echo $kategoricek['kategori_ad'] ?></td>
                                        <td><?php echo $kategoricek['kategori_sira'] ?></td>
                                        <td><a href="../netting/islem.php?kategori_id=<?php echo $kategoricek['kategori_id']; ?>&kategorisil=ok" class="btn btn-danger">SIL</a></td>
                                        <td>
                                            <?php

                                                if ($kategoricek['kategori_onecikar'] == 1) { ?>
                                                <a href='../netting/adminislem.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>&kategori_one=0&kategori_onecikar=ok' class='btn  btn-sm btn-success'>VİP</a>
                                            <?php } else { ?>
                                                <a class='btn btn-sm  btn-outline-danger' href='../netting/adminislem.php?kategori_id=<?php echo $kategoricek['kategori_id'] ?>&kategori_one=1&kategori_onecikar=ok'>DONT VİP</a>
                                            <?php  } ?>
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