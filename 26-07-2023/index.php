<?php

include 'connection.php';

$data = getMysql()->query("select * from tb_siswa");

?>

<a href="tambah.php">Tambah data</a>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $i = 1;
            while($row = $data->fetch_assoc()) :
            ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['kelas'] ?></td>
            <td>
                <a href="edit.php?id= <?= $row['id'] ?>">edit</a> | 
                <a href="hapus.php?id= <?= $row['id'] ?>">hapus</a>
            </td>
        </tr>
        <?php
            $i++;
            endwhile;
        ?>
    </tbody>
</table>