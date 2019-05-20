<?php
class Sectioncategory
{
    /**
 * Возвращает массив категорий для списка на сайте
 * @return array <p>Массив с категориями</p>
 */
public static function getCategoriesListSection($pageNumber)
{
    // Соединение с БД
    $db = Db::getConnection();

    // Запрос к БД
    $result = $db->query('SELECT s1_id, s1_name FROM s1_category WHERE s1_status = "1" AND s1_page = '
    .$pageNumber.' ORDER BY s1_sort_order, s1_name ASC');

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

public static function getCategoriesListAdminSection()
{
    $db = Db::getConnection();
    $result = $db->query('SELECT * FROM s1_category ORDER BY s1_sort_order ASC');
    $categorySection = array();
    $i = 0;
    while ($row = $result->fetch()) {
        $categorySection[$i]['s1_id'] = $row['s1_id'];
        $categorySection[$i]['s1_name'] = $row['s1_name'];
        $categorySection[$i]['s1_sort_order'] = $row['s1_sort_order'];
        $categorySection[$i]['s1_status'] = $row['s1_status'];
        $i++;
    }
    return $categorySection;
}
/*Добавляем новую категорию*/
public static function createCategorySection($name, $sortOrder, $status)
{
    // Соединение с БД
    $db = Db::getConnection();

    // Текст запроса к БД
    $sql = 'INSERT INTO s1_category (s1_name, s1_sort_order, s1_status) '
            . 'VALUES (:s1_name, :s1_sort_order, :s1_status)';

    // Получение и возврат результатов. Используется подготовленный запрос
    $result = $db->prepare($sql);
    $result->bindParam(':s1_name', $name, PDO::PARAM_STR);
    $result->bindParam(':s1_sort_order', $sortOrder, PDO::PARAM_INT);
    $result->bindParam(':s1_status', $status, PDO::PARAM_INT);
    return $result->execute();
}
/* Удаляем категорию из второй секции */
public static function deleteCategoryByIdSection($id)
{
    $db = Db::getConnection();
    $sql = 'DELETE FROM s1_category WHERE s1_id = :s1_id';
    $result = $db->prepare($sql);
    $result->bindParam(':s1_id', $id, PDO::PARAM_INT);
    return $result->execute();
}
public static function updateCategoryByIdSection($id, $name, $sortOrder, $status)
{
    // Соединение с БД
    $db = Db::getConnection();

    // Текст запроса к БД
    $sql = "UPDATE s1_category
        SET
            s1_name = :s1_name,
            s1_sort_order = :s1_sort_order,
            s1_status = :s1_status
        WHERE s1_id = :s1_id";

    // Получение и возврат результатов. Используется подготовленный запрос
    $result = $db->prepare($sql);
    $result->bindParam(':s1_id', $id, PDO::PARAM_INT);
    $result->bindParam(':s1_name', $name, PDO::PARAM_STR);
    $result->bindParam(':s1_sort_order', $sortOrder, PDO::PARAM_INT);
    $result->bindParam(':s1_status', $status, PDO::PARAM_INT);
    return $result->execute();
}
public static function getCategoryByIdSection($id)
{
    // Соединение с БД
    $db = Db::getConnection();

    // Текст запроса к БД
    $sql = 'SELECT * FROM s1_category WHERE s1_id = :s1_id';

    // Используется подготовленный запрос
    $result = $db->prepare($sql);
    $result->bindParam(':s1_id', $id, PDO::PARAM_INT);

    // Указываем, что хотим получить данные в виде массива
    $result->setFetchMode(PDO::FETCH_ASSOC);

    // Выполняем запрос
    $result->execute();

    // Возвращаем данные
    return $result->fetch();
}






}
 ?>
