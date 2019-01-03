<?php
require 'koneksi.php';
require 'admin/fungsi.php';

$ip      = ip_user();
$browser = browser_user();
$os      = os_user();

unset($_COOKIE['VISITOR']);

if (! isset($_COOKIE['VISITOR'])) {
    $duration = time()+60*60*24;
    setcookie('VISITOR',$browser,$duration);
    $dateTime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO statistik (ip, os, browser, date_create) VALUES ('$ip', '$os', '$browser', '$dateTime')";
    $query = $db->query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beranda | RPL UDINUS</title>
    <!-- CDN Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <!-- Header -->
    <header class="header pt-5">
        <div class="container">
            <div class="media">
                <img class="align-self-center mr-3" src="asset/img/logo.png" width="100" height="100" alt="logo">
                <div class="media-body">
                    <p class="header-text">Laboratorium Rekayasa Perangkat Lunak</p>
                    <p class="header-text">Universitas Dian Nuswantoro</p>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow p-3 bg-primary rounded">
        <div class="container">
            <a class="navbar-brand" href="">Beranda</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Penelitian
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="penelitian/topik/">Topik Research</a>
                            <a class="dropdown-item" href="penelitian/publikasi/">Publikasi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Anggota
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="anggota/dosen/">Dosen</a>
                            <a class="dropdown-item" href="anggota/mahasiswa/">Mahasiswa</a>
                            <a class="dropdown-item" href="anggota/alumni/">Alumni</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informasi/news/">Informasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="download/jurnal/">Jurnal</a>
                            <a class="dropdown-item" href="download/ebook/">E-Book</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="materi/">Materi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kegiatan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/kegiatan/workshop/">Workshop</a>
                            <a class="dropdown-item" href="/kegiatan/klinik/">Klinik</a>
                            <a class="dropdown-item" href="kegiatan/lomba">Lomba</a>
                        </div>
                    </li>
                </ul>
                <form action="search/" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="keyword" type="search" autofocus placeholder="Cari.." autocomplete="off" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Slide -->
    <div id="slide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="asset/img/slide/001.svg" class="d-block w-100" alt="001">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="asset/img/slide/002.svg" class="d-block w-100" alt="002">
            </div>
            <div class="carousel-item">
                <img src="asset/img/slide/003.svg" class="d-block w-100" alt="003">
            </div>
        </div>
        <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Slide -->
    <!-- Content -->
    <section>
        <div class="layout-margin">
            <div class="garis-bawah mb-5">
                <h3 class="text-center mb-3">Bidang Kajian</h3>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-sm-4">
                    <div class="card mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 22rem;">
                        <div class="card-header">Software Requirements</div>
                        <div class="card-body">
                            <p class="card-text text-justify">berhubungan dengan spesifikasi kebutuhan dan persyaratan perangkat lunak.</p>
                            <a href="kajian/data.php" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-light mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 22rem;">
                        <div class="card-header">Software desain</div>
                        <div class="card-body">
                            <p class="card-text text-justify">mencakup proses penampilan arsitektur, komponen, antar muka, dan karakteristik lain dari perangkat lunak.</p>
                            <a href="kajian/data.php" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-light mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 22rem;">
                        <div class="card-header">Software construction</div>
                        <div class="card-body">
                            <p class="card-text text-justify">berhubungan dengan detail pengembangan perangkat lunak, termasuk. algoritma, pengkodean, pengujian dan pencarian kesalahan.</p>
                            <a href="kajian/data.php" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-sm-4">
                    <div class="card mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 22rem;">
                        <div class="card-header">Software testing</div>
                        <div class="card-body">
                            <p class="card-text text-justify">meliputi pengujian pada keseluruhan perilaku perangkat lunak.</p>
                            <a href="kajian/data.php" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-light mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 22rem;">
                        <div class="card-header">Software maintenance</div>
                        <div class="card-body">
                            <p class="card-text text-justify">mencakup upaya-upaya perawatan ketika perangkat lunak telah dioperasikan.</p>
                            <a href="kajian/data.php" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-light mb-3 shadow p-3 mb-5 bg-white rounded" style="max-width: 22rem;">
                        <div class="card-header">Software configuration</div>
                        <div class="card-body">
                            <p class="card-text text-justify">management berhubungan dengan usaha perubahan konfigurasi perangkat lunak untuk memenuhi kebutuhan tertentu.</p>
                            <a href="kajian/data.php" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content -->
    <!-- Kontak -->
    <!-- Kontak -->
    <div id="kontak">
        <div class="wrap">
            <div class="container">
                <h3 class="text-center mb-5">Get In Touch</h3>
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-8">
                        <form action="">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukan Email">
                            </div>
                            <div class="form-group">
                                <label for="comment">Kritik dan Saran</label>
                                <textarea class="form-control" rows="5" id="comment" placeholder="Kritik dan Saran"></textarea>
                            </div> 
                            <button type="submit" class="btn btn-primary">Kirim</button>                   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Kontak -->
    <!-- Footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row pt-5 justify-content-center">
                    <div class="sosmed">
                        <a href="www.facebook.com" class="mx-3 text-white"><i class="fa fa-facebook-square fa-2x"></i></a>
                        <a href="www.twitter.com" class="mx-3 text-white"><i class="fa fa-twitter-square fa-2x"></i></a>
                        <a href="www.instagram.com" class="mx-3 text-white"><i class="fa fa-instagram fa-2x"></i></a>
                    </div>
                </div>
                <div class="row py-4 justify-content-center">
                    <p>&copy Copyright 2019 | Y-absa Dev</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- CDN Bootstrap JS -->
    <?php include('asset/template/user/js.php'); ?>
</body>
</html>