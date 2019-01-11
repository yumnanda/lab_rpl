<?php

$server = 'sql12.freemysqlhosting.net';
$user = 'sql12272463';
$pass = 'YES';
$nama_db = 'sql12272463';

$db = mysqli_connect($server, $user, $pass, $nama_db);

if(!$db){
    die('Gagal konek bosque!' . mysqli_connect_error());
}

?>