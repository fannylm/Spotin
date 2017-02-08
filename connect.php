<?php

/*$user = 'root';
$password = 'root';
$MABASE = 'Spotin';
$host = 'localhost';
$port = 8889;
$BDD = mysql_connect($host,$user,$password,$MABASE);

$link = mysql_connect(
    "$host:$port",
    $user,
    $password
);
$db_selected = mysql_select_db(
    $MABASE,
    $link
);

mysql_query("SET NAMES UTF8") ;*/


$user = 'root';
$password = 'root';
$db = 'Spotin';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);

?>