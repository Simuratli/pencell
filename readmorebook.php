<?php
include 'header.php';
?>

<br>
<br>

<div class="container">
    <div class="d-flex justify-content-center">
        <h1>
            Tech
            <hr>
        </h1>
    </div>
    <div class="row">

        <?php

        $urunsor = $db->prepare("SELECT * FROM urun where urun_durum=:urun_durum and urun_onecikar=:urun_onecikar order by urun_id DESC");
        $urunsor->execute(array(
            'urun_durum' => 1,
            'urun_onecikar' => 1,
        ));

        while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <div class="col-md-2 col-xs-12">
                <div class="card">
                    <div class="card-img">
                        <img style="min-height: 200px;" class="img-fluid p-2" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="">
                    </div>
                    <div class="card-body">
                        <div align='center'>
                            <button style="width:100%" class="btn btn-sm btn-outline-info">Read</button>
                        </div>
                    </div>

                    <div class="card-footer">
                        <p><i class="fa fa-heart-o" aria-hidden="true"></i><span style="position:relative;left:5px; top:-2px;">21312</span> </p>
                    </div>
                </div>
            </div>
            <!--Book 1 edn-->
        <?php } ?>

    </div>
</div>


<?php
include 'footer.php';
?>