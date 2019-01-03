<?php include('../../koneksi.php'); ?>
<div class="garis-bawah">
    <h3>Tabel Dosen</h3>
</div>
<table class="table table-responsive-sm table-bordered table-light">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM dosen";
        $query = mysqli_query($db, $sql);
        $i=1;
        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$i."</td>";
            $i++;
            echo "<td>".$data["nama"]."</td>";
            echo "<td>".$data["nidn"]."</td>";
            echo "<td>".$data["jabatan"]."</td>";
            echo "<td>".$data["email"]."</td>";
            $update = "<button type='button' class='btn btn-info edit' id='{$data['id']}'>Edit</button>";
            $delete = "<button type='button' class='btn btn-danger hapus' id='{$data['id']}'>Hapus</button>";
            echo "<td>".$update."</td>";
            echo "<td>".$delete."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>