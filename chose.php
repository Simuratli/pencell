<?php 
include "header.php";
if(!isset($_SESSION['userkullanici_mail'])){
  Header("Location:login.php?durum=login");}
?>
    <br><br>
    <br><br>

    <section class="container">
      <div class="row">
        <div class="col-md-12">
          <center><h1>Chose which you want to write or upload</h1></center>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form action="writeblog">
            <button type="submit" class="mybtn btn1" href="">
            <img width="130px" class="img-fluid" src="img/blog.png" alt="">
              <hr>
              <h2>Blog</h2>
            </button>
          </form>
        </div>
        <div class="col-md-4">
          <form action="writebook">
            <button type="submit" class="mybtn btn2" href="">
            <img width="130px" class="img-fluid" src="img/books.png" alt="">
              <hr>
              <h2>Book</h2>
            </button>
          </form>
      </div>
      <div class="col-md-4">
          <form action="pdf">
            <button type="submit" class="mybtn btn2" href="">
            <img width="130px" class="img-fluid" src="img/file.png" alt="">
              <hr>
              <h2>Book</h2>
            </button>
          </form>
      </div>
    </div>
  </section>

  <?php 
include "footer.php";
?>