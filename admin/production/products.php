<?php
include "header.php";
   
$urunsor=$db->prepare("SELECT * FROM urun");
$urunsor->execute();


$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <center>
        <div style="overflow:hidden;height:100%; margin:5px" class="au-card">
            <div class="container-fluid">
                <div class="row">
                    <div class="row ml-2 d-flex justify-content-center ">
                        <div class="col-md-12 d-flex justify-content-center">
                            <a class="btn btn-info" href="urun-ekle.php">Add new category</a>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <br><br>

                        <table class="table">
                            <thead class="bg-dark font-light">
                                <tr>
                                    <td>Category</td>
                                    <td>Status</td>
                                    <td>Profit</td>
                                    <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $urunsor = $db->prepare("SELECT * from urun order by urun_id DESC ");
                                $urunsor->execute();

                                while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                    <tr>
                                        <td><?php echo $uruncek['urun_ad'] ?></td>
                                        <td>
                                            <?php
                                                if ($uruncek['urun_durum'] == 1) {
                                                    ?>
                                                <a class="btn text-white btn-success">Active</a>
                                            <?php } else { ?>
                                                <a class="btn text-white btn-secondary">Passive</a>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php

                                                if ($uruncek['urun_onecikar'] == 1) { ?>
                                                <a href='../netting/adminislem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_one=0&urun_onecikar=ok' class='btn  btn-sm btn-success'>VİP</a>
                                            <?php } else { ?>
                                                <a class='btn btn-sm  btn-outline-danger' href='../netting/adminislem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_one=1&urun_onecikar=ok'>DONT VİP</a>
                                            <?php  } ?>
                                        </td>

                                        <td><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok" class="btn btn-danger">SIL</a></td>
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