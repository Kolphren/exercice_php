<?php


session_start();

//var_dump($_SESSION);
//var_dump($_COOKIE);

?>

<link rel="stylesheet" href="/exo/style/style.css">

<nav class='nav'>
    <ul class='menu'>
        <li><a href="/">Home</a></li>
        <li><a href="/login">Login</a></li>
        <li><a href="/profil">Profil</a></li>
        <li><a href="/log">Logs</a></li>
</ul>
</nav>

<?php 
if (isset ($_SESSION['firstName'])){
    echo 'Bonjour '.$_SESSION['firstName']. '!';
     
}else{
    echo 'Bonjour bel inconnu !';
}
?>

