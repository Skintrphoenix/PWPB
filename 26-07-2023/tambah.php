
<form action="" method="post">
    <label for="nama">nama</label>
    <input type="text" name="nama" id="nama" placeholder="nama">
    <br>
    <label for="nama">kelas</label>
    <input type="text" name="kelas" id="kelas" placeholder="kelas">
    <br>
    <input type="submit" value="Tambah">
</form>

<?php

if(isset($_POST['nama']) && isset($_POST['kelas'])){
    include 'connection.php';
    
    if(getMysql()->query("insert into tb_siswa (nama, kelas) values (' ". $_POST['nama'] ." ', '". $_POST['kelas'] ."')")){
        header("Location: index.php");
    }else{
        echo "<script> alert('data gagal di tambah'); </script>";
        header("Location: index.php");
    }
}