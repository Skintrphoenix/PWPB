<?php
    include 'connection.php';
    
    if(!isset($_GET['id'])){
        header('Location: index.php');
    }

    $data = getMysql()->query("select * from tb_menu where id = " . $_GET['id'])->fetch_assoc();   
?>


<form action="" method="post">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label for="menu">menu</label>
    <input type="text" name="menu" id="menu" placeholder="menu" value="<?= $data['menu'] ?>">
    <br>
    <label for="harga">harga</label>
    <input type="number" name="harga" id="harga" placeholder="0" value="<?= $data['harga'] ?>">
    <br>
    <input type="submit" value="Ubah">
</form>

<?php

if(isset($_POST['menu']) && isset($_POST['harga']) && isset($_POST['id'])){
    if(getMysql()->query("update tb_menu set menu = ' ". $_POST['menu'] ." ', harga = ". $_POST['harga'] ." where id = '". $_POST['id'] ."'")){
        header("Location: index.php");
    }else{
        echo "<script> alert('data gagal di perbarui'); </script>";
        header("Location: index.php");
    }
}