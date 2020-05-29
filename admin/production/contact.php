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
                                                <label for="ayar_facebook" class="control-label mb-1">Telefon</label>
                                                <input value="<?php echo $ayarcek['ayar_tel'] ?> " type="text" id="first-name" name="ayar_tel" required="required" class="form-control  col-xs-12">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Whatsapp</label>
                                                <input value="<?php echo $ayarcek['ayar_whatsapp'] ?> " type="text"  id="first-name" name="ayar_whatsapp" required="required" class="form-control    col-xs-12">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Adress</label>
                                                <input type="text" value="<?php echo $ayarcek['ayar_adress'] ?> " id="first-name" name="ayar_adress" required="required" class="form-control  col-xs-12">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Mail</label>
                                                <input type="text" value="<?php echo $ayarcek['ayar_mail'] ?> " id="first-name" name="ayar_mail" required="required" class="form-control  col-xs-12">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button id="payment-button" name="iletisimayarkaydet" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
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