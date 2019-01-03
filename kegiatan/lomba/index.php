<?php include('../../koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lomba | RPL Udinus</title>
    <?php include('../../asset/template/user/css.php'); ?>
</head>
<body>
    <!-- Header -->
    <header class="header pt-5">
        <div class="container">
            <div class="media">
                <img class="align-self-center mr-3" src="../../asset/img/logo.png" width="100" height="100" alt="logo">
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
            <a class="navbar-brand" href="../../">Beranda</a>
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
                            <a class="dropdown-item" href="../../penelitian/topik/">Topik Research</a>
                            <a class="dropdown-item" href="../../penelitian/publikasi/">Publikasi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Anggota
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../anggota/dosen/">Dosen</a>
                            <a class="dropdown-item" href="../../anggota/mahasiswa/">Mahasiswa</a>
                            <a class="dropdown-item" href="../../anggota/alumni/">alumni</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Informasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../download/jurnal/">Jurnal</a>
                            <a class="dropdown-item" href="../../download/ebook/">E-Book</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../materi/">Materi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kegiatan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../../kegiatan/workshop/">Workshop</a>
                            <a class="dropdown-item" href="../../kegiatan/klinik/">Klinik</a>
                            <a class="dropdown-item" href="../../kegiatan/lomba/">Lomba</a>
                        </div>
                    </li>
                </ul>
                <form action="../../search/" method="GET" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="keyword" type="search" autofocus placeholder="Cari.." autocomplete="off" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Breadcrump -->
    <div class="wrap-breadcrump">
        <div class="garis-bawah">
            <div class="container">
                <div class="row mx-1 mb-2">
                    <div class="col-md-6">
                        <h3>Lomba</h3>
                    </div>
                    <div class="col-md-6 text-right text-primary a">
                        <a href="../../" class="mx-2">Beranda</a>
                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                        <a href="#" class="mx-2">Kegiatan</a>
                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                        <p class="d-inline-block text-secondary ml-2">Lomba</p>
                    </div>    
                </div>
            </div>
        </div>
    </div>  
    <!-- End Breadcrump -->
    <!-- Content -->
    <div class="wrap-content">
        <div class="container">
            <div class="card-columns">
            <?php 
            $sql = "SELECT * FROM lomba";
            $query = mysqli_query($db, $sql);
            while($data = mysqli_fetch_array($query)){
                echo '<div class="card shadow p-3 mb-5 bg-white rounded" style="max-width: 18rem;">';
                    echo '<img src="../../asset/img/uploads/lomba/'.$data["file"].'" class="card-img-top" alt="'.$data["file"].'">';
                    echo '<div class="card-body a">';
                        echo '<h5 class="card-title mb-5">'.$data['judul'].'</h5>';
                        echo '<div class="text-right">';
                            echo '<a href="data.php?id='.$data['id'].'" class="btn btn-info">Read more</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
            ?>
            </div>
        </div>
    </div>
    <!-- End Content -->
    <?php include('../../asset/template/user/js.php'); ?>
    <?php include('../../asset/template/user/footer.php'); ?>
</body>
</html>