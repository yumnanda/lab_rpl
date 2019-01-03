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
    <title>Mahasiswa</title>
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
                            <!-- Form Insert Mahasiswa -->
                            <div class="garis-bawah">
                                <div class="row mx-0.5">
                                    <div class="col-md-6">
                                        <h3>Mahasiswa</h3>
                                    </div>
                                    <div class="col-md-6 text-right text-primary a">
                                        <a href="../index.php" class="mx-2">Home</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <a href="#" class="mx-2">Anggota</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <p class="d-inline-block text-secondary ml-2">Mahasiswa</p>
                                    </div> 
                                </div>   
                            </div>
                            <form id="form">
                                <input type="hidden" name="data" value="mahasiswa">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <input type="hidden" id="id" name="id" value="0">
                                <input type="button" class="btn btn-primary submit" value="Submit">
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
        $(".view").load("../view/view-mahasiswa.php");
        $('.submit').click(function () {
            $id=$('#id').val();
            if($id == 0){
                $.ajax({
                    type: "POST",
                    url: "../proses/create.php",
                    data: $('#form').serialize(),
                    success: function () {
                        $(".view").load("../view/view-mahasiswa.php");
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
                        $(".view").load("../view/view-mahasiswa.php");
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
                data: {data:'mahasiswa',id:id},
                success: function () {
                    $(".view").load("../view/view-mahasiswa.php");
                }
            });
        });
        $(document).on('click','.edit', function () {
            var row = $(this);
            var id = $(this).attr('id');
            $('#id').val(id);
            var nama = row.closest("tr").find("td:eq(1)").text();
            $('#nama').val(nama);
            var nim = row.closest("tr").find("td:eq(2)").text();
            $('#nim').val(nim);
            var email = row.closest("tr").find("td:eq(3)").text();
            $('#email').val(email);
        });
    });
</script>
</body>
</html>