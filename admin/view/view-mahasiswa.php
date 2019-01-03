<?php include('../../koneksi.php'); ?>
<div class="garis-bawah">
    <h3>Tabel Mahasiswa</h3>
</div>
<table class="table table-responsive-sm table-bordered table-light text-center">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM mahasiswa";
        $query = mysqli_query($db, $sql);
        $i=1;
        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$i."</td>";
            $i++;
            echo "<td class='text-left'>".$data["nama"]."</td>";
            echo "<td class='text-left'>".$data["nim"]."</td>";
            echo "<td class='text-left'>".$data["email"]."</td>";
            $update = "<button type='button' class='btn btn-info edit' id='{$data['id']}'>Edit</button>";
            $delete = "<button type='button' class='btn btn-danger hapus' id='{$data['id']}'>Hapus</button>";
            echo "<td>".$update."</td>";
            echo "<td>".$delete."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>