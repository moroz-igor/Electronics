<?php
class Navigation{
    public static function getCatalogPages()
    {
            $db = Db::getConnection();
            $result = $db->query('SELECT page, page_name FROM navigation '
                                 .'WHERE status = "1" AND section = "0"');
            $dynamicPages = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $dynamicPages[$i]['page'] = $row['page'];
                $dynamicPages[$i]['page_name'] = $row['page_name'];
                $i++;
            }
        return $dynamicPages;
    }
    public static function getSectionPages()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT page, page_name FROM navigation '
                             .'WHERE status = "1" AND section = "1"');
        $dynamicPages = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $dynamicPages[$i]['page'] = $row['page'];
            $dynamicPages[$i]['page_name'] = $row['page_name'];
            $i++;
        }
    return $dynamicPages;
    }
}
 ?>
