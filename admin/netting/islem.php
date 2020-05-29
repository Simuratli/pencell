<?php 

ob_start();
session_start();

include_once 'baglan.php';
include '../production/function.php'; 

if (isset($_POST['admingiris'])) {

	$kullanici_mail=  $_POST['kullanici_mail'];
	echo $kullanici_password= md5($_POST['kullanici_password']);



	$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(

		'mail'=>$kullanici_mail,
		'password'=>$kullanici_password,
		'yetki'=>5
	));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {


		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
	}
	else {

		header("Location:../production/login.php?durum=no");}
		exit;
	}



	if (isset($_POST['genelayarkaydet'])) {
		iskontrol();

		$ayarkaydet=$db->prepare("UPDATE ayar set

			ayar_title=:ayar_title,
			ayar_description=:ayar_description,
			ayar_keywords=:ayar_keywords,
			ayar_author=:ayar_author

			where ayar_id=0");

		$update=$ayarkaydet->execute(array(

			'ayar_title' => $_POST['ayar_title'],
			'ayar_description' => $_POST['ayar_description'],
			'ayar_keywords' => $_POST['ayar_keywords'],
			'ayar_author' => $_POST['ayar_author']
		));


		if ($update) {

			header("Location:../production/general-setting.php?durum=ok");
		}
		else {
			header("Location:../production/general-setting.php?durum=no");
		}

	}




//iletisim  
	if (isset($_POST['iletisimayarkaydet'])) {
		iskontrol();
		$ayarkaydet=$db->prepare("UPDATE ayar set

			ayar_tel=:ayar_tel,
			ayar_mail=:ayar_mail,
			ayar_whatsapp=:ayar_whatsapp,
			ayar_adress=:ayar_adress

			where ayar_id=0");

		$update=$ayarkaydet->execute(array(

			'ayar_tel' => $_POST['ayar_tel'],
			'ayar_mail' => $_POST['ayar_mail'],
			'ayar_whatsapp' => $_POST['ayar_whatsapp'],
			'ayar_adress' => $_POST['ayar_adress']

		));


		if ($update) {

			header("Location:../production/contact.php?durum=ok");
		}
		else {
			header("Location:../production/contact.php?durum=no");
		}

	}






//API 
	if (isset($_POST['apiayarkaydet'])) {
		iskontrol();
		$ayarkaydet=$db->prepare("UPDATE ayar set

			ayar_maps=:ayar_maps,
			ayar_analystic=:ayar_analystic,
			ayar_zopim=:ayar_zopim

			where ayar_id=0");

		$update=$ayarkaydet->execute(array(

			'ayar_maps' => $_POST['ayar_maps'],
			'ayar_analystic' => $_POST['ayar_analystic'],
			'ayar_zopim' => $_POST['ayar_zopim']

		));


		if ($update) {

			header("Location:../production/api-ayar.php?durum=ok");
		}
		else {
			header("Location:../production/api-ayar.php?durum=no");
		}

	}





 //Sosial ayarlar
	if (isset($_POST['sosialayarkaydet'])) {
		iskontrol();
		$ayarkaydet=$db->prepare("UPDATE ayar SET

			ayar_facebook=:ayar_facebook,
			ayar_twitter=:ayar_twitter,
			ayar_google=:ayar_google,
			ayar_youtube=:ayar_youtube

			where ayar_id=0");

		$update=$ayarkaydet->execute(array(

			'ayar_facebook' => $_POST['ayar_facebook'],
			'ayar_twitter' => $_POST['ayar_twitter'],
			'ayar_google' => $_POST['ayar_google'],
			'ayar_youtube' => $_POST['ayar_youtube']

		));


		if ($update) {

			header("Location:../production/social-media.php?durum=ok");
		}
		else {
			header("Location:../production/social-media.php?durum=no");
		}

	}




//Mail ayarlar
	if (isset($_POST['mailayarkaydet'])) {
		iskontrol();
		$ayarkaydet=$db->prepare("UPDATE ayar SET

			ayar_smtpuser=:ayar_smtpuser,
			ayar_smtphost=:ayar_smtphost,
			ayar_smtppassword=:ayar_smtppassword,
			ayar_smtpport=:ayar_smtpport

			where ayar_id=0");

		$update=$ayarkaydet->execute(array(

			'ayar_smtpuser' => $_POST['ayar_smtpuser'],
			'ayar_smtphost' => $_POST['ayar_smtphost'],
			'ayar_smtppassword' => $_POST['ayar_smtppassword'],
			'ayar_smtpport' => $_POST['ayar_smtpport']

		));


		if ($update) {

			header("Location:../production/mail-ayar.php?durum=ok");
		}
		else {
			header("Location:../production/mail-ayar.php?durum=no");
		}

	}












//Hakkimizda ayarlar
	if (isset($_POST['hakkimizdakaydet'])) {
		iskontrol();
		$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET

			hakkimizda_baslik=:hakkimizda_baslik,
			hakkimizda_icerik=:hakkimizda_icerik,
			hakkimizda_misyon=:hakkimizda_misyon,
			hakkimizda_vizyon=:hakkimizda_vizyon,
			hakkimizda_video=:hakkimizda_video

			");

		$update=$hakkimizdakaydet->execute(array(

			'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
			'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
			'hakkimizda_misyon' => $_POST['hakkimizda_misyon'],
			'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
			'hakkimizda_video'=> $_POST['hakkimizda_video']

		));


		if ($update) {

			header("Location:../production/about.php?durum=ok");
		}
		else {
			header("Location:../production/about.php?durum=no");
		}

	}




	if (isset($_POST['kullaniciduzenle'])) {
		iskontrol();
		$kullanici_id=$_POST['kullanici_id'];

		$ayarkaydet=$db->prepare("UPDATE kullanici SET
			kullanici_tc=:kullanici_tc,
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_durum=:kullanici_durum
			WHERE kullanici_id={$_POST['kullanici_id']}");


		$update=$ayarkaydet->execute(array(

			'kullanici_tc'=>$_POST['kullanici_tc'],
			'kullanici_adsoyad'=>$_POST['kullanici_adsoyad'],
			'kullanici_durum'=>$_POST['kullanici_durum']

		));


		if ($update) {

			Header("Location:../production/kullanici-ayar.php?kullanici_id=$kullanici_id&durum=ok");
		} else {
			Header("Location:../production/kullanici-ayar.php?kullanici_id=$kullanici_id&durum=no");
		}




	}

	if ($_GET['kullanicisil']=="ok") {
		iskontrol();
		$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['kullanici_id']
		));




		if ($kontrol) {
			header("Location:../production/kullanicilar.php?durumsil=ok");
		}else {
			header("Location:../production/kullanicilar.php?durumsil=no");

		}
	}

	if (isset($_POST['menuduzenle'])) {

		$menu_id=$_POST['menu_id'];
		$menu_seourl=seo($_POST['menu_ad']);


		$ayarkaydet=$db->prepare("UPDATE menu SET
			menu_ad=:menu_ad,
			menu_detay=:menu_detay,
			menu_url=:menu_url,
			menu_sira=:menu_sira,
			menu_seourl=:menu_seourl,
			menu_durum=:menu_durum
			WHERE menu_id={$_POST['menu_id']}");


		$update=$ayarkaydet->execute(array(

			'menu_ad' => $_POST['menu_ad'],
			'menu_detay' => $_POST['menu_detay'],
			'menu_url' => $_POST['menu_url'],
			'menu_sira' => $_POST['menu_sira'],
			'menu_seourl' => $menu_seourl,
			'menu_durum' => $_POST['menu_durum']

		));


		if ($update) {

			Header("Location:../production/menuler.php?menu_id=$menu_id&durum=ok");
		} else {
			Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
		}
	}

	if ($_GET['menusil']=="ok") {
		iskontrol();
		$sil=$db->prepare("DELETE from menu where menu_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['menu_id']
		));




		if ($kontrol) {
			header("Location:../production/menuler.php?durumsil=ok");
		}else {
			header("Location:../production/menuler.php?durumsil=no");

		}
	}

	if (isset($_POST['menukaydet'])) {
		iskontrol();
		$menu_seourl=seo($_POST['menu_ad']);


		$menuekle=$db->prepare("INSERT INTO  menu SET
			menu_ad=:menu_ad,
			menu_detay=:menu_detay,
			menu_url=:menu_url,
			menu_sira=:menu_sira,
			menu_seourl=:menu_seourl,
			menu_durum=:menu_durum
			");


		$insert=$menuekle->execute(array(

			'menu_ad' => $_POST['menu_ad'],
			'menu_detay' => $_POST['menu_detay'],
			'menu_url' => $_POST['menu_url'],
			'menu_sira' => $_POST['menu_sira'],
			'menu_seourl' => $menu_seourl,
			'menu_durum' => $_POST['menu_durum']

		));


		if ($insert) {

			header("Location:../production/menuler.php?menu_id=$menu_id&durum=ok");
		} else {
			header("Location:../production/menuler.php?menu_id=$menu_id&durum=no");
		}
	}

	if (isset($_POST['logoduzenle'])) {


		if ($_FILES['ayar_logo']['size']>2097152) {

			echo "Şəkilin ölçüsü böyükdür..";
			Header("Location:../production/genel-ayar.php?durum=yuklenmedi");
			exit;

			
		}


		$izinli_uzantilar=array('jpg','gif','png');

		echo $ext=strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"],'.')+1));

		if (in_array($ext,$izinli_uzantilar)=== false) {
			
			Header("Location:../production/genel-ayar.php?durum=UzantiYanlis");
			exit;
		}

		


		$uploads_dir = '../../dimg';

		@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
		@$name = $_FILES['ayar_logo']["name"];

		$benzersizsayi4=rand(20000,32000);
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


		$duzenle=$db->prepare("UPDATE ayar SET
			ayar_logo=:logo
			WHERE ayar_id=0");
		$update=$duzenle->execute(array(
			'logo' => $refimgyol
		));



		if ($update) {

			$resimsilunlink=$_POST['eski_yol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/general-setting.php?durum=ok");

		} else {

			Header("Location:../production/general-setting.php?durum=no");
		}

	}


	if (isset($_POST['sliderkaydet'])) {

		iskontrol();
		$uploads_dir = '../../dimg/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);	
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


		$kaydet=$db->prepare("INSERT INTO slider SET
			slider_ad=:slider_ad,
			slider_sira=:slider_sira,
			slider_qiymet=:slider_qiymet,
			slider_detay=:slider_detay,
			slider_link=:slider_link,
			slider_resimyol=:slider_resimyol
			");
		$insert=$kaydet->execute(array(
			'slider_ad' => $_POST['slider_ad'],
			'slider_sira' => $_POST['slider_sira'],
			'slider_detay' => $_POST['slider_detay'],
			'slider_qiymet' => $_POST['slider_qiymet'],
			'slider_link' => $_POST['slider_link'],
			'slider_resimyol' => $refimgyol
		));

		if ($insert) {

			Header("Location:../production/slider.php?durum=ok");

		} else {

			Header("Location:../production/slider.php?durum=no");
		}




	}


	if (isset($_POST['sliderduzenle'])) {
		iskontrol();
		$kullanici_id=$_POST['slider_id'];

		$ayarkaydet=$db->prepare("UPDATE slider SET
			slider_ad=:slider_ad,
			slider_sira=:slider_sira,
			slider_link=:slider_link,
			slider_detay=:slider_detay,
			slider_qiymet=:slider_qiymet,
			slider_durum=:slider_durum
			WHERE slider_id={$_POST['slider_id']}");


		$update=$ayarkaydet->execute(array(

			'slider_ad'=>$_POST['slider_ad'],
			'slider_sira'=>$_POST['slider_sira'],
			'slider_detay' => $_POST['slider_detay'],
			'slider_qiymet'=>$_POST['slider_qiymet'],
			'slider_link'=>$_POST['slider_link'],
			'slider_durum'=>$_POST['slider_durum']

		));


		if ($update) {
			
			Header("Location:../production/slider.php?kullanici_id=$kullanici_id&durum=ok");
		} else {
			Header("Location:../production/slider-duzenle.php?kullanici_id=$kullanici_id&durum=no");
		}




	}

	if ($_GET['slidersil']=="ok") {
		iskontrol();
		$sil=$db->prepare("DELETE from slider where slider_id=:id");
		$kontrol=$sil->execute(array(	
			'id'=>$_GET['slider_id']
		));



		if ($kontrol) {
			header("Location:../production/slider.php?durumsil=ok");
		}else {
			header("Location:../production/slider.php?durumsil=no");

		}
	}






	

	if (isset($_POST['kullaniciresimduzenle'])) {



		$uploads_dir = '../../dimg';

		@$tmp_name = $_FILES['kullanici_resim']["tmp_name"];
		@$name = $_FILES['kullanici_resim']["name"];

		$benzersizsayi4=rand(20000,32000);
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


		$duzenle=$db->prepare("UPDATE kullanici SET
			kullanici_resim=:resim
			WHERE kullanici_id=0");
		$update=$duzenle->execute(array(
			'resim' => $refimgyol
		));



		if ($update) {

			

			Header("Location:../../hesabim.php?durum=ok");

		} else {

			Header("Location:../../hesabim.php?durum=no");
		}

	}

	if (isset($_POST['bilgilerimiguncelle'])) {

		$kullanici_id=$_POST['kullanici_id'];

		$ayarkaydet=$db->prepare("UPDATE kullanici SET
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_il=:kullanici_il,
			kullanici_adres=:kullanici_adres,
			kullanici_gsm=:kullanici_gsm
			WHERE kullanici_id={$_POST['kullanici_id']}");


		$update=$ayarkaydet->execute(array(

			'kullanici_adsoyad'=>$_POST['kullanici_adsoyad'],
			'kullanici_il'=>$_POST['kullanici_il'],
			'kullanici_adres'=>$_POST['kullanici_adres'],
			'kullanici_gsm'=>$_POST['kullanici_gsm']

		));


		if ($update) {

			Header("Location:../../hesabim.php?durum=ok");
		} else {
			Header("Location:../../hesabim.php?durum=no");
		}




	}


	if (isset($_POST['sifremiguncelle'])) {
		
		echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']);
		echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']);
		echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']);
		$kullanici_password=md5($kullanici_eskipassword);

		$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_password=:password");
		$kullanicisor->execute(array(
			'password'=>$kullanici_password
		));

		$say=$kullanicisor->rowCount();

		if ($say==0) {
			header("Location:../../sifre-guncelle.php?durum=eskisifrehata");
		}else {


			if ($kullanici_passwordone==$kullanici_passwordtwo) {
				
				if (strlen($kullanici_passwordone)>=6) {
					

					$password=md5($kullanici_passwordone);

					$kullanici_yetki=1;
					$kullanicikaydet=$db->prepare("UPDATE kullanici SET
						kullanici_password=:kullanici_password
						WHERE kullanici_id={$_POST['kullanici_id']};
						");

					$insert=$kullanicikaydet->execute(array(
						'kullanici_password'=> $password
					));

					if ($insert) {
						header("Location:../../sifre-guncelle.php?durum=sifredeyisti");

					}else {
						header("Location:../../sifre-guncelle.php?durum=no");
					}
				}else {
					header("Location:../../sifre-guncelle.php?durum=eksiksifre");
				}
			}else {
				header("Location:../../sifre-guncelle.php?durum=sifreleraynideyil");
			}


		}

	}







	if (isset($_POST['kategorikaydet'])) {

		$kategori_seourl=seo($_POST['kategori_ad']);


		$kategoriekle=$db->prepare("INSERT INTO  kategori SET
			kategori_ad=:kategori_ad,
			kategori_sira=:kategori_sira,
			kategori_seourl=:kategori_seourl
			");


		$insert=$kategoriekle->execute(array(

			'kategori_ad' => $_POST['kategori_ad'],
			'kategori_sira' => $_POST['kategori_sira'],
			'kategori_seourl' => $kategori_seourl,

		));


		if ($insert) {

			header("Location:../production/categories.php?menu_id=$menu_id&durum=ok");
		} else {
			header("Location:../production/categories.php?menu_id=$menu_id&durum=no");
		}
	}





	if (isset($_POST['kategoriduzenle'])) {

		$kategori_id=$_POST['kategori_id'];
		$kategori_seourl=seo($_POST['kategori_ad']);


		$ayarkaydet=$db->prepare("UPDATE kategori SET
			kategori_ad=:kategori_ad,
			kategori_sira=:kategori_sira,
			kategori_ust=:kategori_ust,
			kategori_seourl=:kategori_seourl,
			kategori_durum=:kategori_durum
			WHERE kategori_id={$_POST['kategori_id']}");


		$update=$ayarkaydet->execute(array(

			'kategori_ad' => $_POST['kategori_ad'],
			'kategori_sira' => $_POST['kategori_sira'],
			'kategori_ust' => $_POST['kategori_ust'],
			'kategori_seourl' => $kategori_seourl,
			'kategori_durum' => $_POST['kategori_durum']

		));


		if ($update) {

			Header("Location:../production/kategori.php?menu_id=$menu_id&durum=ok");
		} else {
			Header("Location:../production/kategori-duzenle.php?menu_id=$menu_id&durum=no");
		}
	}


	if ($_GET['kategorisil']=="ok") {

		$sil=$db->prepare("DELETE from kategori where kategori_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['kategori_id']
		));




		if ($kontrol) {
			header("Location:../production/categories.php?durumsil=ok");
		}else {
			header("Location:../production/categories.php?durumsil=no");

		}
	}













	if ($_GET['urunsil']=="ok") {

		$sil=$db->prepare("DELETE from urun where urun_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['urun_id']
		));




		if ($kontrol) {
			header("Location:../production/urun.php?durumsil=ok");
		}else {
			header("Location:../production/urun.php?durumsil=no");

		}
	}



	if ($_GET['blogsil']=="ok") {

		$sil=$db->prepare("DELETE from blog where blog_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['blog_id']
		));




		if ($kontrol) {
			header("Location:../production/blogs.php?durumsil=ok");
		}else {
			header("Location:../production/blogs.php?durumsil=no");

		}
	}






	if (isset($_POST['urunduzenle'])) {

		$urun_id=$_POST['urun_id'];
		$urun_seourl=seo($_POST['urun_ad']);


		$ayarkaydet=$db->prepare("UPDATE urun SET
			kategori_id=:kategori_id,
			urun_ad=:urun_ad,
			urun_seourl=:urun_seourl,
			urun_detay=:urun_detay,
			urun_fiyat=:urun_fiyat,
			urun_eskifiyat=:urun_eskifiyat,
			urun_video=:urun_video,
			urun_keyword=:urun_keyword,
			urun_stok=:urun_stok,
			urun_number=:urun_number,
			urun_istehsalci=:urun_istehsalci,
			urun_onecixar=:urun_onecixar,
			urun_kiseserf=:urun_kiseserf,
			urun_kiseqiymet=:urun_kiseqiymet,
			urun_durum=:urun_durum
			WHERE urun_id={$_POST['urun_id']}");


		$update=$ayarkaydet->execute(array(

			'kategori_id' => $_POST['kategori_id'],
			'urun_ad' => $_POST['urun_ad'],
			'urun_seourl' => $urun_seourl,
			'urun_detay' => $_POST['urun_detay'],
			'urun_fiyat' => $_POST['urun_fiyat'],
			'urun_eskifiyat' => $_POST['urun_eskifiyat'],
			'urun_video' => $_POST['urun_video'],
			'urun_keyword' => $_POST['urun_keyword'],
			'urun_number' => $_POST['urun_number'],
			'urun_istehsalci' => $_POST['urun_istehsalci'],
			'urun_onecixar' => $_POST['urun_onecixar'],
			'urun_kiseserf' => $_POST['urun_kiseserf'],
			'urun_kiseqiymet' => $_POST['urun_kiseqiymet'],
			'urun_stok' => $_POST['urun_stok'],
			'urun_durum' => $_POST['urun_durum']

		));


		if ($update) {

			Header("Location:../production/urun.php?menu_id=$menu_id&durum=ok");
		} else {
			Header("Location:../production/urun-duzenle.php?menu_id=$menu_id&durum=no");
		}
	}




	if (isset($_POST['urunekle'])) {

		$urun_seourl=seo($_POST['urun_ad']);

		$kaydet=$db->prepare("INSERT INTO urun SET
			kategori_id=:kategori_id,
			urun_ad=:urun_ad,
			urun_detay=:urun_detay,
			urun_keyword=:urun_keyword,
			urun_seourl=:seourl		
			");
		$insert=$kaydet->execute(array(
			'kategori_id' => $_POST['kategori_id'],
			'urun_ad' => $_POST['urun_ad'],
			'urun_detay' => $_POST['urun_detay'],
			'urun_keyword' => $_POST['urun_keyword'],
			'urun_stok' => $_POST['urun_stok'],
			'seourl' => $urun_seourl
			
		));

		if ($insert) {

			Header("Location:../../../posts.php?durum=ok");

		} else {

			Header("Location:../../../posts.php?durum=no");
		}

	}




	if (isset($_POST['yorumkaydet'])) {


		$gelen_url=$_POST['gelen_url'];

		$ayarekle=$db->prepare("INSERT INTO yorumlar SET
			yorum_detay=:yorum_detay,
			kullanici_id=:kullanici_id,
			chapter_id=:chapter_id	

			");

		$insert=$ayarekle->execute(array(
			'yorum_detay' => htmlspecialchars($_POST['yorum_detay']),
			'kullanici_id' => $_SESSION['userkullanici_id'],
			'chapter_id' => $_POST['chapter_id']

		));


		if ($insert) {

			Header("Location:$gelen_url?durum=ok");

		} else {

			Header("Location:$gelen_url?durum=no");
		}

	}


	// BOOK COMMENT

	
	if (isset($_POST['commentbook'])) {


		$gelen_url=$_POST['gelen_url'];

		$ayarekle=$db->prepare("INSERT INTO yorumlar SET
			yorum_detay=:yorum_detay,
			kullanici_id=:kullanici_id,
			urun_id=:urun_id	

			");

		$insert=$ayarekle->execute(array(
			'yorum_detay' =>htmlspecialchars( $_POST['yorum_detay']),
			'kullanici_id' => $_SESSION['userkullanici_id'],
			'urun_id' => $_POST['urun_id']

		));


		if ($insert) {

			Header("Location:$gelen_url?durum=ok");

		} else {

			Header("Location:$gelen_url?durum=no");
		}

	}

	
	// BOOK COMMENT

	
	if (isset($_POST['commmentblog'])) {


		$gelen_url=$_POST['gelen_url'];

		$ayarekle=$db->prepare("INSERT INTO yorumlar SET
			yorum_detay=:yorum_detay,
			kullanici_id=:kullanici_id,
			blog_id=:blog_id	

			");

		$insert=$ayarekle->execute(array(
			'yorum_detay' => htmlspecialchars($_POST['yorum_detay']),
			'kullanici_id' => $_SESSION['userkullanici_id'],
			'blog_id' => $_POST['blog_id']

		));


		if ($insert) {

			Header("Location:$gelen_url?durum=ok");

		} else {

			Header("Location:$gelen_url?durum=no");
		}

	}





	if (isset($_POST['sepeteekle'])) {



		$ayarekle=$db->prepare("INSERT INTO sepet SET
			urun_adet=:urun_adet,
			kullanici_id=:kullanici_id,
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_adres=:kullanici_adres,
			kullanici_tel=:kullanici_tel,
			urun_ad=:urun_ad,	
			urun_id=:urun_id	

			");

		$insert=$ayarekle->execute(array(
			'urun_adet' => $_POST['urun_adet'],
			'kullanici_id' => $_POST['kullanici_id'],
			'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
			'kullanici_adres' => $_POST['kullanici_adres'],
			'kullanici_tel' => $_POST['kullanici_tel'],
			'urun_ad' => $_POST['urun_ad'],
			'urun_id' => $_POST['urun_id']

		));


		if ($insert) {

			Header("Location:../../sepet.php?durum=ok");

		} else {

			Header("Location:../../sepet.php?durum=no");
		}

	}


	if ($_GET['urun_onecikar']=="ok") {




		$duzenle=$db->prepare("UPDATE urun SET

			urun_onecixar=:urun_onecixar

			WHERE urun_id={$_GET['urun_id']}");

		$update=$duzenle->execute(array(


			'urun_onecixar' => $_GET['urun_one']
		));



		if ($update) {



			Header("Location:../production/urun.php?durum=ok");

		} else {

			Header("Location:../production/urun.php?durum=no");
		}

	}





	if ($_GET['yorum_onay']=="ok") {




		$duzenle=$db->prepare("UPDATE yorumlar SET

			yorum_onay=:yorum_onay

			WHERE yorum_id={$_GET['yorum_id']}");

		$update=$duzenle->execute(array(


			'yorum_onay' => $_GET['yorum_one']
		));



		if ($update) {



			Header("Location:../production/yorum.php?durum=ok");

		} else {

			Header("Location:../production/yorum.php?durum=no");
		}

	}

	if ($_GET['yorumsil']=="ok") {

		$sil=$db->prepare("DELETE from yorumlar where yorum_id=:id");
		$kontrol=$sil->execute(array(	
			'id'=>$_GET['yorum_id']
		));



		if ($kontrol) {
			header("Location:../production/yorum.php?durumsil=ok");
		}else {
			header("Location:../production/yorum.php?durumsil=no");

		}
	}
	if (isset($_POST['sepetekle'])) {


		$ayarekle=$db->prepare("INSERT INTO sepet SET
			urun_adet=:urun_adet,
			kullanici_id=:kullanici_id,
			urun_id=:urun_id	

			");

		$insert=$ayarekle->execute(array(
			'urun_adet' => $_POST['urun_adet'],
			'kullanici_id' => $_POST['kullanici_id'],
			'urun_id' => $_POST['urun_id']

		));


		if ($insert) {

			Header("Location:../../sepet?durum=ok");

		} else {

			Header("Location:../../sepet?durum=no");
		}

	}



	if (isset($_POST['bankaekle'])) {

		$kaydet=$db->prepare("INSERT INTO banka SET
			banka_ad=:banka_ad,
			banka_durum=:banka_durum,	
			banka_hesabadsoyad=:banka_hesabadsoyad,
			banka_iban=:banka_iban
			");
		$insert=$kaydet->execute(array(
			'banka_ad' => $_POST['banka_ad'],
			'banka_durum' => $_POST['banka_durum'],
			'banka_hesabadsoyad' => $_POST['banka_hesabadsoyad'],
			'banka_iban' => $_POST['banka_iban']		
		));

		if ($insert) {

			Header("Location:../production/banka.php?durum=ok");

		} else {

			Header("Location:../production/banka.php?durum=no");
		}

	}


	if (isset($_POST['bankaduzenle'])) {

		$banka_id=$_POST['banka_id'];

		$kaydet=$db->prepare("UPDATE banka SET

			banka_ad=:ad,
			banka_durum=:banka_durum,	
			banka_hesabadsoyad=:banka_hesabadsoyad,
			banka_iban=:banka_iban
			WHERE banka_id={$_POST['banka_id']}");
		$update=$kaydet->execute(array(
			'ad' => $_POST['banka_ad'],
			'banka_durum' => $_POST['banka_durum'],
			'banka_hesabadsoyad' => $_POST['banka_hesabadsoyad'],
			'banka_iban' => $_POST['banka_iban']		
		));

		if ($update) {

			Header("Location:../production/banka.php?banka_id=$banka_id&durum=ok");

		} else {

			Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
		}




	}


	if ($_GET['bankasil']=="ok") {

		$sil=$db->prepare("DELETE from banka where banka_id=:banka_id");
		$kontrol=$sil->execute(array(
			'banka_id' => $_GET['banka_id']
		));

		if ($kontrol) {


			Header("Location:../production/banka.php?durum=ok");

		} else {

			Header("Location:../production/banka.php?durum=no");
		}

	}

//Sipariş İşlemleri

	if (isset($_POST['bankasiparisekle'])) {


		$siparis_tip="Banka Havalesi";


		$kaydet=$db->prepare("INSERT INTO siparis SET
			kullanici_id=:kullanici_id,
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_tel=:kullanici_tel,
			kullanici_adres=:kullanici_adres,
			siparis_tip=:siparis_tip,	
			siparis_banka=:siparis_banka,
			urun_id=:urun_id,
			urun_ad=:urun_ad,
			siparis_toplam=:siparis_toplam
			");
		$insert=$kaydet->execute(array(
			'kullanici_id' => $_POST['kullanici_id'],
			'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
			'kullanici_adres' => $_POST['kullanici_adres'],
			'kullanici_tel' => $_POST['kullanici_tel'],
			'siparis_tip' => $siparis_tip,
			'siparis_banka' => $_POST['siparis_banka'],
			'urun_id' => $_POST['urun_id'],
			'urun_ad' => $_POST['urun_ad'],
			'siparis_toplam' => $_POST['siparis_toplam']		
		));

		
		if ($insert) {

		//Sipariş başarılı kaydedilirse...

			echo $siparis_id = $db->lastInsertId();

			echo "<hr>";


			$kullanici_id=$_POST['kullanici_id'];
			$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
			$sepetsor->execute(array(
				'id' => $kullanici_id
			));

			while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

				$urun_id=$sepetcek['urun_id']; 
				$urun_adet=$sepetcek['urun_adet'];
				$urun_ad=$sepetcek['urun_ad'];
				$kullanici_adsoyad=$sepetcek['kullanici_adsoyad'];
				$kullanici_id=$sepetcek['kullanici_id'];
				$kullanici_adres=$sepetcek['kullanici_adres'];
				$kullanici_tel=$sepetcek['kullanici_tel'];

				$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
				$urunsor->execute(array(
					'id' => $urun_id
				));

				$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
				
				echo $urun_fiyat=$uruncek['urun_fiyat'];


				
				$kaydet=$db->prepare("INSERT INTO siparis_detay SET
					
					siparis_id=:siparis_id,
					urun_id=:urun_id,	
					urun_ad=:urun_ad,	
					kullanici_adsoyad=:kullanici_adsoyad,	
					kullanici_adres=:kullanici_adres,	
					kullanici_id=:kullanici_id,	
					kullanici_tel=:kullanici_tel,	
					urun_fiyat=:urun_fiyat,
					urun_adet=:urun_adet
					");
				$insert=$kaydet->execute(array(
					'siparis_id' => $siparis_id,
					'urun_id' => $urun_id,
					'urun_ad' => $urun_ad,
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_adres' => $kullanici_adres,
					'kullanici_id' => $kullanici_id,
					'kullanici_tel' => $kullanici_tel,
					'urun_fiyat' => $urun_fiyat,
					'urun_adet' => $urun_adet

				));


			}

			if ($insert) {

				

			//Sipariş detay kayıtta başarıysa sepeti boşalt

				$sil=$db->prepare("DELETE from sepet where kullanici_id=:kullanici_id");
				$kontrol=$sil->execute(array(
					'kullanici_id' => $kullanici_id
				));

				
				Header("Location:../../siparislerim?durum=ok");
				exit;


			}

			




		} else {

			echo "başarısız";

		//Header("Location:../production/siparis.php?durum=no");
		}



	}


	
	if(isset($_POST['urunfotosil'])) {

		$urun_id=$_POST['urun_id'];


		echo $checklist = $_POST['urunfotosec'];

		
		foreach($checklist as $list) {

			$sil=$db->prepare("DELETE from urunfoto where urunfoto_id=:urunfoto_id");
			$kontrol=$sil->execute(array(
				'urunfoto_id' => $list
			));
		}

		if ($kontrol) {


			Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=ok");

		} else {

			Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=no");
		}


	} 





	if ($_GET['siparissil']=="ok") {
		iskontrol();
		$sil=$db->prepare("DELETE from siparis_detay where siparis_detay_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['siparis_detay_id']
		));




		if ($kontrol) {
			header("Location:../production/siparisler.php?durumsil=ok");
		}else {
			header("Location:../production/siparisler.php?durumsil=no");

		}
	}



	if ($_GET['kullanicisiparissil']=="ok") {
		iskontrol();
		$sil=$db->prepare("DELETE from siparis_detay where siparis_detay_id=:id");
		$kontrol=$sil->execute(array(
			'id'=>$_GET['siparis_detay_id']
		));




		if ($kontrol) {
			header("Location:../../siparislerim.php?durumsil=ok");
		}else {
			header("Location:../../siparislerim.php?durumsil=no");

		}
	}




?>












