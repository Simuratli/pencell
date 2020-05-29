<?php
 include "header.php";
 
$hakkimizdasor=$db->prepare("SELECT * from hakkimizda ");
$hakkimizdasor->execute();

$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);




?>

            <!-- MAIN CONTENT-->
            <div  class="main-content">


            <div style="margin:10px; padding:10px" class="au-card">
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                    <br>
                    <hr>
                </div>
            </div>

     
                                        <form method="POST" action="../netting/islem.php" data-parsley-validate>
                                            <div class="form-group">
                                                <label for="ayar_title" class="control-label mb-1">ABOUT US TITLE*</label>
                                                <input value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?> " type="text" id="first-name" name="hakkimizda_baslik" required="required" class="form-control  col-xs-12">
                                            </div>
                                            
 <div class="form-group">
 <label for="ayar_title" class="control-label mb-1">ABOUT US TEXT*</label>
              </label>
              <div class="form-control  col-xs-12">

                <textarea  class="ckeditor" id="editor1" name="hakkimizda_icerik"><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
              </div>
            </div>

            <script type="text/javascript">

             CKEDITOR.replace( 'editor1',

             {

              filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

              filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

              filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

              filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

              filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

              filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

              forcePasteAsPlainText: true

            } 

            );

          </script>

          <!-- Ck Editör Bitiş -->


                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Our Mission</label>
                                                <input value="<?php echo $hakkimizdacek['hakkimizda_misyon'] ?> " type="text"  id="first-name" name="hakkimizda_misyon" required="required" class="form-control  col-xs-12">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Our Vision</label>
                                                <input type="text" value="<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?> " id="first-name" name="hakkimizda_vizyon" required="required" class="form-control  col-xs-12">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            
                                            <div>
                                                <button id="payment-button" name="hakkimizdakaydet" type="submit" class="btn btn-lg btn-info btn-block">
                                                    
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