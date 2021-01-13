<?php

//$hashPassword = password_hash ($_POST['password'], PASSWORD_BCRYPT);
// var_dump($hashPassword);



$connected = false;
date_default_timezone_set('Europe/Paris');
$date = date ('[d.m.y | H:i]');

$password = '$2y$10$zcYfNabhR3JSEog3kyfPMuLSreZAfZSPSwZx1LIGuRXKZsJq9nJyu';

$myLogs = fopen('./logs/log_'.date('d_m_y').'.txt', 'a+');

if (isset ($_POST['email'])){
    if (password_verify ($_POST['password'], $password) && $_POST['email'] === 'tlionnel@gmail.com'){
        $connected = password_verify($_POST['password'], $password);
        $_SESSION['name'] = 'Traverse';
        $_SESSION['firstName'] = 'Lionnel';
        $_SESSION['email'] = 'tlionnel@gmail.com';

        fputs($myLogs, $date . ' : ' . $_POST['email']. " s'est connecté avec succès" . PHP_EOL);
        
    }
    $_SESSION['connected'] = $connected;
}



include './view/login_view.php';

$_SESSION['LastPage'] = '/login';