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
            $content = $row['content'];
            $file = $row['file'];
            if($data == 'news'){
                $kategori = $row['kategori'];
            }
        }
    }
}
else{
    header("Location: ../kelola/'.$data'");
}
if($page == 'Workshop' || $page == 'Lomba' || $page == 'Klinik'){
    $bidang = 'Kegiatan';
}
else if($page == 'News'){
    $bidang = 'Informasi';
}
else if($page == 'Materi'){
    $bidang = 'Materi';
}
else{
   echo 'Halaman tidak ada';
}

if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    $content = $_POST['content'];
    $file_name = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $folder="../../asset/img/uploads/".$data."/";
    if($data == 'news'){
        if(is_file("../../asset/img/uploads/news/".$file));{
            unlink("../../asset/img/uploads/news/".$file);
        }
        if(move_uploaded_file($file_tmp, $folder.$file_name)){                
            $sql = "UPDATE $data SET judul = '$judul', kategori ='$kategori', file = '$file_name', content = '$content' WHERE id = $id";
            $query = mysqli_query($db, $sql);
            if($query){
               header("Location: ../kelola/{$data}.php");
            }
        }
    }
    else if($data == 'workshop'){
        if(is_file("../../asset/img/uploads/".$data."/".$file));{
            unlink("../../asset/img/uploads/".$data."/".$file);
        }
        if(move_uploaded_file($file_tmp, $folder.$file_name)){                
            $sql = "UPDATE $data SET judul = '$judul', file = '$file_name', content = '$content' WHERE id = $id";
            $query = mysqli_query($db, $sql);
            if($query){
               header("Location: ../kelola/{$data}.php");
            }
        }
    }
    else if($data == 'lomba'){
        if(is_file("../../asset/img/uploads/".$data."/".$file));{
            unlink("../../asset/img/uploads/".$data."/".$file);
        }
        if(move_uploaded_file($file_tmp, $folder.$file_name)){                
            $sql = "UPDATE $data SET judul = '$judul', file = '$file_name', content = '$content' WHERE id = $id";
            $query = mysqli_query($db, $sql);
            if($query){
               header("Location: ../kelola/{$data}.php");
            }
        }
    }
    else if($data == 'klinik'){
        if(is_file("../../asset/img/uploads/".$data."/".$file));{
            unlink("../../asset/img/uploads/".$data."/".$file);
        }
        if(move_uploaded_file($file_tmp, $folder.$file_name)){                
            $sql = "UPDATE $data SET judul = '$judul', file = '$file_name', content = '$content' WHERE id = $id";
            $query = mysqli_query($db, $sql);
            if($query){
               header("Location: ../kelola/{$data}.php");
            }
        }
    }
    else if($data == 'materi'){
        if(is_file("../../asset/img/uploads/".$data."/".$file));{
            unlink("../../asset/img/uploads/".$data."/".$file);
        }
        if(move_uploaded_file($file_tmp, $folder.$file_name)){                
            $sql = "UPDATE $data SET judul = '$judul', file = '$file_name', content = '$content' WHERE id = $id";
            $query = mysqli_query($db, $sql);
            if($query){
               header("Location: ../kelola/{$data}.php");
            }
        }
    }
    else{
        die("data tidak ada");
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if(isset($page)) echo $page; ?></title>
    <?php include('../../asset/template/admin/css.php'); ?>
</head>
<body>
    <div id="wrapper">
        <?php include('../../asset/template/admin/sidebar-update.php'); ?>
        <div class="content-wrapper">
            <?php include('../../asset/template/admin/navbar-content.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="content my-5">
                        <div class="container-fluid">
                            <div class="garis-bawah">
                                <div class="row mx-0.5">
                                    <div class="col-md-6">
                                       <h3><?php if(isset($page)) echo $page; ?></h3>
                                    </div>
                                    <div class="col-md-6 text-right text-primary a">
                                        <a href="../index.php" class="mx-2">Home</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <?php  if($page == 'News' || $page == 'Materi'){
                                            echo '<p class="d-inline-block text-secondary ml-2">'.$bidang.'</p>';
                                        }
                                        else{
                                            echo '<a href="#" class="mx-2">'.$bidang.'</a>';
                                        }?>

                                        <?php  if($page != 'News' && $page != 'Materi'){
                                        echo '<p class="d-inline-block"><i class="fas fa-angle-right"></i></p>';
                                        echo '<p class="d-inline-block text-secondary ml-2">'.$page.'</p>';
                                        } ?>
                                    </div>    
                                </div>
                            </div>
                            <form id="form" action="" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="data" value="news">
                                <div class="form-group">
                                    <label for="Judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" value="<?php if(isset($judul)) echo $judul; ?>">
                                </div>
                                <?php if($data == 'news'){
                                    echo '<div class="form-group">';
                                    echo '<label for="kategori">Kategori</label>';
                                    echo '<select class="form-control" id="kategori" name="kategori">';
                                    echo '<option>'.$kategori.'</option>';
                                    echo '</select>';
                                    echo '</div>';
                                } ?>
                                <div class="form-group">
                                    <label for="content">Tulis Content</label>
                                    <textarea name="content" id="content" name="content" cols="80" rows="10"><?php if(isset($content)) echo $content; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar" >
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
    <script>CKEDITOR.replace( 'content' );</script>
    </body>
</html>