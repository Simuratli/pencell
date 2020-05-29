<?php
 include "header.php"

?>

            <!-- MAIN CONTENT-->
            <div  class="main-content">
                <center>
                    <div style="overflow:hidden;height:100%; margin:5px" class="au-card">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead class="bg-dark font-light">
                                            <tr>
                                                <td>Username</td>
                                                <td>User Mail</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                    $kullanicisor=$db->prepare("SELECT * from kullanici order by kullanici_id DESC ");
                                                    $kullanicisor->execute();
                                        
                                                    while ($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) { 
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo $kullanicicek['kullanici_ad'] ?></td>
                                                <td><?php echo $kullanicicek['kullanici_mail'] ?></td>
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