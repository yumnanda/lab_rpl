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
    <title>Ebook</title>
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
                            <!-- Form Publikasi -->
                            <div class="garis-bawah">
                                <div class="row mx-0.5">
                                    <div class="col-md-6">
                                        <h3>Ebook</h3>
                                    </div>
                                    <div class="col-md-6 text-right text-primary a">
                                        <a href="../index.php" class="mx-2">Home</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <a href="#" class="mx-2">Download</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <p class="d-inline-block text-secondary ml-2">Ebook</p>
                                    </div>
                                </div>    
                            </div>
                            <form id="form" action="../proses/create.php" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="data" value="ebook">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" class="form-control-file" name="file" id="file" placeholder="File">
                                </div>
                                <div class="form-group">
                                    <label for="link">link</label>
                                    <input type="text" class="form-control" name="link" id="link" placeholder="Link">
                                </div>
                                <input type="hidden" id="id" name="id" value="0">
                                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
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
        $(".view").load("../view/view-ebook.php");
        $(document).on('click','.hapus', function () {
            var id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "../proses/delete.php",
                data: {data:'ebook',id:id},
                success: function () {
                    $(".view").load("../view/view-ebook.php");
                }
            });
        });
    });
</script>
</body>
</html>