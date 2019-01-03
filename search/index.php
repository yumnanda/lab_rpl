<?php include('../koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search | RPL Udinus</title>
    <?php include('../asset/template/user/css.php'); ?>
</head>
<body>
    <!-- Header -->
    <header class="header pt-5">
        <div class="container">
            <div class="media">
                <img class="align-self-center mr-3" src="../asset/img/logo.png" width="100" height="100" alt="logo">
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
            <a class="navbar-brand" href="../">Beranda</a>
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
                            <a class="dropdown-item" href="../penelitian/topik/">Topik Research</a>
                            <a class="dropdown-item" href="../penelitian/publikasi/">Publikasi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Anggota
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../anggota/dosen/">Dosen</a>
                            <a class="dropdown-item" href="../anggota/mahasiswa/">Mahasiswa</a>
                            <a class="dropdown-item" href="../anggota/alumni/">Alumni</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../informasi/news/">Informasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../download/jurnal/">Jurnal</a>
                            <a class="dropdown-item" href="../download/ebook/">E-Book</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../materi/">Materi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kegiatan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../kegiatan/workshop/">Workshop</a>
                            <a class="dropdown-item" href="../kegiatan/klinik/">Klinik</a>
                            <a class="dropdown-item" href="../kegiatan/lomba/">Lomba</a>
                        </div>
                    </li>
                </ul>
                <form action="../search/" method="GET" class="form-inline my-2 my-lg-0">
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
                        <h3>Search</h3>
                    </div>
                    <div class="col-md-6 text-right text-primary a">
                        <a href="../index.php" class="mx-2">Beranda</a>
                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                        <p class="d-inline-block text-secondary ml-2">Search</p>
                    </div>    
                </div>
            </div>
        </div>
    </div>  
    <!-- End Breadcrump -->
    <!-- Content -->
    <div class="wrap-content">
        <div class="container">
        <?php
            $kata = $_GET['keyword'];
            $min_length = 3;
            if(strlen($kata) >= $min_length){ 
                $kata = htmlspecialchars($kata); 
                $kata = mysqli_real_escape_string($db, $kata);
                // Tabel Topik
                $topik="SELECT * FROM topik WHERE (topik LIKE '%".$kata."%' OR content LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db, $topik) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Topik Research</h3>";
                    echo '<table class="table table-responsive-sm table-hover table-light">';
                    while($data = mysqli_fetch_array($raw_results)){
                        echo "<tr>";
                        echo "<td>".$data["topik"]."</td>";
                        echo "<td class='text-center'><a href='data.php' class='btn btn-success'><i class='fas fa-link'></i></a></td>";
                        echo "</tr>";
                    }
                    echo '</table>';
                    $ketemu=1;
                }
                // Tabel Publikasi
                $publikasi="SELECT * FROM publikasi WHERE (judul LIKE '%".$kata."%' OR penulis LIKE '%".$kata."%' OR penerbit LIKE '%".$kata."%' OR link LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db, $publikasi) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Publikasi</h3>";
                    echo '<table class="table table-responsive-sm table-hover table-light">';
                    while($data = mysqli_fetch_array($raw_results)){
                        echo "<tr>";
                        echo "<td>".$data["judul"]."</td>";
                        echo "<td>".$data["penulis"]."</td>";
                        echo "<td>".$data["penerbit"]."</td>";
                        echo "<td class='text-center'><a href='".$data["link"]."' class='btn btn-success'><i class='fas fa-link'></i></a></td>";
                        echo "</tr>";

                    }
                    echo '</table>';
                    $ketemu=1;
                }
                // Tabel E-book
                $ebook="SELECT * FROM ebook WHERE (judul LIKE '%".$kata."%' OR keterangan LIKE '%".$kata."%' OR file LIKE '%".$kata."%' OR link LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$ebook) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>E-book</h3>";
                    echo '<table class="table table-responsive-sm table-hover table-light">';
                    while($data = mysqli_fetch_array($raw_results)){
                        echo "<tr>";
                        echo "<td>".$data["judul"]."</td>";
                        echo "<td>".$data["keterangan"]."</td>";
                        echo "<td class='text-center'><a href='".$data["link"]."' class='btn btn-success'><i class='fas fa-link'></i></a></td>";
                        echo "</tr>";

                    }
                    echo '</table>';
                    $ketemu=1;
                }
                // Tabel jurnal
                $jurnal="SELECT * FROM jurnal WHERE (judul LIKE '%".$kata."%' OR penulis LIKE '%".$kata."%' OR link LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$jurnal) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Jurnal</h3>";
                    echo '<table class="table table-responsive-sm table-hover table-light">';
                    while($data = mysqli_fetch_array($raw_results)){
                        echo "<tr>";
                        echo "<td>".$data["judul"]."</td>";
                        echo "<td>".$data["penulis"]."</td>";
                        echo "<td class='text-center'><a href='".$data["link"]."' class='btn btn-success'><i class='fas fa-link'></i></a></td>";
                        echo "</tr>";
                    }
                    echo '</table>';
                    $ketemu=1;
                }
                // Tabel Dosen
                $dosen="SELECT * FROM dosen WHERE (nama LIKE '%".$kata."%' OR nidn LIKE '%".$kata."%' OR jabatan LIKE '%".$kata."%' OR email LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$dosen) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Dosen</h3>";
                    echo '<table class="table table-responsive-sm table-hover table-light">';
                    while($data = mysqli_fetch_array($raw_results)){
                        echo "<tr>";
                        echo "<td>".$data["nama"]."</td>";
                        echo "<td>".$data["nidn"]."</td>";
                        echo "<td>".$data["jabatan"]."</td>";
                        echo "<td>".$data["minat"]."</td>";
                        echo "<td>".$data["email"]."</td>";
                        echo "</tr>";
                    }
                    echo '</table>';
                    $ketemu=1;
                }
                // Tabel Mahasiswa
                $mahasiswa="SELECT * FROM mahasiswa WHERE (nama LIKE '%".$kata."%' OR nim LIKE '%".$kata."%' OR email LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$mahasiswa) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Mahasiswa</h3>";
                    echo '<table class="table table-responsive-sm table-hover table-light">';
                    while($data = mysqli_fetch_array($raw_results)){
                        echo "<tr>";
                        echo "<td>".$data["nama"]."</td>";
                        echo "<td>".$data["nim"]."</td>";
                        echo "<td>".$data["email"]."</td>";
                        echo "</tr>";
                    }
                    echo '</table>';
                    $ketemu=1;
                }
                // Tabel Alumni
                $alumni="SELECT * FROM alumni WHERE (nama LIKE '%".$kata."%' OR nim LIKE '%".$kata."%' OR email LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$alumni) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Alumni</h3>";
                    echo '<table class="table table-responsive-sm table-hover table-light">';
                    while($data = mysqli_fetch_array($raw_results)){
                        echo "<tr>";
                        echo "<td>".$data["nama"]."</td>";
                        echo "<td>".$data["nim"]."</td>";
                        echo "<td>".$data["email"]."</td>";
                        echo "</tr>";
                    }
                    echo '</table>';
                    $ketemu=1;
                }
                // Tabel news
                $news="SELECT * FROM news WHERE (judul LIKE '%".$kata."%' OR  kategori LIKE '%".$kata."%' OR file LIKE '%".$kata."%' OR content LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$news) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>News</h3>";
                    while($data = mysqli_fetch_array($raw_results)){
                        echo '<div class="card shadow p-3 mb-5 bg-white rounded" style="max-width: 18rem;">';
                            echo '<img src="../../asset/img/uploads/news/'.$data["file"].'" class="card-img-top" alt="'.$data["file"].'">';
                            echo '<div class="card-body a">';
                                echo '<h5 class="card-title mb-5">'.$data['judul'].'</h5>';
                                echo '<div class="text-right">';
                                    echo '<a href="#" class="btn btn-info">Read more</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    $ketemu=1;
                }
                // Tabel klinik
                $klinik="SELECT * FROM klinik WHERE (judul LIKE '%".$kata."%'  OR file LIKE '%".$kata."%' OR content LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$klinik) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Klinik</h3>";
                    while($data = mysqli_fetch_array($raw_results)){
                        echo '<div class="card shadow p-3 mb-5 bg-white rounded" style="max-width: 18rem;">';
                            echo '<img src="../../asset/img/uploads/klinik/'.$data["file"].'" class="card-img-top" alt="'.$data["file"].'">';
                            echo '<div class="card-body a">';
                                echo '<h5 class="card-title mb-5">'.$data['judul'].'</h5>';
                                echo '<div class="text-right">';
                                    echo '<a href="#" class="btn btn-info">Read more</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    $ketemu=1;
                }
                $lomba="SELECT * FROM lomba WHERE (judul LIKE '%".$kata."%'  OR file LIKE '%".$kata."%' OR content LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$lomba) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Lomba</h3>";
                    while($data = mysqli_fetch_array($raw_results)){
                        echo '<div class="card shadow p-3 mb-5 bg-white rounded" style="max-width: 18rem;">';
                            echo '<img src="../../asset/img/uploads/lomba/'.$data["file"].'" class="card-img-top" alt="'.$data["file"].'">';
                            echo '<div class="card-body a">';
                                echo '<h5 class="card-title mb-5">'.$data['judul'].'</h5>';
                                echo '<div class="text-right">';
                                    echo '<a href="#" class="btn btn-info">Read more</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    $ketemu=1;
                }
                $workshop="SELECT * FROM workshop WHERE (judul LIKE '%".$kata."%'  OR file LIKE '%".$kata."%' OR content LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$workshop) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Workshop</h3>";
                    while($data = mysqli_fetch_array($raw_results)){
                        echo '<div class="card shadow p-3 mb-5 bg-white rounded" style="max-width: 18rem;">';
                            echo '<img src="../../asset/img/uploads/workshop/'.$data["file"].'" class="card-img-top" alt="'.$data["file"].'">';
                            echo '<div class="card-body a">';
                                echo '<h5 class="card-title mb-5">'.$data['judul'].'</h5>';
                                echo '<div class="text-right">';
                                    echo '<a href="#" class="btn btn-info">Read more</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    $ketemu=1;
                }
                $materi="SELECT * FROM materi WHERE (judul LIKE '%".$kata."%'  OR file LIKE '%".$kata."%' OR content LIKE '%".$kata."%')";
                $raw_results = mysqli_query($db,$materi) or die(mysqli_error());
                if(mysqli_num_rows($raw_results) > 0){
                    echo "<h3>Materi</h3>";
                    while($data = mysqli_fetch_array($raw_results)){
                        echo '<div class="card shadow p-3 mb-5 bg-white rounded" style="max-width: 18rem;">';
                            echo '<img src="../../asset/img/uploads/materi/'.$data["file"].'" class="card-img-top" alt="'.$data["file"].'">';
                            echo '<div class="card-body a">';
                                echo '<h5 class="card-title mb-5">'.$data['judul'].'</h5>';
                                echo '<div class="text-right">';
                                    echo '<a href="#" class="btn btn-info">Read more</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    $ketemu=1;
                }
                if($ketemu!=0){
                    $ketemu=1;
                }
                else{ // jika tidak ada baris yang cocok lakukan
                    echo "No results";
                }
                
            }
            else{ // jika panjang kueri kurang dari minimum
                echo "Minimum length is ".$min_length;
            }
        ?>

        </div>
    </div>
    <!-- End Content -->
    <?php include('../asset/template/user/js.php'); ?>
    <?php include('../asset/template/user/footer.php'); ?>
</body>
</html>