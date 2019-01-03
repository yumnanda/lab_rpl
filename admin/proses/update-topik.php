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
            $topik = $row['topik'];
            $content = $row['content'];
        }
    }
}
else{
    header("Location: ../kelola/'.$data'");
}

if(isset($_POST['submit'])){
    $topik = $_POST['topik'];
    $content = $_POST['content'];               
    $sql = "UPDATE $data SET topik = '$topik', content = '$content' WHERE id = $id";
    $query = mysqli_query($db, $sql);
    if($query){
       header("Location: ../kelola/{$data}.php");
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
        <?php include('../../asset/template/admin/sidebar.php'); ?>
        <div class="content-wrapper">
            <?php include('../../asset/template/admin/navbar-content.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="content my-3">
                        <div class="container-fluid">
                            <!-- Form update topik -->
                            <div class="garis-bawah">
                                <div class="row mx-0.5">
                                    <div class="col-md-6">
                                        <h3><?php if(isset($page)) echo $page; ?></h3>
                                    </div>
                                    <div class="col-md-6 text-right text-primary a">
                                        <a href="../index.php" class="mx-2">Home</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <a href="#" class="mx-2">Penelitian</a>
                                        <p class="d-inline-block"><i class="fas fa-angle-right"></i></p>
                                        <p class="d-inline-block text-secondary ml-2">Topik Research</p>
                                    </div>    
                                </div>
                            </div>
                            <form id="form" action="" method="POST" enctype="multipart/form-data" >
                                <input type="hidden" name="data" value="topik">
                                <div class="form-group">
                                    <label for="topik">Judul</label>
                                    <input type="text" class="form-control" name="topik" id="topik" value="<?php if(isset($topik)) echo $topik; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="content">Tulis Content</label>
                                    <textarea name="content" id="content" name="content" cols="80" rows="10"><?php if(isset($content)) echo $content; ?></textarea>
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