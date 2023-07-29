
<form action="" method="post">
    <label for="menu">menu</label>
    <input type="text" name="menu" id="menu" placeholder="menu">
    <br>
    <label for="harga">harga</label>
    <input type="number" name="harga" id="harga" placeholder="0" value="0">
    <br>
    <label for="jenis">Jenis Menu</label>
    <select name="jenis" id="jenis">
        <option value="MA">Makanan</option>
        <option value="MI">Minuman</option>
    </select>
    <br>
    <input type="submit" value="Tambah">
</form>

<?php

if(isset($_POST['menu']) && isset($_POST['harga']) && isset($_POST['jenis'])){
    include 'connection.php';

    $kode = $_POST['jenis'];

    $rows = getMysql()->query("select * from tb_menu")->num_rows + 1;

    if($rows >= 10){
        $kode .= "0" . $rows;
    }elseif($rows >= 100){
        $kode .= $rows;
    }else{
        $kode .= "00" . $rows;
    }
    $res = getMysql()->query("insert into tb_menu (kode, menu, harga) values ('". $kode ."', ' ". $_POST['menu'] ." ', ". $_POST['harga'] .")");
    if($res){
        header("Location: index.php");
    }else{
        echo "<script> alert('data gagal di tambah'); </script>";
    }
}