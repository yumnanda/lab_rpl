<?PHP
include('../../koneksi.php');
if(isset($_POST['id'])){
    $data = $_POST['data'];  
    $id = $_POST['id'];
    $isi = "SELECT * FROM $data WHERE $id";
    $tampData = mysqli_query($db, $isi);
    $arr = mysqli_fetch_array($tampData);
    if(isset($arr['file'])){
        if($data == 'ebook'){ 
            if(is_file("../../asset/ebook/".$arr['file'])){
                unlink("../../asset/ebook/".$arr['file']);
            }
        }
        else if($data == 'lomba'){ 
            if(is_file("../../asset/img/uploads/lomba/".$arr['file'])){
                unlink("../../asset/img/uploads/lomba/".$arr['file']);
            }
        }
        else if($data == 'news'){ 
            if(is_file("../../asset/img/uploads/news/".$arr['file'])){
                unlink("../../asset/img/uploads/news/".$arr['file']);
            }
        }
        else if($data == 'workshop'){ 
            if(is_file("../../asset/img/uploads/workshop/".$arr['file'])){
                unlink("../../asset/img/uploads/workshop/".$arr['file']);
            }
        }
        else{
            if(is_file("../../asset/img/uploads/materi/".$arr['file']));{
                unlink("../../asset/img/uploads/materi/".$arr['file']);
            }
        }
        
    }
    $sql = "DELETE FROM $data WHERE id=$id";
    $query = mysqli_query($db, $sql);

}
?>