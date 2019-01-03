<?php include('../../koneksi.php'); ?>
<div class="garis-bawah">
    <h3>Tabel Topik Research</h3>
</div>
<table class="table table-responsive-sm table-bordered table-light text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <!-- <th>Lihat</th> -->
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
            // $view = '<a href="topik.php?id='.$data['id'].'" class="btn btn-primary" data-toggle="modal" data-target="#view">Lihat</a>';
            $update = "<a href='../proses/update-topik.php?id=".$data['id']."&data=topik&page=Topik' class='btn btn-info'>Edit</a>";
            $delete = "<button type='button' class='btn btn-danger hapus' id='{$data['id']}'>Hapus</button>";
            // echo "<td>".$view."</td>";
            echo "<td>".$update."</td>";
            echo "<td>".$delete."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>