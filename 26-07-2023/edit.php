<?php
    include 'connection.php';
    
    if(!isset($_GET['id'])){
        header('Location: index.php');
    }

    $data = getMysql()->query("select * from tb_siswa where id = " . $_GET['id'])->fetch_assoc();   
?>


<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label for="nama">nama</label>
    <input type="text" name="nama" id="nama" placeholder="nama" value="<?= $data['nama'] ?>">
    <br>
    <label for="nama">kelas</label>
    <input type="text" name="kelas" id="kelas" placeholder="kelas" value="<?= $data['kelas'] ?>">
    <br>
    <input type="submit" value="Tambah">
</form>

<?php

if(isset($_POST['nama']) && isset($_POST['kelas']) && isset($_POST['id'])){
    if(getMysql()->query("update tb_siswa set nama = ' ". $_POST['nama'] ." ', kelas = '". $_POST['kelas'] ."' where id = '". $_POST['id'] ."'")){
        header("Location: index.php");
    }else{
        echo "<script> alert('data gagal di perbarui'); </script>";
        header("Location: index.php");
    }
}