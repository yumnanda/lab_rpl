<?php 
include('../../koneksi.php');
$data = $_POST['data'];
if(isset($data)){
    $id = $_POST['id'];
    if($data == 'topik'){
        $topik = $_POST['topik'];
        $content = $_POST['content'];
        if($topik == 'Software Requirements'){
            $sql = "UPDATE $data SET content='$content' WHERE id='1'";
        }
        else if($topik == 'Software Design'){
            $sql = "UPDATE $data SET content='$content' WHERE id='2'";
        }
        else if($topik == 'Software Construction'){
            $sql = "UPDATE $data SET content='$content' WHERE id='3'";
        }
        else if($topik == 'Software Testing'){
            $sql = "UPDATE $data SET content='$content' WHERE id='4'";
        }
        else if($topik == 'Software Maintenance'){
            $sql = "UPDATE $data SET content='$content' WHERE id='5'";
        }
        else if($topik == 'Software Configuration Management'){
            $sql = "UPDATE $data SET content='$content' WHERE id='6'";
        }
        else{
            alert("Pilihan tidak ada, coba pilih yang lain :)");
        }
        $query = mysqli_query($db, $sql);
    }
    else if($data == 'publikasi'){
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $link = $_POST['link'];
        $sql = "UPDATE $data SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', link = '$link' WHERE id = $id";
        $query = mysqli_query($db, $sql); 
    }
    else if($data == 'dosen'){
        $nama = $_POST['nama'];
        $nidn = $_POST['nidn'];
        $jabatan = $_POST['jabatan'];
        $email = $_POST['email']; 
        $sql = "UPDATE $data SET nama = '$nama', nidn = '$nidn', jabatan = '$jabatan', email = '$email' WHERE id = $id";
        $query = mysqli_query($db, $sql);
    }
    else if($data == 'mahasiswa' || $data == 'alumni'){
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $email = $_POST['email']; 
        $sql = "UPDATE $data SET nama = '$nama', nim = '$nim', email = '$email' WHERE id = $id";
        $query = mysqli_query($db, $sql);
    }
    else if($data == 'ebook'){
        $judul = $_POST['judul'];
        $keterangan = $_POST['keterangan'];
        $link = $_POST['link'];
        $file = $_FILES['file'];
        if(isset($file)){
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'docx', 'doc', 'odt');
            if(in_array($fileActualExt, $allowed)){
                if($fileError===0){
                    if($fileSize<10000){
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = '../asset/img/uploads/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        alert('Upload Sukses');
                    }
                    else{
                        echo "Ukuran file harus dibawah 10 mb";
                    }
                }
                else{
                    echo "Upload file error";
                }
            }
            else{
                echo "extensi file tidak didukung";
            }
        }
        $sql = "UPDATE $data SET judul = '$judul', keterangan = '$keterangan', link = '$link', fileUp = '$fileDestination' WHERE id = $id";
        $query = mysqli_query($db, $sql);
    }
    else if($data == 'jurnal'){
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $link = $_POST['link'];
        $sql = "UPDATE $data SET judul = '$judul', penulis = '$penulis', link = '$link' WHERE id = $id";
        $query = mysqli_query($db, $sql);
    }
    else{
        die("data tidak ada");
        
    }
}
?>