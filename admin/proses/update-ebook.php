<?php 
include('../../koneksi.php'); 

if($_GET['id']){
    $id = $_GET['id'];
    $data = $_GET['data'];
    $page = $_GET['page'];
    $sql = "SELECT * FROM $data WHERE id = $id";
    $query = mysqli_query($db,$sql);
    if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_assoc($query)){
            $judul = $row['judul'];
            $keterangan = $row['keterangan'];
            $file = $row['file'];
            $link = $row['link'];
        }
    }
}
else{
    header("Location: ../kelola/'.$data'");
}

if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
    $link = $_POST['link'];
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $folder="../../asset/ebook/";
    if(is_file("../../asset/ebook/".$file));{
        unlink("../../asset/ebook/".$file);
    }
    if(move_uploaded_file($file_tmp, $folder.$file_name)){                
        $sql = "UPDATE $data SET judul = '$judul',  keterangan = '$keterangan', file = '$file_name', link = '$link' WHERE id = $id";
        $query = mysqli_query($db, $sql);
        if($query){
           header("Location: ../kelola/{$data}.php");
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if(isset($page)) echo $page ?></title>
    <?php include('../../asset/template/admin/css.php'); ?>
</head>
<body>
    <div id="wrapper">
        <?php include('../../asset/template/admin/sidebar.php'); ?>
        <div class="content-wrapper">
            <?php include('../../asset/template/admin/navbar-content.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="content my-5">
                        <div class="container-fluid">
                            <!-- Form Materi -->
                            <div class="garis-bawah">
                                <div class="row mx-0.5">
                                    <div class="col-md-6">
                                        <h3><?php if(isset($page)) echo $page; ?></h3>
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
                            <form id="form" action="" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="data" value="news">
                                <div class="form-group">
                                    <label for="Judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" value="<?php if(isset($judul)) echo $judul ?>">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" name="keterangan"><?php if(isset($keterangan)) echo $keterangan ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" class="form-control-file" id="file" name="file" >
                                </div>
                                <div class="form-group">
                                    <label for="link">link</label>
                                    <input type="text" class="form-control" name="link" id="link" value="<?php if(isset($link)) echo $link ?>">
                                </div>
                                <input type="submit" class="btn btn-primary submit" name="submit" value="Simpan">
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
    </body>
</html>