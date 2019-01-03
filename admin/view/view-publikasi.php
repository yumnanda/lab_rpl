<?php include('../../koneksi.php'); ?>
<div class="garis-bawah">
    <h3>Tabel Publikasi</h3>
</div>
<table class="table table-responsive table-bordered table-light text-center">
    <thead class="thead-primary">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Link</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM publikasi";
        $query = mysqli_query($db, $sql);
        $i=1;
        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$i."</td>";
            $i++;
            echo "<td class='text-left'>".$data["judul"]."</td>";
            echo "<td class='text-left'>".$data["penulis"]."</td>";
            echo "<td class='text-left'>".$data["penerbit"]."</td>";
            echo "<td class='text-left'>".$data["link"]."</td>";
            $update = "<button type='button' class='btn btn-info edit' id='{$data['id']}'>Edit</button>";
            $delete = "<button type='button' class='btn btn-danger hapus' id='{$data['id']}'>Hapus</button>";
            echo "<td>".$update."</td>";
            echo "<td>".$delete."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>