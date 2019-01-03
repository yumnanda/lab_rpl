<?php include('../../koneksi.php'); ?>
<div class="garis-bawah">
    <h3>Tabel News</h3>
</div>
<table class="table table-responsive-sm table-bordered table-light text-center">
    <thead class="thead-primary">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM news";
        $query = mysqli_query($db, $sql);
        $i=1;
        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$i."</td>";
            $i++;
            echo "<td class='text-left'>".$data["judul"]."</td>";
            echo "<td class='text-left'>".$data["kategori"]."</td>";
            echo '<td>
                    <img src="../../asset/img/uploads/news/'.$data['file'].'" height="60" width="75" class="img-thumbnail"/>
                </td>';
            echo "<td class='text-left'>".$data["content"]."</td>";
            $update = "<a href='../proses/update-artikel.php?id=".$data['id']."&data=news&page=News' class='btn btn-info'>Edit</a>";
            $delete = "<button type='button' class='btn btn-danger hapus' id='{$data['id']}'>Hapus</button>";
            echo "<td>".$update."</td>";
            echo "<td>".$delete."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>