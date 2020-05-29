<?php include 'header.php';

$chaptersor = $db->prepare("SELECT * FROM chapter where  chapter_id=:chapter_id");
$chaptersor->execute(array(
    'chapter_id' => $_GET['chapter_id']
));



$chaptercek = $chaptersor->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['userkullanici_mail'])) {
    Header("Location:login.php?durum=login");
}
?>

<div class="container-fluid p-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form method="post" action="admin/netting/kitapekle.php" enctype="multipart/form-data">

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if ($_GET['durum'] == "ok") { ?>

                                <div class="alert alert-success p-2">
                                    <center>
                                        <h4 class="">succesfull</h4>
                                    </center>
                                </div>

                            <?php } elseif ($_GET['durum'] == "no") { ?>

                                <div class="alert alert-success p-2">
                                    <center>
                                        <h4 class="">Not succesful</h4>
                                    </center>
                                </div>
                            <?php }

                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input placeholder="CHAPTER TITLE" value="<?php echo $chaptercek['chapter_ad'] ?>" class="myform" type="text" name="chapter_ad">
                </div>

                <br>
                <div class="form-group">

                    <div id="editor">
                        <textarea id='edit' name='chapter_detay' style="margin-top: 30px;">
                                    <?php echo $chaptercek['chapter_detay'] ?>
                         </textarea>
                    </div>
                    
                </div>

                <br>
                <br>

                <input name="chapter_id" value="<?php echo $chaptercek['chapter_id'] ?>" type="hidden">
                <input name="urun_id" value="<?php echo $uruncek['urun_id'] ?>" type="hidden">
                <input name="eski_yol" value="<?php echo $chaptercek['chapterfoto_resimyol'] ?>" type="hidden">
                <div class="row d-flex justify content-center">
                    <div class="col-md-12">
                        <center><button style="width:100%" class="btn btn-success" name="chapterduzenle" type="submit">Edit</button></center>
                    </div>
                </div>
        </div>

        </form>
    </div>
</div>
</div>



<?php include 'footer.php' ?>