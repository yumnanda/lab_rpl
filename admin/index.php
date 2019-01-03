<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: login/login.php');
    }

    require '../koneksi.php';
    $sql = "SELECT * FROM statistik ORDER BY date_create DESC";
    $query = $db->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Bootstrap core CSS -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../asset/css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li id="home" class="sidebar-brand menu border-bottom">
                    <a href="index.php">ADMIN</a>
                </li>
                <li data-toggle="collapse" data-target="#penelitian" class="collapsed">
                    <a href="#">Penelitian</a>
                    </li>  
                    <ul class="collapse" id="penelitian">
                        <li id="topik" class="menu"><a href="kelola/topik.php">Topik Research</a></li>
                        <li id="publikasi" class="menu"><a href="kelola/publikasi.php">Publikasi</a></li>
                    </ul>
                <li data-toggle="collapse" data-target="#anggota" class="collapsed">
                    <a href="#">Anggota<span class="arrow"></span></a>
                    </li>  
                    <ul class="sub-menu collapse" id="anggota">
                        <li id="dosen" class="menu"><a href="kelola/dosen.php">Dosen</a></li>
                        <li id="mahasiswa" class="menu"><a href="kelola/mahasiswa.php">Mahasiswa</a></li>
                        <li id="alumni" class="menu"><a href="kelola/alumni.php">Alumnni</a></li>
                    </ul>
                <li id="informasi" class="menu"><a href="kelola/news.php">Informasi</a></li>
                <li data-toggle="collapse" data-target="#download" class="collapsed">
                    <a href="#">Download<span class="arrow"></span></a>
                    </li>  
                    <ul class="sub-menu collapse" id="download">
                        <li id="jurnal" class="menu"><a href="kelola/jurnal.php">Jurnal</a></li>
                        <li id="ebook" class="menu"><a href="kelola/ebook.php">Ebook</a></li>
                    </ul>
                <li id="materi" class="menu"><a href="kelola/materi.php">Materi</a></li>
                <li data-toggle="collapse" data-target="#kegiatan" class="collapsed">
                    <a href="#">Kegiatan<span class="arrow"></span></a>
                    </li>  
                    <ul class="sub-menu collapse" id="kegiatan">
                        <li id="workshop" class="menu"><a href="kelola/workshop.php">Workshop</a></li>
                        <li id="klinik" class="menu"><a href="kelola/klinik.php">Klinik</a></li>
                        <li id="lomba" class="menu"><a href="kelola/lomba.php">Lomba</a></li>
                    </ul>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="content-wrapper">
            <!-- Navbar Content -->
            <div class="nav-content-wrapper bg-biru">
                    <nav class="navbar navbar-expand px-4">
                        <a href="#menu-toggle" class="text-white" id="menu-toggle"><i class="fa fa-bars fa-lg"></i></a>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"> 
                                <a class="nav-link text-white border rounded " href="login/logout.php">Keluar</a>
                            </li>
                        </ul>
                    </nav>
            </div>
            <!-- End Navbar Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="content mt-5">
                        <div class="container-fluid">
                            <div class="content text-center">
                                <div class="garis-bawah">
                                    <h2>WELCOME ADMIN</h2>
                                </div>
                                <h3 class="mt-5 mb-3">Daftar User</h3>
                                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                                    <tr>
                                        <td>IP</td>
                                        <td>Browser</td>
                                        <td>OS</td>
                                        <td>Date</td>
                                    </tr>
                                    <?php
                                    while ($row=$query->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['ip'];?></td>
                                            <td><?php echo $row['browser'];?></td>
                                            <td><?php echo $row['os'];?></td>
                                            <td><?php echo $row['date_create'];?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>
    <script type="text/javascript">
    // Menu Toggle Scrip
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
