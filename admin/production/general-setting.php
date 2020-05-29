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
                                    <div class="card-header">General Setting</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Logo </h3>
                                        </div>
                                        <hr>
                                        
                                            <div class="row">
                                                <div class="col-lg-12">
                                                <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo <br><span class="required"></span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <?php 
                          if (strlen($ayarcek['ayar_logo'])>0) {?>
                            <img width="200" src="../../<?php echo $ayarcek['ayar_logo']; ?>">
                              
                         <?php } else 
                            {?> 

                              <img width="200" src="../../dimg/logo-yok.jpg">

                           <?php  }?>                          


                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Choose IMAGE <span class="required"></span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name"  name="ayar_logo" class="form-control col-md-12 cc-name valid col-md-7 col-xs-12">
                        </div>
                      </div>
                      <input type="hidden" name="eski_yol" value="<?php echo $ayarcek["ayar_logo"] ?>">

                      <div  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit"  name="logoduzenle" class="btn btn-info form-control cc-name valid">Update Logo</button>
                      </div>
                    </form>
                                                </div>
                                            </div>
                                        <hr>
                                        <form method="POST" action="../netting/islem.php" data-parsley-validate>
                                            <div class="form-group">
                                                <label for="ayar_title" class="control-label mb-1">Site title*</label>
                                                <input value="<?php echo $ayarcek['ayar_title'] ?> " type="text" id="first-name" name="ayar_title" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Site Description</label>
                                                <input value="<?php echo $ayarcek['ayar_description'] ?> " type="text"  id="first-name" name="ayar_description" required="required" class="form-control  col-xs-12">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Keyword</label>
                                                <input type="text" value="<?php echo $ayarcek['ayar_keywords'] ?> " id="first-name" name="ayar_keywords" required="required" class="form-control col-md-7 col-xs-12">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Author</label>
                                                <input type="text" value="<?php echo $ayarcek['ayar_author'] ?> " id="first-name" name="ayar_author" required="required" class="form-control col-md-7 col-xs-12">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button id="payment-button" name="genelayarkaydet" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
                                                    <span id="payment-button-amount">Update</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
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