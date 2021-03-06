<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('location: ../login/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <?php include('../../asset/template/admin/css.php'); ?>
</head>
<body>
    <div id="wrapper">
        <?php include('../../asset/template/admin/sidebar.php'); ?>
        <div class="content-wrapper">
            <?php include('../../asset/template/admin/navbar-content.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="content my-3">
                        <div class="container-fluid">
                            <!-- Form News -->
                            <div class="garis-bawah">
                                <div class="row mx-0.5">
                                    <div class="col-md-6">
                                        <h3>News</h3>
                                    </div>
                                    <div class="col-md-6 text-right text-primary a">
                                        <a href="../index.php" class="mx-2">Home</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <p class="d-inline-block text-secondary ml-2">Informasi</p>
                                    </div> 
                                </div>   
                            </div>
                            <form id="form" action="../proses/create.php" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="data" value="news">
                                <div class="form-group">
                                    <label for="Judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori" required>
                                        <option>-- Pilih Kategori --</option>
                                        <option>Technology</option>
                                        <option>Design</option>
                                        <option>Network</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="content">Tulis Content</label>
                                    <textarea name="content" id="content" name="content" cols="80" rows="10" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar" required>
                                </div>
                                <input type="hidden" id="id" name="id" value="0">
                                <input type="submit" class="btn btn-primary submit" name="submit" value="Submit">
                            </form>
                            <!-- End Form -->
                            <!-- View tabel alumni -->
                            <div class="view my-5"></div>
                            <!-- End view -->
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php include('../../asset/template/admin/js.php'); ?>
    <script>
        $(document).ready(function () {
            $(".view").load("../view/view-news.php");
            $(document).on('click','.hapus', function () {
                var id = $(this).attr('id');
                $.ajax({
                    type: "post",
                    url: "../proses/delete.php",
                    data: {data:'news',id:id},
                    success: function () {
                        $(".view").load("../view/view-news.php");
                    }
                });
            });
        });
        CKEDITOR.replace( 'content' );
    </script>
</body>
</html>