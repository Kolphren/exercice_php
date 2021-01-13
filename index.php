<?php

include 'pdo_connection.php';

include './layout/header.php';

switch ($_SERVER['REDIRECT_URL']) {
    case '/':
        include "controller/home_controller.php";
        break;
    case '/login';
        include "controller/login_controller.php";    
        break;
    case '/profil';
        if (isset ($_SESSION['email'])){
            include "controller/profil_controller.php";
        }else{
            include "controller/denied_controller.php";
        }
        break;
    case '/modif';
        include "controller/modification_controller.php";
        break;
    case '/log';
        include "controller/log_controller.php";
        break;
    default;
        include "view/404_view.php";
        break;
}
$day = date('d.m.y');
date_default_timezone_set('Europe/Paris');
$date = date ('[d.m.y | H:i]');
$myLogs = fopen('./logs/log_'.date('d_m_y').'.txt', 'a+');


if (isset ($_SESSION['email'])){
    fputs($myLogs, $date . ' : ' . $_SESSION['email']. " a consulté la page " . $_SESSION['LastPage'] . PHP_EOL);
}else{
    fputs($myLogs, $date . ' : ' ."Un inconnu a visité la page " . $_SESSION['LastPage']. PHP_EOL);
}

include './layout/footer.php';