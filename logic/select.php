<?php


class Select
{
    public static function array_to_tree($array, $sub = 0)			// Приобразование БД к древовидному.
    {
    	$a = array();
    	foreach($array as $v) {
    		if($sub == $v['parent_id']) {
    			$b = self::array_to_tree($array, $v['id']);
    			if(!empty($b)) {
    				$a[$v['id']] = $v;
    				$a[$v['id']]['children'] = $b;
    			} else {
    				$a[$v['id']] = $v;
    			}
    		}
    	}
    	return $a;
    }
    public static function db()
    {
        $dbh = DB::db_connection();
        $sth = $dbh->prepare("SELECT * FROM `catalog_tree`");
        $sth->execute();
        $category = $sth->fetchAll(PDO::FETCH_ASSOC);
		self::array_to_tree($category);

        return $category;
    }

    
 
    public static function out_options($array, $selected_id = 0, $level = 0) 						// Функция для определения отдельных пунктов списка.
    {
    	$level++;
    	$out = '';
    	foreach ($array as $i => $row) {
    		$out .= '<option value="' . $row['id'] . '"';
    		if ($row['id'] == $selected_id) {
    			$out .= ' selected';
    		}
    		$out .= '>';
        
    		if ($level > 1) {
    			$out .= str_repeat('&emsp;&emsp;&emsp;', $level - 1);
    		}

			
        
    		$out .= $row['name'] . '</option>';
        
    		if (!empty($row['children'])) {
    			$out .= self::out_options($row['children'], $selected_id, $level);
    		}
    	}
    	return $out;
    }

        public static function connection()
        {
            return self::out_options(self::db(), 0);				// Упрощенный вызов класса Select.
        }

        

}


	   

