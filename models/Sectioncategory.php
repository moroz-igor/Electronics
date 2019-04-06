<?php
class Sectioncategory
{
    /**
 * Возвращает массив категорий для списка на сайте
 * @return array <p>Массив с категориями</p>
 */
public static function getCategoriesListSection()
{
    // Соединение с БД
    $db = Db::getConnection();

    // Запрос к БД
    $result = $db->query('SELECT s1_id, s1_name FROM s1_category WHERE s1_status = "1" ORDER BY s1_sort_order, s1_name ASC');

    // Получение и возврат результатов
    $i = 0;
    $categoryList = array();
    while ($row = $result->fetch()) {
        $categoryList[$i]['s1_id'] = $row['s1_id'];
        $categoryList[$i]['s1_name'] = $row['s1_name'];
        $i++;
    }
    return $categoryList;
}

}
 ?>
