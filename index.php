<?php
    include('funct.php');


    session_start();

    if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
        header('Location:login.php');
    }

    $hakkimda = file_get_contents('db/'.session('kullanici_adi').'.txt')
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Uçak Bileti Al: En Ucuz Uçak Bileti Fiyatlarını Bul | BiletBayisi</title>
    <style>
        body.bg-dark{ background: #181818!important;}
        button{position: absolute; bottom: 8px; right: 8px}
        form{position: relative;}
    </style>
</head>
<body class="bg-dark">
    <div class="d-flex align-items-center justify-content-center p-4"><img height="110" src="bilet.jpg" alt=""></div>
    <div  class="container d-flex align-items-center justify-content-center">
    <div class="card bg-dark" style="width: 18rem;">
        <div class="card-header bg-primary">
            my profile
        </div>
        <div class="card-body">
            <h5 class="card-title text-warning"><?= session('kullanici_adi') ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= session('eposta') ?></h6>
            <form action="islem.php?islem=hakkimda" method="post" >
                <textarea class="form-control bg-dark text-white" name="hakkimda" id="" cols="30" rows="10"><?= html_entity_decode($hakkimda) ?></textarea>
                <button class="btn btn-sm btn-primary" type="submit">save</button>
            </form>
            <a href="islem.php?islem=cikis" class="btn btn-success btn-sm mt-2 w-100">sign out</a><br>
        </div>
    </div>
</div>
</body>
</html>
