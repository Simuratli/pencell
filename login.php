<?php

include 'header.php';

?>
<br>
<br>
<meta property="og:title" content="LOG IN" />
<div class="row">
  <div class="col-md-12">
  <?php
                        
                        if($_GET['durum']=="logincorrectly"){
                          echo " <div class='alert display-4 alert-success'>Register Succesfully! Pleace Log in!</div>";
                        }else if($_GET['durum']=='basarisizgiris'){
                            echo " <div class='alert display-4 alert-danger'>Anything is wrong!</div>";
                        }
                        else if($_GET['durum']=='exit'){
                          echo " <div class='alert display-4 alert-success'>You are Logout succesfully!</div>";
                      }else if($_GET['durum']=='whatIsWrongWithYou'){
                        echo " <div class='alert alert-danger'>Anything is wrong!</div>";
                    }
                    else if($_GET['durum']=='similar'){
                        echo " <div class='alert alert-danger'>You already have a account!</div>";
                    }

                    else if($_GET['durum']=='missingPassword'){
                        echo " <div class='alert alert-danger'>Password is wrong!</div>";
                    }
                   else if($_GET['durum']=='differentPassword'){
                         echo " <div class='alert alert-danger'>Anything is wrong!</div>";
                    }else if($_GET['durum']=='login'){
                        echo " <div class='alert alert-danger'>Pleace Log in or Register</div>";
                   }
                       
                        
                        ?>

  </div>
    <div class="col-md-6">
         <div class="row d-flex justify-content-center">
            <br>
           <div class="col-md-12 card p-4  pb-5">

                    <center>
                        <h1>LOGIN</h1>
                    </center>
                
                    <form method="post" action="admin/netting/kullanici.php">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input name="kullanici_mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input name="kullanici_password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <center>
                          <button name="kullanicigiris" type="submit" class="btn btn-dark">Login</button>
                        </center>
                        <br>
                        <center>
                            <p>Or</p>
                        </center>
                    </form>

                   <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-dark">Register</button>
           </div>
        </div>

    </div>

           <div class="col-md-6">
                <img  class="img-fluid" src="img/log.png">
           </div>

</div>
       <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
           <div class="modal-body">
                            <form method="POST" action="admin/netting/kullanici.php">
                   <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input name="kullanici_ad" type="text" class="form-control"  placeholder="Enter username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="kullanici_mail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="kullanici_passwordone" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                                            <div class="form-group">
                        <label for="exampleInputPassword2">Password again</label>
                        <input name="kullanici_passwordtwo" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password again">
                      </div>
                      <div class="form-check">
                      </div>
                <center>

                      
                      
            </center>

            <div class="modal-footer">
            <button name="kullanicikaydet" type="submit" class="btn btn-dark">Regsiter</button>
      </div>

                    </form>
      </div>
 
    </div>
  </div>
</div>
    </div>


    <?php

include 'footer.php';

?>