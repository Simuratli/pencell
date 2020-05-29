<?php

ob_start();
session_start();

include_once 'baglan.php';
include '../production/function.php'; 

if (isset($_POST['kullanicikaydet'])) {
    $kullanici_ad = htmlspecialchars($_POST['kullanici_ad']);
    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);
    $kullanici_passwordone = htmlspecialchars(trim($_POST['kullanici_passwordone']));
    $kullanici_passwordtwo = htmlspecialchars(trim($_POST['kullanici_passwordtwo']));

    if ($kullanici_passwordone == $kullanici_passwordtwo) {


        if (strlen($kullanici_passwordone) >= 6) {
            // Başlangıç
            $kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail");
            $kullanicisor->execute(array(
                'mail' => $kullanici_mail,
            ));

            //dönen satır sayısını belirtir
            $say = $kullanicisor->rowCount();

            if ($say == 0) {
                //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
                $password = md5($kullanici_passwordone);

                $kullanici_yetki = 1;

                //Kullanıcı kayıt işlemi yapılıyor...
                $kullanicikaydet = $db->prepare('INSERT INTO kullanici SET
                    kullanici_ad=:kullanici_ad,
                    kullanici_mail=:kullanici_mail,
                    kullanici_password=:kullanici_password,
                    kullanici_yetki=:kullanici_yetki
                    ');
                $insert = $kullanicikaydet->execute(array(
                    'kullanici_ad' => $kullanici_ad,
                    'kullanici_mail' => $kullanici_mail,
                    'kullanici_password' => $password,
                    'kullanici_yetki' => $kullanici_yetki,
                ));

                if ($insert) {
                    header('Location:../../login?durum=logincorrectly');

                //Header("Location:../production/genel-ayarlar.php?durum=ok");
                } else {
                    header('Location:../../login.php?durum=whatIsWrongWithYou');
                }
            } else {
                header('Location:../../login.php?durum=similar');
            }

            // Bitiş
        } else {
            header('Location:../../login.php?durum=missingPassword');
        }
    } else {
        header('Location:../../login.php?durum=differentPassword');
    }
}




if (isset($_POST['kullanicigiris'])) {



    echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
    echo $kullanici_password=md5(htmlspecialchars($_POST['kullanici_password'])); 



    $kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
    $kullanicisor->execute(array(
        'mail' => $kullanici_mail,
        'yetki' => 1,
        'password' => $kullanici_password,
        'durum' => 1
    ));


    $say=$kullanicisor->rowCount();



    if ($say==1) {

      $_SESSION['userkullanici_mail']=$kullanici_mail;

      header("Location:../../?girisbasarili");
      exit;





  } else {


    header("Location:../../login.php?durum=basarisizgiris");

}


}

if (isset($_POST['musteribilgiguncelle'])) {


    $ayarkaydet=$db->prepare("UPDATE kullanici SET
      
        kullanici_ad=:kullanici_ad,
        kullanici_facebook=:kullanici_facebook,
        kullanici_twitter=:kullanici_twitter
        WHERE kullanici_id={$_SESSION['userkullanici_id']}");


    $update=$ayarkaydet->execute(array(
        'kullanici_ad'=>htmlspecialchars($_POST['kullanici_ad']),
        'kullanici_facebook'=>$_POST['kullanici_facebook'],
        'kullanici_twitter'=>$_POST['kullanici_twitter']

    ));


    if ($update) {

        Header("Location:../../account.php?durum=ok");
    } else {
        Header("Location:../../account.php?durum=no");
    }



}


if (isset($_POST['musteriadresguncelle'])) {


    $ayarkaydet=$db->prepare("UPDATE kullanici SET
      
      kullanici_tip=:kullanici_tip,
      kullanici_tc=:kullanici_tc,
      kullanici_unvan=:kullanici_unvan
        WHERE kullanici_id={$_SESSION['userkullanici_id']}");


    $update=$ayarkaydet->execute(array(
        'kullanici_tip'=>htmlspecialchars($_POST['kullanici_tip']),
        'kullanici_tc'=>htmlspecialchars($_POST['kullanici_tc']),
        'kullanici_unvan'=>htmlspecialchars($_POST['kullanici_unvan'])

    ));


    if ($update) {

        Header("Location:../../adress.php?durum=ok");
    } else {
        Header("Location:../../adress.php?durum=no");
    }

}






if (isset($_POST['kullanicisifreguncelle'])) {

	$kullanici_eskipassword=trim($_POST['kullanici_eskipassword']);
	$kullanici_passwordone=trim($_POST['kullanici_passwordone']); 
	$kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']);

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
		));

			//dönen satır sayısını belirtir
	$say=$kullanicisor->rowCount();



	if ($say==0) {

		header("Location:../../password?durum=eskisifrehata");



	} else {



	//eski şifre doğruysa başla


		if ($kullanici_passwordone==$kullanici_passwordtwo) {


			if (strlen($kullanici_passwordone)>=6) {


				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");

				
				$insert=$kullanicikaydet->execute(array(
					'kullanici_password' => $password
					));

				if ($insert) {


					header("Location:../../password.php?durum=sifredegisti");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../password.php?durum=no");
				}





		// Bitiş



			} else {


				header("Location:../../password.php?durum=eksiksifre");


			}



		} else {

			header("Location:../../password?durum=sifreleruyusmuyor");

			exit;


		}


	}

	exit;

	if ($update) {

		header("Location:../../password?durum=ok");

	} else {

		header("Location:../../password?durum=no");
	}

}




?>