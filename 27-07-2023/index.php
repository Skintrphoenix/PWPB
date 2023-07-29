<?php

include 'connection.php';

if(isset($_GET['search']) && $_GET['search'] !== ""){
    $data = getMysql()->query("SELECT * FROM tb_menu 
    WHERE menu like '%" . $_GET['search'] ."%' OR kode like '%" . $_GET['search'] ."%'");
}else{
    $data = getMysql()->query("select * from tb_menu");
}


?>

<a href="tambah.php">Tambah data</a>
<br>
<form action="" method="get">
    <label for="search">search</label>
    <input type="text" name="search" id="search">
</form>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Menu</th>
            <th>Harga</th>
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
            <td><?= $row['kode'] ?></td>
            <td><?= $row['menu'] ?></td>
            <td><?= $row['harga'] ?></td>
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