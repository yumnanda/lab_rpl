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
    <title>Bidang Kajian</title>
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
                            <!-- Form Topik Research -->
                            <div class="garis-bawah">
                                <div class="row mx-0.5">
                                    <div class="col-md-6">
                                        <h3>Bidang Kajian</h3>
                                    </div>
                                    <div class="col-md-6 text-right text-primary a">
                                        <a href="../index.php" class="mx-2">Home</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <p class="d-inline-block text-secondary ml-2">Bidang Kajian</p>
                                    </div>    
                                </div>
                            </div>
                            <form action="../proses/create.php" method="POST" enctype="multipart/data-form">
                                <input type="hidden" name="data" value="kajian">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Bidang Kajian">
                                </div>
                                <div class="form-group">
                                    <label for="content">Tulis Content</label>
                                    <textarea class="form-control" name="content" id="content" name="content" cols="80" rows="10"></textarea>
                                </div>
                                <input type="hidden" id="id" name="id" value="0">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            </form>
                            <!-- End Form -->
                            <!-- View tabel kajian -->
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
        $(".view").load("../view/view-kajian.php");
        $(document).on('click','.hapus', function () {
            var id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "../proses/delete.php",
                data: {data:'kajian',id:id},
                success: function () {
                    $(".view").load("../view/view-kajian.php");
                }
            });
        });
        CKEDITOR.replace( 'content' ); 
    });
    </script>
</body>
</html>