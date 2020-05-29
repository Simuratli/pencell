<?php

ob_start();
session_start();

include_once 'baglan.php';
include '../production/function.php';



if (isset($_POST['kitapekle'])) {


    if ($_FILES['urunfoto_resimyol']['size'] > 203097152) {

        echo "Şəkilin ölçüsü böyükdür..";
        Header("Location:../../posts.php?durum=yuklenmedi");
        exit;
    }


    // blog ekle

    $izinli_uzantilar = array('jpg', 'gif', 'png', 'jpeg');

    echo $ext = strtolower(substr($_FILES['urunfoto_resimyol']["name"], strpos($_FILES['urunfoto_resimyol']["name"], '.') + 1));

    if (in_array($ext, $izinli_uzantilar) === false) {

        Header("Location:../../posts.php?durum=UzantiYanlis");
        exit;
    }


    @$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
    @$name = $_FILES['urunfoto_resimyol']["name"];

    include('SimpleImage.php');
    $image = new SimpleImage();
    $image->load($tmp_name);
    $image->resize(760, 1344);
    $image->save($tmp_name);

    $uploads_dir = '../../dimg/urun';

    $benzersizsayi4 = rand(20000, 32000);
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . "." . $ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");


    $duzenle = $db->prepare("INSERT INTO urun SET

        urunfoto_resimyol=:urunfoto_resimyol,
        kullanici_id=:kullanici_id,
        urun_ad=:urun_ad,
        urun_detay=:urun_detay,
        urun_keyword=:urun_keyword,
        kategori_id=:kategori_id

        ");
    $update = $duzenle->execute(array(
        'kullanici_id' => htmlspecialchars($_SESSION['userkullanici_id']),
        'urun_ad' => htmlspecialchars($_POST['urun_ad']),
        'urun_detay' => $_POST['urun_detay'],
        'urun_keyword' => htmlspecialchars($_POST['urun_keyword']),
        'kategori_id' => htmlspecialchars($_POST['kategori_id']),
        'urunfoto_resimyol' => $refimgyol
    ));



    if ($update) {
        Header("Location:../../posts.php?durum=ok");
    } else {

        Header("Location:../../writebook.php?durum=no");
    }
}




if (isset($_POST['pdfekle'])) {


    if ($_FILES['pdf']['size'] > 203097152) {

        echo "Şəkilin ölçüsü böyükdür..";
        Header("Location:../../posts.php?durum=yuklenmedi");
        exit;
    }


    // blog ekle

    $izinli_uzantilar = array('pdf');

    echo $ext = strtolower(substr($_FILES['pdf']["name"], strpos($_FILES['pdf']["name"], '.') + 1));

    if (in_array($ext, $izinli_uzantilar) === false) {

        Header("Location:../../pdf.php?durum=UzantiYanlis");
        exit;
    }


    @$tmp_name = $_FILES['pdf']["tmp_name"];
    @$name = $_FILES['pdf']["name"];

    include('SimpleImage.php');
    $image = new SimpleImage();
    $image->load($tmp_name);
    $image->resize(760, 1344);
    $image->save($tmp_name);

    $uploads_dir = '../../dimg/urun';

    $benzersizsayi4 = rand(20000, 32000);
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . "." . $ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");



    $duzenle = $db->prepare("INSERT INTO pdf SET

        pdf=:pdf,
        kullanici_id=:kullanici_id,
        pdf_ad=:pdf_ad,
        pdf_detay=:pdf_detay,
        pdf_keyword=:pdf_keyword,
        kategori_id=:kategori_id

        ");
    $update = $duzenle->execute(array(
        'kullanici_id' => htmlspecialchars($_SESSION['userkullanici_id']),
        'pdf_ad' => htmlspecialchars($_POST['pdf_ad']),
        'pdf_detay' => $_POST['pdf_detay'],
        'pdf_keyword' => htmlspecialchars($_POST['pdf_keyword']),
        'kategori_id' => htmlspecialchars($_POST['kategori_id']),
        'pdf' => $refimgyol
    ));



    if ($update) {
        Header("Location:../../pdfs.php?durum=ok");
    } else {

        Header("Location:../../pdfs.php?durum=no");
    }
}






if (isset($_POST['addchapter'])) {

    $chapter_seourl = seo($_POST['chapter_ad']);

    $urun_id = $_POST['urun_id'];
    $chapter_seourl = seo($_POST['chapter_ad']);

    $kaydet = $db->prepare("INSERT INTO chapter SET
		chapter_ad=:chapter_ad,
		chapter_detay=:chapter_detay,
        chapter_seourl=:chapter_seourl,
		urun_id=:urun_id");
    $insert = $kaydet->execute(array(
        'chapter_ad' => $_POST['chapter_ad'],
        'chapter_detay' => $_POST['chapter_detay'],
        'chapter_seourl' => $chapter_seourl,
        'urun_id' => $_POST['urun_id'],
    ));


    $urun_id = $_POST['urun_id'];
    if ($insert) {



        Header("Location:../../bookdetail.php?durum=ok&urun_id=$urun_id");
    } else {

        Header("Location:../../bookdetail.php?durum=no&urun_id=$urun_id");
    }
}


// CHAPTER DUZENLE




if (isset($_POST['chapterduzenle'])) {

    $chapter_seourl = seo($_POST['chapter_ad']);

    $urun_id = $_POST['urun_id'];
    $chapter_seourl = seo($_POST['chapter_ad']);

    $kaydet = $db->prepare("UPDATE chapter SET
		chapter_ad=:chapter_ad,
		chapter_detay=:chapter_detay,
        chapter_seourl=:chapter_seourl
        WHERE chapter_id={$_POST['chapter_id']}");
    $insert = $kaydet->execute(array(
        'chapter_ad' => $_POST['chapter_ad'],
        'chapter_detay' => $_POST['chapter_detay'],
        'chapter_seourl' => $chapter_seourl
    ));

    $chapter_id = $_POST['chapter_id'];
    if ($insert) {



        Header("Location:../../editchapter.php?durum=ok&chapter_id=$chapter_id");
    } else {

        Header("Location:../../editchapter.php?durum=no&chapter_id=$chapter_id");
    }
}




// Kitap resim guncelle







if (isset($_POST['updatebookcover'])) {



    if ($_FILES['urunfoto_resimyol']['size'] > 203097152) {

        echo "Şəkilin ölçüsü böyükdür..";
        Header("Location:../../books.php?durum=yuklenmedi");
        exit;
    }



    $izinli_uzantilar = array('jpg', 'gif', 'png', 'jpeg');

    $ext = strtolower(substr($_FILES['urunfoto_resimyol']["name"], strpos($_FILES['urunfoto_resimyol']["name"], '.') + 1));

    if (in_array($ext, $izinli_uzantilar) === false) {

        Header("Location:../../books.php?durum=UzantiYanlis");
        exit;
    }


    @$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
    @$name = $_FILES['urunfoto_resimyol']["name"];

    include('SimpleImage.php');
    $image = new SimpleImage();
    $image->load($tmp_name);
    $image->resize(760, 1344);
    $image->save($tmp_name);

    $uploads_dir = '../../dimg/urun';

    $benzersizsayi4 = rand(20000, 32000);
    $refimgyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . "." . $ext;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");


    $duzenle = $db->prepare("UPDATE urun SET

        urunfoto_resimyol=:urunfoto_resimyol
       
        WHERE urun_id={$_POST['urun_id']}");


    $update = $duzenle->execute(array(
        'urunfoto_resimyol' => $refimgyol
    ));


    $urun_id = $_POST['urun_id'];
    if ($update) {

        $resimsilunlink = $_POST['eski_yol'];
        unlink("../../$resimsilunlink");

        Header("Location:../../bookdetail.php?durum=ok&urun_id=$urun_id");
    } else {

        Header("Location:../../bookdetail.php?durum=ok&urun_id=$urun_id");
    }
}

if (isset($_POST['kitapadduzenle'])) {

    $urun_id = $_POST['urun_id'];
    $urun_seourl = seo($_POST['urun_ad']);


    $duzenle = $db->prepare("UPDATE urun SET

    urun_ad=:urun_ad,
    urun_detay=:urun_detay,
    urun_keyword=:urun_keyword,
    urun_author=:urun_author,
    kategori_id=:kategori_id

WHERE urun_id={$_POST['urun_id']}");


    $update = $duzenle->execute(array(
        'urun_ad' => htmlspecialchars($_POST['urun_ad']),
        'urun_detay' => $_POST['urun_detay'],
        'urun_keyword' => htmlspecialchars($_POST['urun_keyword']),
        'urun_author' => htmlspecialchars($_POST['urun_author']),
        'kategori_id' => htmlspecialchars($_POST['kategori_id'])
    ));

    if ($update) {

        Header("Location:../../bookdetail.php?durum=ok&urun_id=$urun_id");
    } else {
        Header("Location:../../bookdetail.php?durum=no&urun_id=$urun_id");
    }
}



if (isset($_POST['chapterpoint'])) {


    $gelen_url = $_POST['gelen_url'];
  

        $ayarkaydet = $db->prepare("INSERT INTO liked SET
        
        chapter_id=:chapter_id,
        kullanici_id=:kullanici_id,
        liked=:liked
        ");


        $update = $ayarkaydet->execute(array(


            'chapter_id' => $_POST['chapter_id'],
            'kullanici_id' => $_SESSION['userkullanici_id'],
            'liked' => $_POST['liked']

        ));

    $chapter_ad = $_POST['chapter_seourl'];
    $chapter_id = $_POST['chapter_id'];
    if ($update) {

        Header("Location:$gelen_url?durum=ok");
    } else {
        Header("Location:$gelen_url?durum=no");
    }
}


if (isset($_POST['blogpoint'])) {


    $gelen_url = $_POST['gelen_url'];
  

        $ayarkaydet = $db->prepare("INSERT INTO liked SET
        
        blog_id=:blog_id,
        kullanici_id=:kullanici_id,
        liked=:liked
        ");


        $update = $ayarkaydet->execute(array(


            'blog_id' => $_POST['blog_id'],
            'kullanici_id' => $_SESSION['userkullanici_id'],
            'liked' => $_POST['liked']

        ));

    
    if ($update) {

        Header("Location:$gelen_url?durum=ok");
    } else {
        Header("Location:$gelen_url?durum=no");
    }
}


?>