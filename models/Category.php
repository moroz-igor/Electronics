<?php
class Category
{
    /**
 * Возвращает массив категорий для списка на сайте
 * @return array <p>Массив с категориями</p>
 */
public static function getCategoriesList()
{
    // Соединение с БД
    $db = Db::getConnection();

    // Запрос к БД
    $result = $db->query('SELECT id, name FROM category WHERE status = "1" ORDER BY sort_order, name ASC');

    // Получение и возврат результатов
    $i = 0;
    $categoryList = array();
    while ($row = $result->fetch()) {
        $categoryList[$i]['id'] = $row['id'];
        $categoryList[$i]['name'] = $row['name'];
        $i++;
    }
    return $categoryList;
}
public static function getSectionCategoriesList()
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
