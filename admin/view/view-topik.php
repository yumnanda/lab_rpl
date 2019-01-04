<?php include('../../koneksi.php'); ?>
<div class="garis-bawah">
    <h3>Tabel Topik Research</h3>
</div>
<table class="table table-responsive table-bordered table-light text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Content</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM topik";
        $query = mysqli_query($db, $sql);
        $i=1;
        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$i."</td>";
            $i++;
            echo "<td class='text-left'>".$data["topik"]."</td>";
            echo "<td class='text-left'>".$data["content"]."</td>";
            $update = "<a href='../proses/update-topik.php?id=".$data['id']."&data=topik&page=Topik' class='btn btn-info'>Edit</a>";
            $delete = "<button type='button' class='btn btn-danger hapus' id='{$data['id']}'>Hapus</button>";
            echo "<td>".$update."</td>";
            echo "<td>".$delete."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>