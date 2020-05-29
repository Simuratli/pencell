<?php include 'header.php';
 
 if(!isset($_SESSION['userkullanici_mail'])){
  Header("Location:login.php?durum=login");}
 
 ?>


<br>
<br>
<br>
<div class="container-fluid ">
  <div class="row ">
    <div class="col-md-12">
      <form method="post" action="admin/netting/kitapekle.php" enctype="multipart/form-data">
      
      <div class="row">

        <div class="col-md-12">

        <div class="form-group">
          <input placeholder="Chapter title" class="myform" type="text" name="chapter_ad">
        </div>

        <br>
        <div class="form-group">
        <div id="editor">
                <textarea id='edit' name='chapter_detay' style="margin-top: 30px;">

      </textarea>

                <!-- bura textarea-->
              </div>
        </div>

        
        <br>  
        

           <input name="urun_id" value="<?php echo $_GET['urun_id'];?>" type="hidden">

        <div class="row d-flex justify content-center">
          <div class="col-md-12">
            <center><button style="width:100%" class="btn btn-info" name="addchapter" type="submit">Create new chapter</button></center>
          </div>
        </div>
        </div>
      </div>

    </form>
    </div>
  </div>
</div>
</div>



<?php include 'footer.php' ?>