<?php

include 'connection.php';

$id = $_GET['id'];

if(getMysql()->query("delete from tb_menu where id = "  . $id)){
    header("Location: index.php");
}else{
    echo "<script> alert('data gagal di hapus'); </script>";
    header("Location: index.php");
}