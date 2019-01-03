<?php include('../../koneksi.php'); ?>
<div class="garis-bawah">
    <h3>Tabel Klinik</h3>
</div>
<table class="table table-responsive-sm table-bordered table-light text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM klinik";
        $query = mysqli_query($db, $sql);
        $i=1;
        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$i."</td>";
            $i++;
            echo "<td class='text-left'>".$data["judul"]."</td>";
            echo '<td>
                    <img src="../../asset/img/uploads/klinik/'.$data['file'].'" height="60" width="75" class="img-thumbnail"/>
                </td>';
            echo "<td class='text-left'>".$data["content"]."</td>";
            $update = "<a href='../proses/update-artikel.php?id=".$data['id']."&data=klinik&page=klinik' class='btn btn-info'>Edit</a>";
            $delete = "<button type='button' class='btn btn-danger hapus' id='{$data['id']}'>Hapus</button>";
            echo "<td>".$update."</td>";
            echo "<td>".$delete."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>