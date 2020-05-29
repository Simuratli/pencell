<?php

ob_start();
session_start();

include_once 'baglan.php';
include '../production/function.php'; 



if (isset($_POST['kullaniciresimguncelle'])) {


    if ($_FILES['kullanici_magazafoto']['size']>2097152) {

        echo "Şəkilin ölçüsü böyükdür..";
        Header("Location:../../account.php?durum=yuklenmedi");
        exit;

        
    }


    $izinli_uzantilar=array('jpg','gif','png','jpeg');

    echo $ext=strtolower(substr($_FILES['kullanici_magazafoto']["name"],strpos($_FILES['kullanici_magazafoto']["name"],'.')+1));

    if (in_array($ext,$izinli_uzantilar)=== false) {
        
        Header("Location:../../account.php?durum=UzantiYanlis");
        exit;
    }


    @$tmp_name = $_FILES['kullanici_magazafoto']["tmp_name"];
    @$name = $_FILES['kullanici_magazafoto']["name"];

    include ('SimpleImage.php');
    $image = new SimpleImage();
    $image -> load($tmp_name);
    $image -> resize(480,480);
    $image -> save($tmp_name);

    $uploads_dir = '../../dimg/userimg';

    $benzersizsayi4=rand(20000,32000);
    $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.".".$ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");


    $duzenle=$db->prepare("UPDATE kullanici SET
        kullanici_magazafoto=:kullanici_magazafoto
        WHERE kullanici_id={$_SESSION['userkullanici_id']}");
    $update=$duzenle->execute(array(
        'kullanici_magazafoto' => $refimgyol
    ));



    if ($update) {

        $resimsilunlink=$_POST['eski_yol'];
        unlink("../../$resimsilunlink");

        Header("Location:../../account.php?durum=ok");

    } else {

        Header("Location:../../account.php?durum=no");
    }

}







 

if (isset($_POST['blogekle'])) {

    $blog_seourl=seo($_POST['blog_ad']);
    if ($_FILES['blogfoto_resimyol']['size']>203097152) {

        echo "Şəkilin ölçüsü böyükdür..";
        Header("Location:../../posts.php?durum=yuklenmedi");
        exit;

        
    }


    // blog ekle

    $izinli_uzantilar=array('jpg','gif','png','jpeg');

    echo $ext=strtolower(substr($_FILES['blogfoto_resimyol']["name"],strpos($_FILES['blogfoto_resimyol']["name"],'.')+1));

    if (in_array($ext,$izinli_uzantilar)=== false) {
        
        Header("Location:../../posts.php?durum=UzantiYanlis");
        exit;
    }


    @$tmp_name = $_FILES['blogfoto_resimyol']["tmp_name"];
    @$name = $_FILES['blogfoto_resimyol']["name"];

    include ('SimpleImage.php');
    $image = new SimpleImage();
    $image -> load($tmp_name);
    $image -> resize(1344,760);
    $image -> save($tmp_name);

    $uploads_dir = '../../dimg/blog';

    $benzersizsayi4=rand(20000,32000);
    $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.".".$ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");


    $duzenle=$db->prepare("INSERT INTO blog SET

        blogfoto_resimyol=:blogfoto_resimyol,
        kullanici_id=:kullanici_id,
        blog_ad=:blog_ad,
        blog_detay=:blog_detay,
        blog_seourl=:blog_seourl,
        blog_keyword=:blog_keyword,
        blog_author=:blog_author,
        kategori_id=:kategori_id

        ");
    $update=$duzenle->execute(array(
        'kullanici_id' => htmlspecialchars($_SESSION['userkullanici_id']),
        'blog_ad' => htmlspecialchars($_POST['blog_ad'],ENT_COMPAT, 'UTF-8'),
        'blog_detay' => $_POST['blog_detay'],
        'blog_keyword' => htmlspecialchars($_POST['blog_keyword']),
        'blog_author' => htmlspecialchars($_POST['blog_author']),
        'blog_seourl' => $blog_seourl,
        'kategori_id' => htmlspecialchars($_POST['kategori_id']),
        'blogfoto_resimyol' => $refimgyol
    ));



    if ($update) {
        Header("Location:../../posts.php?durum=ok");

    } else {

        Header("Location:../../writeblog.php?durum=no");
    }

}




// Kitap ekle




if (isset($_POST['kitapekle'])) {

    $urun_seourl=seo($_POST['urun_ad']);

    if ($_FILES['urunfoto_resimyol']['size']>203097152) {

        echo "Şəkilin ölçüsü böyükdür..";
        Header("Location:../../posts.php?durum=yuklenmedi");
        exit;

        
    }


    // urun ekle
    

    $izinli_uzantilar=array('jpg','gif','png','jpeg');

    echo $ext=strtolower(substr($_FILES['urunfoto_resimyol']["name"],strpos($_FILES['urunfoto_resimyol']["name"],'.')+1));

    if (in_array($ext,$izinli_uzantilar)=== false) {
        
        Header("Location:../../posts.php?durum=UzantiYanlis");
        exit;
    }


    @$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
    @$name = $_FILES['urunfoto_resimyol']["name"];

    include ('SimpleImage.php');
    $image = new SimpleImage();
    $image -> load($tmp_name);
    $image -> resize(960,960);
    $image -> save($tmp_name);

    $uploads_dir = '../../dimg/urun';

    $benzersizsayi4=rand(20000,32000);
    $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.".".$ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");


    $duzenle=$db->prepare("INSERT INTO urun SET

        urunfoto_resimyol=:urunfoto_resimyol,
        kullanici_id=:kullanici_id,
        urun_ad=:urun_ad,
        urun_detay=:urun_detay,
        urun_sourl=:urun_sourl,
        urun_keyword=:urun_keyword,
        urun_author=:urun_author,
        kategori_id=:kategori_id

        ");
    $update=$duzenle->execute(array(
        'kullanici_id' => htmlspecialchars($_SESSION['userkullanici_id']),
        'urun_ad' => htmlspecialchars($_POST['urun_ad']),
        'urun_detay' => $_POST['urun_detay'],
        'urun_keyword' => htmlspecialchars($_POST['urun_keyword']),
        'urun_seourl' => $urun_seourl,
        'urun_author' => htmlspecialchars($_POST['urun_author']),
        'kategori_id' => htmlspecialchars($_POST['kategori_id']),
        'urunfoto_resimyol' => $refimgyol
    ));



    if ($update) {
        Header("Location:../../posts.php?durum=ok");

    } else {

        Header("Location:../../writebook.php?durum=no");
    }

}





// BLOG EDIT





if (isset($_POST['blogduzenle'])) {
    $blog_seourl=seo($_POST['blog_ad']);
    if ($_FILES['blogfoto_resimyol']['size']>0) { 
    
        if ($_FILES['blogfoto_resimyol']['size']>203097152) {
    
            echo "Şəkilin ölçüsü böyükdür..";
            Header("Location:../../editblog.php?durum=yuklenmedi");
            exit;
    
            
        }
    
    
        // blog ekle
    
        $izinli_uzantilar=array('jpg','gif','png','jpeg');
    
        echo $ext=strtolower(substr($_FILES['blogfoto_resimyol']["name"],strpos($_FILES['blogfoto_resimyol']["name"],'.')+1));
    
        if (in_array($ext,$izinli_uzantilar)=== false) {
            
            Header("Location:../../editblog.php?durum=UzantiYanlis");
            exit;
        }
    
    
        @$tmp_name = $_FILES['blogfoto_resimyol']["tmp_name"];
        @$name = $_FILES['blogfoto_resimyol']["name"];
    
        include ('SimpleImage.php');
        $image = new SimpleImage();
        $image -> load($tmp_name);
        $image -> resize(1344,760);
        $image -> save($tmp_name);
    
        $uploads_dir = '../../dimg/blog';
    
        $benzersizsayi4=rand(20000,32000);
        $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.".".$ext;
    
        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");
    
    
        $duzenle=$db->prepare("UPDATE blog SET
    
            blogfoto_resimyol=:blogfoto_resimyol,
            blog_ad=:blog_ad,
            blog_detay=:blog_detay,
            blog_keyword=:blog_keyword,
            blog_seourl=:blog_seourl,
            blog_author=:blog_author,
            kategori_id=:kategori_id
    
        WHERE blog_id={$_POST['blog_id']}");
    
    
        $update=$duzenle->execute(array(
            'blog_ad' => htmlspecialchars($_POST['blog_ad']),
            'blog_detay' => $_POST['blog_detay'],
            'blog_keyword' => htmlspecialchars($_POST['blog_keyword']),
            'blog_author' => htmlspecialchars($_POST['blog_author']),
            'kategori_id' => htmlspecialchars($_POST['kategori_id']),
            'blog_seourl' => $blog_seourl,
            'blogfoto_resimyol' => $refimgyol
        ));
    
    
    
        if ($update) {
            
			$resimsilunlink=$_POST['eski_yol'];
            unlink("../../$resimsilunlink");
            
            Header("Location:../../blogs.php?durum=ok");
    
        } else {
    
            Header("Location:../../editblog.php?durum=no");
        }
   
         }else {
            // IF WITHOUT PHOTO


            
        $duzenle=$db->prepare("UPDATE blog SET
    
        blog_ad=:blog_ad,
        blog_detay=:blog_detay,
        blog_keyword=:blog_keyword,
        blog_seourl=:blog_seourl,
        blog_author=:blog_author,
        kategori_id=:kategori_id

    WHERE blog_id={$_POST['blog_id']}");


    $update=$duzenle->execute(array(
        'blog_ad' => htmlspecialchars($_POST['blog_ad']),
        'blog_seourl' =>$blog_seourl,
        'blog_detay' => $_POST['blog_detay'],
        'blog_keyword' => htmlspecialchars($_POST['blog_keyword']),
        'blog_author' => htmlspecialchars($_POST['blog_author']),
        'kategori_id' => htmlspecialchars($_POST['kategori_id'])
    ));



    if ($update) {
        
        
        Header("Location:../../blogs.php?durum=ok");

    } else {

        Header("Location:../../editblog.php?durum=no");
    }

        }
    
    }
    
    
 
    // Publish Blogs

    
	if ($_GET['blog_durum']=="ok") {




		$duzenle=$db->prepare("UPDATE blog SET

			blog_durum=:blog_durum

			WHERE blog_id={$_GET['blog_id']}");

		$update=$duzenle->execute(array(


			'blog_durum' => $_GET['blog_one']
		));



		if ($update) {



			Header("Location:../../blogs.php?durum=ok");

		} else {

			Header("Location:../../blogs.php?durum=no");
		}

	}

    // DELETING BLOG

    




	if ($_GET['blogsil']=="ok") {

		$sil=$db->prepare("DELETE from blog where blog_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['blog_id']
		));




		if ($kontrol) {
			header("Location:../../blogs.php?durumsil=ok");
		}else {
			header("Location:../../blogs.php?durumsil=no");

		}
	}



    // DELETING BOOK

    
	if ($_GET['urunsil']=="ok") {

		$sil=$db->prepare("DELETE from urun where urun_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['urun_id']
		));




		if ($kontrol) {
			header("Location:../../books.php?durumsil=ok");
		}else {
			header("Location:../../books.php?durumsil=no");

		}
	}





    // Publish books

    
	if ($_GET['urun_durum']=="ok") {




		$duzenle=$db->prepare("UPDATE urun SET

			urun_durum=:urun_durum

			WHERE urun_id={$_GET['urun_id']}");

		$update=$duzenle->execute(array(


			'urun_durum' => $_GET['urun_one']
		));



		if ($update) {



			Header("Location:../../books.php?durum=ok");

		} else {

			Header("Location:../../books.php?durum=no");
		}

	}



    if ($_GET['urun_onecikar']=="ok") {




        $duzenle=$db->prepare("UPDATE urun SET
    
            urun_onecikar=:urun_onecikar
    
            WHERE urun_id={$_GET['urun_id']}");
    
        $update=$duzenle->execute(array(
    
    
            'urun_onecikar' => $_GET['urun_one']
        ));
    
    
    
        if ($update) {
    
    
    
            Header("Location:../production/products.php?durum=ok");
    
        } else {
    
            Header("Location:../production/products.php?durum=no");
        }
    
    }
    
    

    if ($_GET['kategori_onecikar']=="ok") {




        $duzenle=$db->prepare("UPDATE kategori SET
    
            kategori_onecikar=:kategori_onecikar
    
            WHERE kategori_id={$_GET['kategori_id']}");
    
        $update=$duzenle->execute(array(
    
    
            'kategori_onecikar' => $_GET['kategori_one']
        ));
    
    
    
        if ($update) {
    
    
    
            Header("Location:../production/categories.php?durum=ok");
    
        } else {
    
            Header("Location:../production/categories.php?durum=no");
        }
    
    }
    
    



    if ($_GET['blog_onecikar']=="ok") {




        $duzenle=$db->prepare("UPDATE blog SET
    
            blog_onecikar=:blog_onecikar
    
            WHERE blog_id={$_GET['blog_id']}");
    
        $update=$duzenle->execute(array(
    
    
            'blog_onecikar' => $_GET['blog_one']
        ));
    
    
    
        if ($update) {
    
    
    
            Header("Location:../production/blogs.php?durum=ok");
    
        } else {
    
            Header("Location:../production/blogs.php?durum=no");
        }
    
    }
    

?>