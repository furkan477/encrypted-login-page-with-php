<?php
    include('funct.php');

    session_start();

    $user = [
        'biletbayisi-01' => [
            'password' => '19551988',
            'eposta' => 'bilgi@BiletBayisi.com'
        ]
    ];

    if (get('islem') == 'giris'){

        $_SESSION['username'] = post('username');
        $_SESSION['password'] = post('password');

        if (!post('username')){
            $_SESSION['error'] = 'Lütfen Kullanıcı Adınızı Giriniz';
            header('Location:login.php');
            exit();
        }elseif (!post('password')){
            $_SESSION['error'] = 'Lütfen Kullanıcı Şifrenizi Giriniz';
            header('Location:login.php');
            exit();
        }else {

           
            if(array_key_exists(post('username'),$user)){
                if($user[post('username')]['password'] == post('password')){

                    $_SESSION['login'] = true;
                    $_SESSION['kullanici_adi'] = post('username');
                    $_SESSION['eposta'] = $user[post('username')]['eposta'];
                    header('Location:index.php');
                    exit();
                    
                }else {
                    $_SESSION['error'] = 'Şifrenizi Hatalı Girdiniz.';
                    header('Location:login.php');
                    exit();
                }
            } else{
                $_SESSION['error'] = 'Kullanıcı Adınızı Hatalı Girdiniz.';
                header('Location:login.php');
                exit();
            }

        }
    }

    if (get('islem') == 'hakkimda'){

        $hakkimda = post('hakkimda');
        $islem = file_put_contents('db/'.session('kullanici_adi').'.txt',htmlspecialchars($hakkimda));

        if($islem){
            header('Location:index.php?islem=true');
        }else header('Location:index.php?islem=false');
    }

    if (get('islem') == 'cikis'){

        session_destroy();
        session_start();
        $_SESSION['error'] = 'Oturum Sonlandırıldı';
        header('Location:login.php');

    }

?>
