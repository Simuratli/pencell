<?php
 include "header.php"

?>

            <!-- MAIN CONTENT-->
            <div  class="main-content">


            <div style="margin:10px" class="au-card">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Categories adding</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Logo </h3>
                                        </div>
                                        <hr>

                                        <div class="container">
                                                <div class="col-md-12">
                                                    <form method="post" action="../netting/islem.php">
                                                    <div class="form-group">
                                                        <label for="">CATAGORY NAME</label>
                                                        <input class="form-control col-md-12" name="kategori_ad" type="text">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="">CATAGORY Number</label>
                                                        <input class="form-control col-md-12" name="kategori_sira" type="text">
                                                    </div>
                                                    <br>
                                                    <div class="d-flex justify-content-center">
                                                        <button name="kategorikaydet" class="btn btn-outline-info">ADD</button>
                                                    </div>
                                                    </form>
                                                </div>
                                        </div>




                                        
                        </div>
                    </div>
                </div>
        
        
        
            </div>



            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
<?php 
include "footer.php"
?>