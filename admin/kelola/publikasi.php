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
    <title>Publikasi</title>
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
                                        <h3>Publikasi</h3>
                                    </div>
                                    <div class="col-md-6 text-right text-primary a">
                                        <a href="../index.php" class="mx-2">Home</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <a href="#" class="mx-2">Penelitian</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <p class="d-inline-block text-secondary ml-2">Publikasi</p>
                                    </div>    
                                </div>
                            </div>
                            <form id="form">
                                <input type="hidden" name="data" value="publikasi">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Nama Penulis">
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Nama Penerbit">
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" name="link" id="link" placeholder="Link">
                                </div>
                                <input type="hidden" id="id" name="id" value="0">
                                <input type="button" class="btn btn-primary submit" name="submit" value="Submit">
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
        $(".view").load("../view/view-publikasi.php");
        $('.submit').click(function () {
            $id=$('#id').val();
            if($id == 0){
                $.ajax({
                    type: "POST",
                    url: "../proses/create.php",
                    data: $('#form').serialize(),
                    success: function () {
                        $(".view").load("../view/view-publikasi.php");
                        $('#form')[0].reset();
                        $('#id').val(0);
                    }
                });
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "../proses/update.php",
                    data: $('#form').serialize(),
                    success: function () {
                        $(".view").load("../view/view-publikasi.php");
                        $('#form')[0].reset();
                        $('#id').val("0");
                    }
                });
            }
            
        });
        $(document).on('click','.hapus', function () {
            var id = $(this).attr('id');
            $.ajax({
                type: "post",
                url: "../proses/delete.php",
                data: {data:'publikasi',id:id},
                success: function () {
                    $(".view").load("../view/view-publikasi.php");
                }
            });
        });
        $(document).on('click','.edit', function () {
            var row = $(this);
            var id = $(this).attr('id');
            $('#id').val(id);
            var judul = row.closest("tr").find("td:eq(1)").text();
            $('#judul').val(judul);
            var penulis = row.closest("tr").find("td:eq(2)").text();
            $('#penulis').val(penulis);
            var penerbit = row.closest("tr").find("td:eq(3)").text();
            $('#penerbit').val(penerbit);
            var link = row.closest("tr").find("td:eq(4)").text();
            $('#link').val(link);
        });
    });
</script>
</body>
</html>