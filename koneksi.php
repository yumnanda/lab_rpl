<?php

$server = 'sql2.freemysqlhosting.net';
$user = 'sql2273666';
$pass = 'cJ9*tP8*';
$nama_db = 'sql2273666';

$db = mysqli_connect($server, $user, $pass, $nama_db);

if(!$db){
    die('Gagal konek bosque!' . mysqli_connect_error());
}

?>