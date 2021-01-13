<?php

function myReadDir($path) {
    $content = scandir($path);
    $dir = [];
 
    foreach ($content as $elem_name) {
        $elem = [];
        $elem['name'] = $elem_name;
        if (is_dir($path.'/'.$elem_name) && $elem_name != '.' && $elem_name != '..') {
            $elem['type'] = 'directory';
            $elem['content'] = myReadDir($path.'/'.$elem_name);
            $dir[] = $elem;
        }
        elseif ($elem_name != '.' && $elem_name != '..') {
            $elem['type'] = 'file';
            $dir[] = $elem;
        }
 
    }
    return $dir;
}
 
$log = myReadDir('C:\MAMP\htdocs\exo\logs');
$tab = [];
$file = [];
foreach ($log as $value){
    //var_dump($tab);
    //if ($value['type'] === 'file'){
        array_push ($file, file_get_contents('./logs/'. $value['name']));
        array_push($tab, $value['name']);
}

if (isset ($_POST['text'])){
    $myLogs = './logs/'.$value['name'];
    file_put_contents ($myLogs, $_POST['text']);
}

if (isset($_POST['delete'])){
    $temp = 'C:/MAMP/htdocs/exo/logs/'. $_GET['logs'];
    //echo $_POST['delete'];
    unlink($temp);
}



include './view/log_view.php';

$_SESSION['LastPage'] = '/logs';