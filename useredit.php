<?php include 'header.php';

if(!isset($_SESSION['userkullanici_mail'])){
    Header("Location:login.php?durum=login");}

?>
        <br>
        <br>

        <section class="container">


            <div class="row">
                <div class="col-md-4 d-flex justify-content-center">
                   <form enctype="multipart/form-data" data-parsley-validate method="post" action="admin/netting/adminislem.php">
                   <div class="imgbox3">
                         <img width="100%"  class="img-fluid" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>" alt="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Chose photo</label>
                        <input class="form-control" name="kullanici_magazafoto" type="file">
                        <input class="form-control" value="<?php echo $kullanicicek['kullanici_magazafoto'] ?>" name="eski_yol" type="hidden">
                    </div>
                    <hr>
                    <center>
                    <button class="btn btn-outline-dark" name="kullaniciresimguncelle" type="submit">Update photo</button>
                    </center>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="p-5">
                        <form method="post" action="admin/netting/kullanici.php">
                            <div class="form-group">
                                <label for="">Name</label>
                                     <input value="<?php echo $kullanicicek['kullanici_ad'] ?>" class="form-control" type="text" name="kullanici_ad" id="">
                            </div><br>
                            <div class="form-group">
                                <label for="">Facebook</label>
                                     <input value="<?php echo $kullanicicek['kullanici_facebook'] ?>" class="form-control" type="text" name="kullanici_facebook" id="">
                            </div><br>
                            <div class="form-group">
                                <label for="">Twitter</label>
                                     <input value="<?php echo $kullanicicek['kullanici_twitter'] ?>" class="form-control" type="text" name="kullanici_twitter" id="">
                            </div><br>
                            <div class="form-group">
                                <label for="">Email(unchangable)</label>
                                <input class="form-control" readonly value="<?php echo $kullanicicek['kullanici_mail'] ?>" type="email" name="kullanici_mail" id="">
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                    <button name="musteribilgiguncelle" class="btn btn-outline-info">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </section>

            

    <br><br>

    <?php include 'footer.php'; ?>