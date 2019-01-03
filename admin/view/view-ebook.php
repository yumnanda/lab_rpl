<?php include('../../koneksi.php'); ?>
<div class="garis-bawah">
    <h3>Tabel Ebook</h3>
</div>
<table class="table table-responsive-sm table-bordered table-light text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>File</th>
            <th>Link</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM ebook";
        $query = mysqli_query($db, $sql);
        $i=1;
        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$i."</td>";
            $i++;
            echo "<td class='text-left'>".$data["judul"]."</td>";
            echo "<td class='text-left'>".$data["keterangan"]."</td>";
            echo "<td class='text-left'>".$data['file']."</td>";
            echo "<td class='text-left'>".$data["link"]."</td>";
            $update = "<a href='../proses/update-ebook.php?id=".$data['id']."&data=ebook&page=Ebook' class='btn btn-info'>Edit</a>";
            $delete = "<button type='button' class='btn btn-danger hapus' id='{$data['id']}'>Hapus</button>";
            echo "<td>".$update."</td>";
            echo "<td>".$delete."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>