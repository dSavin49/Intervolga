<?php

require_once('db.php');
require_once('./template/index.php');

class Catalog
{
    public static function sort()                                                   // Сортировка БД      
    {
        $db = DB::db_connection();
        $sql = $db->prepare("SELECT * FROM `catalog_tree`");
        $sql->execute();
        $result = $sql;

        while($row = $result->fetch())
        {
            $rows[$row['parent_id']][$row['id']] =  $row;
        }

        return $rows;
    }

    public static function build_tree($rows,$parent_id,$only_parent = false)        // Отображение дерева на странице
    {           
        if(is_array($rows) and isset($rows[$parent_id]))
        {
            $tree = '<ul>';

                foreach($rows[$parent_id] as $row)
                {
                    $tree .= '<li>'.$row['name'];
                
                    $tree .=  self::build_tree($rows,$row['id']); 
             
                    $tree .= '</li>';
                }
            
            $tree .= '</ul>';
            
        }
        else return null;

        return $tree;
    }
}

    



        
  

