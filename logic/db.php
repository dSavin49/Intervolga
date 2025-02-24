<?php

class DB
{
    public static function db_connection()
    {
        $db = new PDO("mysql:host=localhost;dbname=catalog_tree", "root", "");
        
        return $db;
    }

   

}