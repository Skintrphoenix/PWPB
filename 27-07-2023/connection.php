<?php

if(!function_exists("refresh")){
    function refresh(){
        $mysql = new \mysqli("localhost", "skin", "skin");
        $mysql->multi_query(file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "db.sql"));
        $mysql->next_result();
    }
}

refresh();

if(!function_exists("getMysql")){
    function getMysql() :? \mysqli{
        return new \mysqli("localhost", "skin", "skin", "db_pwpb_270723");
    }
}