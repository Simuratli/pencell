<?php
include 'header.php';
?>

<br>
<br>
<br>

<div class="container">
    <div class="row">
        

        <div class="col-md-12">
            <div class="form-group">
                <label for="">NAME</label>
                <input class="form-control" name="pdf_ad" type="text">
            </div>  

            <div class="form-group">
                <label for="">PDF</label>
                <input class="form-control" name="pdf" accept="pdf" type="file">
            </div> 


            <div class="form-group">
          <label for="">Overview</label>
          <div id="editor">
                        <textarea id='edit' name='pdf_detay' style="margin-top: 30px;">
                                  
                         </textarea>
                    </div>
        </div>

        <script type="text/javascript">
          CKEDITOR.replace('editor1',

            {

              filebrowserBrowseUrl: 'ckfinder/ckfinder.html',

              filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',

              filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',

              filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

              filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

              filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

              forcePasteAsPlainText: true

            }

          );
        </script>
        <br>  
          
        <div class="form-group">
            <label >Category</label>
            <select class="form-control" name="kategori_id" id="">
             
            <?php
            
            $kategorisor=$db->prepare("SELECT * from kategori order by kategori_id DESC ");
            $kategorisor->execute();

            while ($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { 
            ?>
            <option value="<?php echo $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?></option>
            <?php } ?>
          
          </select>

        </div>
        <div class="form-group">
            <button style="width: 100%" name="pdfekle" class="btn text-white btn-warning">UPLOAD</button>
        </div>
        </div>
    </div>
</div>
</form>

<?php
include 'footer.php';
?>
