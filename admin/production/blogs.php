<?php
include "header.php";
   
$blogsor=$db->prepare("SELECT * FROM blog");
$blogsor->execute();


$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <center>
        <div style="overflow:hidden;height:100%; margin:5px" class="au-card">
            <div class="container-fluid">
                <div class="row">
                    <div class="row ml-2 d-flex justify-content-center ">
                        <div class="col-md-12 d-flex justify-content-center">
                            <a class="btn btn-info" href="blog-ekle.php">Add new category</a>
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
                                $blogsor = $db->prepare("SELECT * from blog order by blog_id DESC ");
                                $blogsor->execute();

                                while ($blogcek = $blogsor->fetch(PDO::FETCH_ASSOC)) {

                                    ?>
                                    <tr>
                                        <td><?php echo $blogcek['blog_ad'] ?></td>
                                        <td>
                                            <?php
                                                if ($blogcek['blog_durum'] == 1) {
                                                    ?>
                                                <a class="btn text-white btn-success">Active</a>
                                            <?php } else { ?>
                                                <a class="btn text-white btn-secondary">Passive</a>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php

                                                if ($blogcek['blog_onecikar'] == 1) { ?>
                                                <a href='../netting/adminislem.php?blog_id=<?php echo $blogcek['blog_id'] ?>&blog_one=0&blog_onecikar=ok' class='btn  btn-sm btn-success'>VİP</a>
                                            <?php } else { ?>
                                                <a class='btn btn-sm  btn-outline-danger' href='../netting/adminislem.php?blog_id=<?php echo $blogcek['blog_id'] ?>&blog_one=1&blog_onecikar=ok'>DONT VİP</a>
                                            <?php  } ?>
                                        </td>

                                        <td><a href="../netting/islem.php?blog_id=<?php echo $blogcek['blog_id']; ?>&blogsil=ok" class="btn btn-danger">SIL</a></td>
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