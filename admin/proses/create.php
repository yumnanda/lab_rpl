<?php 
include('../../koneksi.php');
$data = $_POST['data'];
if(isset($data)){
    if($data == 'topik'){
        if(isset($_POST['submit'])){
            $topik = $_POST['topik'];
            $content = $_POST['content'];
            $sql = "INSERT INTO $data (topik,content) VALUES ('$topik','$content')";
            $query = mysqli_query($db, $sql);
            if($query){
                header("Location: ../kelola/{$data}.php");
            }
        }
    }
    else if($data == 'publikasi'){
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $link = $_POST['link'];
        $sql = "INSERT INTO $data (judul,penulis,penerbit,link) VALUES ('$judul','$penulis','$penerbit','$link')";
        $query = mysqli_query($db, $sql); 
    }
    else if($data == 'dosen'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nama = $_POST['nama'];
            $nidn = $_POST['nidn'];
            $jabatan = $_POST['jabatan'];
            $email = $_POST['email']; 
            $sql = "INSERT INTO $data (nama,nidn,jabatan,email) VALUES ('$nama','$nidn','$jabatan','$email')";
            $query = mysqli_query($db, $sql);
        }
    }
    else if($data == 'mahasiswa' || $data == 'alumni'){
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $email = $_POST['email']; 
        $sql = "INSERT INTO $data (nama,nim,email) VALUES ('$nama','$nim','$email')";
        $query = mysqli_query($db, $sql);
    }
    else if($data == 'ebook'){
        if(isset($_POST['submit'])){
            $judul = $_POST['judul'];
            $keterangan = $_POST['keterangan'];
            $link = $_POST['link'];
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $folder="../../asset/ebook/";
            if(move_uploaded_file($file_tmp, $folder.$file_name)){
                $sql = "INSERT INTO $data (judul,keterangan,file,link) VALUES ('$judul','$keterangan','$file_name', '$link')";
                $query = mysqli_query($db, $sql);
                if($query){
                    header("Location: ../kelola/{$data}.php");
                }
            }
        }
    }
    else if($data == 'jurnal'){
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $link = $_POST['link'];
        $sql = "INSERT INTO $data (judul,penulis,link) VALUES ('$judul','$penulis','$link')";
        $query = mysqli_query($db, $sql);
    }
    else if($data == 'kajian'){
        if(isset($_POST['submit'])){
            $judul = $_POST['judul'];
            $content = $_POST['content'];
            $sql = "INSERT INTO $data (judul,content) VALUES ('$judul','$content')";
            $query = mysqli_query($db, $sql);
            if($query){
                header("Location: ../kelola/{$data}.php");
            }
        }
    }
    else{
        if(isset($_POST['submit'])){
            $judul = $_POST['judul'];
            $content = $_POST['content'];
            $file_name = $_FILES['gambar']['name'];
            $file_tmp = $_FILES['gambar']['tmp_name'];
            $folder="../../asset/img/uploads/".$data."/";
            if($data == 'news'){
                $kategori = $_POST['kategori'];
                if(move_uploaded_file($file_tmp, $folder.$file_name)){
                    $sql = "INSERT INTO $data (judul,kategori,file,content) VALUES ('$judul','$kategori','$file_name','$content')";
                    $query = mysqli_query($db, $sql);
                    if($query){
                        header("Location: ../kelola/{$data}.php");
                    }
                }
            }
            else{
                if(move_uploaded_file($file_tmp, $folder.$file_name)){
                    $sql = "INSERT INTO $data (judul,file,content) VALUES ('$judul','$file_name','$content')";
                    $query = mysqli_query($db, $sql);
                    if($query){
                        header("Location: ../kelola/{$data}.php");
                    }
                }
            }
        }
        
    }
}
?>