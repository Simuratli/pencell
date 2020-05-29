<?php
include 'admin/netting/baglan.php';
include 'admin/production/function.php';

$ayarsor = $db->prepare("SELECT * from ayar where ayar_id=:id");
$ayarsor->execute(array(
    'id' => 0
));

$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
    'mail' => $_SESSION['userkullanici_mail']
));
$say = $kullanicisor->rowCount();
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

//  Kullanici_id tehlukesiz istifade
if (!isset($_SESSION['userkullanici_id'])) {
    $_SESSION['userkullanici_id'] = $kullanicicek['kullanici_id'];
}



$hakkimizdasor = $db->prepare("SELECT * from hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute(array(
    'id' => 0
));

$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);




?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta taglari -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:title" content="<?php echo $uruncek['urun_ad']; ?>" />
    <meta property="og:type" content="blog" />
    <meta property="og:url" content="<?php echo "http://" . $_SERVER['HTTP_HOST'] . "" . $_SERVER['REQUEST_URI'] . ""; ?>" />
    <meta property="og:image" content="https://resim.cokbilgi.com/yazi/mitoloji-efsane.jpg" />
    <meta property="og:site_name" content="ÇokBilgi.Com | Türkçe ve edebiyat  günlüğüm..." />
    <meta property="fb:admins" content="https://www.facebook.com/bilgisacarim" />
    <meta property="og:description" content="Efsane Nedir? - Açıklama Tarihsel  Gelişimi ve Temsilcileri Ay Atam Efsanesi Tufan Efsanesi Yaratılış Efsaneleri Karacaoğlan Efsanesi Leyla ile Mecnun Efsanesi Kerem ile Aslı Efsanesi Ferhat ile Şirin" />
    <meta property="article:publisher" content="https://www.facebook.com/bilgisacarim" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@orkunkutlu" />
    <meta name="twitter:domain" content="twitter.com/orkunkutlu" />
    <meta name="twitter:description" content="Efsane Nedir? - Açıklama Tarihsel  Gelişimi ve Temsilcileri Ay Atam Efsanesi Tufan Efsanesi Yaratılış Efsaneleri Karacaoğlan Efsanesi Leyla ile Mecnun Efsanesi Kerem ile Aslı Efsanesi Ferhat ile Şirin" />
    <meta itemprop="image" content="https://resim.cokbilgi.com/yazi/mitoloji-efsane.jpg" />
    <link rel='shortlink' href='https://www.cokbilgi.com/?p=1988' />
    <!-- Meta taglari -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baskervville&display=swap" rel="stylesheet">
    <script src="ckeditor/ckeditor.js"></script>
    <link href="swiper/swiper.min.css" rel="stylesheet">
    <link href="swiper/swipe.css" rel="stylesheet">
    <link href="img/book.png" rel="shortcut icon" />


    <!-- NEW LINKS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="froala/css/froala_editor.css">
  <link rel="stylesheet" href="froala/css/froala_style.css">
  <link rel="stylesheet" href="froala/css/plugins/code_view.css">
  <link rel="stylesheet" href="froala/css/plugins/colors.css">
  <link rel="stylesheet" href="froala/css/plugins/emoticons.css">
  <link rel="stylesheet" href="froala/css/plugins/image_manager.css">
  <link rel="stylesheet" href="froala/css/plugins/image.css">
  <link rel="stylesheet" href="froala/css/third_party/embedly.min.css">
  <link rel="stylesheet" href="froala/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="froala/css/plugins/table.css">
  <link rel="stylesheet" href="froala/css/plugins/char_counter.css">
  <link rel="stylesheet" href="froala/css/plugins/video.css">
  <link rel="stylesheet" href="froala/css/plugins/fullscreen.css">
  <link rel="stylesheet" href="froala/css/plugins/file.css">
  <link rel="stylesheet" href="froala/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  <link rel="stylesheet" href="froala/js/third_party/embedly.min.js">



    <title>Buttocker</title>
</head>
<style>
    ::selection {
        background-color: orange;
        color: white;
    }
    div#editor {
      width: 100%;
      margin: auto;
      text-align: left;
    }
</style>
 

<body>
    <section class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="index">BUTTOCKER</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php

                    $kategorisor = $db->prepare("SELECT * from kategori limit 4 ");
                    $kategorisor->execute();
                    while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="category-<?= seo($kategoricek['kategori_ad']) . '-' . $kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_ad'] ?> <span class="sr-only">(current)</span></a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link " href="categories">More</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="about">About us</a>
                    </li>

                    <?php
                    if (isset($_SESSION['userkullanici_mail'])) {


                        ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <b class="name"><?php echo $kullanicicek['kullanici_ad'] ?></b>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    <div class="imgbox">
                                        <img class="img-fluid" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>">
                                    </div>
                                    <span class="namepsan"><?php echo $kullanicicek['kullanici_ad'] ?></span>
                                </a>
                                <a class="dropdown-item" href="account">Account</a>
                                <a class="dropdown-item" href="posts">POSTS</a>
                                <a class="dropdown-item" href="chose">Write</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item " href="logout">Logout</a>
                            </div>
                        </li>
                </ul>

                <form method="POST" action="search" class="form-inline my-2 my-lg-0">
                    <div class="form-group">
                        <input name="searched" class="form-control" placeholder="Search" type="text">
                        <button name="search" type="submit" class="btn ml-1 mr-1 btn-warning"><i class="fa fa-search"></i></button>
                    </div>
                    <div class="imgbox2">
                        <img class="img-fluid" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>" alt="">
                    </div>
                </form>

            <?php
            } else {

                ?>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-warning my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    <a class="btn btn-dark my-2  mr-sm-2 ml-2" href="login">Login</a>
                </form>

            <?php }


            ?>
            </div>
        </nav>




