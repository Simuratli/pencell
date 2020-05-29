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
                                                </div>
                                            </div>
                                        <hr>
                                        <form method="POST" action="../netting/islem.php" data-parsley-validate>
                                            <div class="form-group">
                                                <label for="ayar_facebook" class="control-label mb-1">Facebook</label>
                                                <input value="<?php echo $ayarcek['ayar_facebook'] ?> " type="text" id="first-name" name="ayar_facebook" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Twitter</label>
                                                <input value="<?php echo $ayarcek['ayar_twitter'] ?> " type="text"  id="first-name" name="ayar_twitter" required="required" class="form-control  col-md-7  col-xs-12">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Youtube</label>
                                                <input type="text" value="<?php echo $ayarcek['ayar_youtube'] ?> " id="first-name" name="ayar_youtube" required="required" class="form-control col-md-7 col-xs-12">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Reddit</label>
                                                <input type="text" value="<?php echo $ayarcek['ayar_google'] ?> " id="first-name" name="ayar_google" required="required" class="form-control col-md-7 col-xs-12">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button id="payment-button" name="sosialayarkaydet" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
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