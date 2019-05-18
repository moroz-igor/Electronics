<?php
/**
 * Класс Product - модель для работы с товарами В секции Section
 */
class Section
{
    /**
    * Возвращаем количество товаров в указанной категории Section
    */
    public static function getTotalProductsInCategory($categoryId)
    {
            // Соединение с БД
            $db = Db::getConnection();

            // Текст запроса к БД
            $sql = 'SELECT count(s1_id) AS count FROM s1_product
                                                WHERE s1_status="1" AND s1_category_id = :s1_category_id';
            // Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':s1_category_id', $categoryId, PDO::PARAM_INT);

            // Выполнение коменды
            $result->execute();

            // Возвращаем значение count - количество
            $row = $result->fetch();
            return $row['count'];
        }

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 10;

    public static function getProductsListByCategory($categoryId)
        {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT s1_category_id FROM s1_product '
                . 'WHERE s1_status = 1 AND s1_category_id = :category_id '
                . 'LIMIT 1';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['s1_category_id'] = $row['s1_category_id'];
            $i++;
        }
        return $products;
    }
    public static function getBrandProductsListBySection($s1_section, $s1_category_id, $s1_brand)
        {
        $count = self::SHOW_BY_DEFAULT;
        $s1_category_id = intval($s1_category_id);
        $s1_section = intval($s1_section);
                $db = Db::getConnection();
                if($s1_section == 1 && $s1_category_id == 0)
                {
                    $sql = 'SELECT * FROM s1_product '
                    . 'WHERE s1_status = 1 AND s1_brand = :s1_brand '
                    . 'LIMIT :count';
                    $result = $db->prepare($sql);
                    $result->bindParam(':count', $count, PDO::PARAM_INT);
                    $result->bindParam(':s1_brand', $s1_brand, PDO::FETCH_ASSOC);
                }
                if($s1_section == 1 && $s1_category_id > 0)
                {
                    $sql = 'SELECT * FROM s1_product '
                    . 'WHERE s1_status = 1 AND s1_brand = :s1_brand AND s1_category_id = :s1_category_id '
                    . 'LIMIT :count';
                    $result = $db->prepare($sql);
                    $result->bindParam(':count', $count, PDO::PARAM_INT);
                    $result->bindParam(':s1_brand', $s1_brand, PDO::FETCH_ASSOC);
                    $result->bindParam(':s1_category_id', $s1_category_id, PDO::PARAM_INT);
                }
            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);

            // Выполнение коменды
            $result->execute();

            // Получение и возврат результатов
            $i = 0;
            $productsList = array();
            while ($row = $result->fetch()) {
                $productsList[$i]['s1_id'] = $row['s1_id'];
                $productsList[$i]['s1_name'] = $row['s1_name'];
                $productsList[$i]['s1_imgbig_1'] = $row['s1_imgbig_1'];
                $productsList[$i]['s1_imgbig_2'] = $row['s1_imgbig_2'];
                $productsList[$i]['s1_imgbig_3'] = $row['s1_imgbig_3'];
                $productsList[$i]['s1_imgbig_4'] = $row['s1_imgbig_4'];
                $productsList[$i]['s1_imgbig_5'] = $row['s1_imgbig_5'];
                $productsList[$i]['s1_imgmin_1'] = $row['s1_imgmin_1'];
                $productsList[$i]['s1_imgmin_2'] = $row['s1_imgmin_2'];
                $productsList[$i]['s1_imgmin_3'] = $row['s1_imgmin_3'];
                $productsList[$i]['s1_imgmin_4'] = $row['s1_imgmin_4'];
                $productsList[$i]['s1_imgmin_5'] = $row['s1_imgmin_5'];
                $productsList[$i]['s1_code_prev'] = $row['s1_code_prev'];
                $productsList[$i]['s1_code'] = $row['s1_code'];
                $productsList[$i]['s1_brand'] = $row['s1_brand'];
                $productsList[$i]['s1_category_id'] = $row['s1_category_id'];
                $productsList[$i]['s1_category_name'] = $row['s1_category_name'];
                $productsList[$i]['s1_description_1'] = $row['s1_description_1'];
                $productsList[$i]['s1_description_2'] = $row['s1_description_2'];
                $productsList[$i]['s1_price'] = $row['s1_price'];
                $i++;
            }
            return $productsList;

    }
/*МЕТОДЫ АДМИНИСТРАТОРА ВТОРОЙ СЕКЦИИ*/

public static function createProductSection($options)
    {
    // Соединение с БД
    $db = Db::getConnection();
    // Текст запроса к БД
    $sql = 'INSERT INTO s1_product '
            . '(s1_name, s1_category_name, s1_code, s1_code_prev, s1_price, s1_category_id, s1_brand, s1_availability,'
            . 's1_description_1, s1_description_2, s1_is_new, s1_is_recommended, s1_status,
                  s1_imgbig_1,
                  s1_imgbig_2,
                  s1_imgbig_3,
                  s1_imgbig_4,
                  s1_imgbig_5,
                  s1_imgmin_1,
                  s1_imgmin_2,
                  s1_imgmin_3,
                  s1_imgmin_4,
                  s1_imgmin_5
                  )'
            . 'VALUES '
            . '(:s1_name, :s1_category_name, :s1_code, :s1_code_prev, :s1_price, :s1_category_id, :s1_brand, :s1_availability,'
            . ':s1_description_1, :s1_description_2, :s1_is_new, :s1_is_recommended, :s1_status,
                    :s1_imgbig_1,
                    :s1_imgbig_2,
                    :s1_imgbig_3,
                    :s1_imgbig_4,
                    :s1_imgbig_5,
                    :s1_imgmin_1,
                    :s1_imgmin_2,
                    :s1_imgmin_3,
                    :s1_imgmin_4,
                    :s1_imgmin_5
                    )';
            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':s1_name', $options['s1_name'], PDO::PARAM_STR);
            $result->bindParam(':s1_category_name', $options['s1_category_name'], PDO::PARAM_STR);
            $result->bindParam(':s1_code', $options['s1_code'], PDO::PARAM_STR);
            $result->bindParam(':s1_code_prev', $options['s1_code_prev'], PDO::PARAM_STR);
            $result->bindParam(':s1_price', $options['s1_price'], PDO::PARAM_STR);
            $result->bindParam(':s1_category_id', $options['s1_category_id'], PDO::PARAM_INT);
            $result->bindParam(':s1_brand', $options['s1_brand'], PDO::PARAM_STR);
            $result->bindParam(':s1_availability', $options['s1_availability'], PDO::PARAM_INT);
            $result->bindParam(':s1_description_1', $options['s1_description_1'], PDO::PARAM_STR);
            $result->bindParam(':s1_description_2', $options['s1_description_2'], PDO::PARAM_STR);
            $result->bindParam(':s1_is_new', $options['s1_is_new'], PDO::PARAM_INT);
            $result->bindParam(':s1_is_recommended', $options['s1_is_recommended'], PDO::PARAM_INT);
            $result->bindParam(':s1_status', $options['s1_status'], PDO::PARAM_INT);
            $result->bindParam(':s1_imgbig_1', $options['s1_imgbig_1'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgbig_2', $options['s1_imgbig_2'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgbig_3', $options['s1_imgbig_3'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgbig_4', $options['s1_imgbig_4'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgbig_5', $options['s1_imgbig_5'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_1', $options['s1_imgmin_1'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_2', $options['s1_imgmin_2'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_3', $options['s1_imgmin_3'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_4', $options['s1_imgmin_4'], PDO::PARAM_STR);


            $result->bindParam(':s1_imgmin_5', $options['s1_imgmin_5'], PDO::PARAM_STR);
            if ($result->execute()) {
                // Если запрос выполенен успешно, возвращаем id добавленной записи
                return $db->lastInsertId();
            }
        // Иначе возвращаем 0
        return 0;
    }
public static function createProductDetailsSection($options)
    {
    // Соединение с БД
    $db = Db::getConnection();
    // Текст запроса к БД
    $sql = 'INSERT INTO s1_details '
            . '(s1_param_1, s1_param_2, s1_param_3, s1_param_4, s1_param_5, s1_param_6, s1_param_7, s1_param_8, s1_param_9, s1_param_10,
                s1_value_1, s1_value_2, s1_value_3, s1_value_4, s1_value_5, s1_value_6, s1_value_7, s1_value_8, s1_value_9, s1_value_10)'
            . 'VALUES '
            . '( :s1_param_1, :s1_param_2, :s1_param_3, :s1_param_4, :s1_param_5, :s1_param_6, :s1_param_7, :s1_param_8, :s1_param_9, :s1_param_10,
                :s1_value_1, :s1_value_2, :s1_value_3, :s1_value_4, :s1_value_5, :s1_value_6, :s1_value_7, :s1_value_8, :s1_value_9, :s1_value_10)';
            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':s1_param_1', $options['param_1'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_2', $options['param_2'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_3', $options['param_3'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_4', $options['param_4'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_5', $options['param_5'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_6', $options['param_6'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_7', $options['param_7'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_8', $options['param_8'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_9', $options['param_9'], PDO::PARAM_STR);
            $result->bindParam(':s1_param_10', $options['param_10'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_1', $options['value_1'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_2', $options['value_2'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_3', $options['value_3'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_4', $options['value_4'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_5', $options['value_5'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_6', $options['value_6'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_7', $options['value_7'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_8', $options['value_8'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_9', $options['value_9'], PDO::PARAM_STR);
            $result->bindParam(':s1_value_10', $options['value_10'], PDO::PARAM_STR);

            if ($result->execute()) {
                // Если запрос выполенен успешно, возвращаем id добавленной записи
                return $db->lastInsertId();
            }
            // Иначе возвращаем 0
            return 0;
    }
    // Создает подробное описание товара
public static function createProductDetailsDescriptionsSection($options)
        {
            $db = Db::getConnection();
            $sql = 'INSERT INTO s1_details_content '
                    . '(s1_main_des, s1_des_1, s1_des_2, s1_des_3, s1_des_4,
                                s1_des_5, s1_img_1, s1_img_2, s1_img_3, s1_img_4, s1_img_5 )'
                    . 'VALUES '
                    . '(:s1_main_des, :s1_des_1, :s1_des_2, :s1_des_3, :s1_des_4,
                                :s1_des_5, :s1_img_1, :s1_img_2, :s1_img_3, :s1_img_4, :s1_img_5 )';
                    $result = $db->prepare($sql);
                    $result->bindParam(':s1_main_des', $options['main_des'], PDO::PARAM_STR);
                    $result->bindParam(':s1_des_1', $options['des_1'], PDO::PARAM_STR);
                    $result->bindParam(':s1_des_2', $options['des_2'], PDO::PARAM_STR);
                    $result->bindParam(':s1_des_3', $options['des_3'], PDO::PARAM_STR);
                    $result->bindParam(':s1_des_4', $options['des_4'], PDO::PARAM_STR);
                    $result->bindParam(':s1_des_5', $options['des_5'], PDO::PARAM_STR);
                    $result->bindParam(':s1_img_1', $options['img_1'], PDO::PARAM_STR);
                    $result->bindParam(':s1_img_2', $options['img_2'], PDO::PARAM_STR);
                    $result->bindParam(':s1_img_3', $options['img_3'], PDO::PARAM_STR);
                    $result->bindParam(':s1_img_4', $options['img_4'], PDO::PARAM_STR);
                    $result->bindParam(':s1_img_5', $options['img_5'], PDO::PARAM_STR);
                    if ($result->execute()) {
                        return $db->lastInsertId();
                    }
                return 0;
    }
    public static function getProductsListSection()
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Получение и возврат результатов
            $result = $db->query('SELECT s1_id, s1_name, s1_price, s1_code FROM s1_product ORDER BY s1_id ASC');
            $productsList = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['s1_id'] = $row['s1_id'];
                $productsList[$i]['s1_name'] = $row['s1_name'];
                $productsList[$i]['s1_code'] = $row['s1_code'];
                $productsList[$i]['s1_price'] = $row['s1_price'];
                $i++;
            }
            return $productsList;
        }
        /*
        * Удаляет товар с указанным id
        */
    public static function deleteProductByIdSection($id)
        {
        $db = Db::getConnection();
        $sql = 'DELETE FROM s1_product WHERE s1_id = :s1_id';
        $result = $db->prepare($sql);
        $result->bindParam(':s1_id', $id, PDO::PARAM_INT);
        return $result->execute();
        }
        // Редактирует товар с заданным id




public static function updateProductByIdSection($id, $options)
{
    // Соединение с БД
    $db = Db::getConnection();

    // Текст запроса к БД
    $sql = "UPDATE s1_product
        SET
            s1_name = :s1_name,
            s1_code = :s1_code,
            s1_price = :s1_price,
            s1_category_id = :s1_category_id,
            s1_category_name = :s1_category_name,
            s1_code_prev = :s1_code_prev,
            s1_brand = :s1_brand,
            s1_availability = :s1_availability,
            s1_description_1 = :s1_description_1,
            s1_description_2 = :s1_description_2,
            s1_is_new = :s1_is_new,
            s1_is_recommended = :s1_is_recommended,
            s1_status = :s1_status,
            s1_imgbig_1 = :s1_imgbig_1,
            s1_imgbig_2 = :s1_imgbig_2,
            s1_imgbig_3 = :s1_imgbig_3,
            s1_imgbig_4 = :s1_imgbig_4,
            s1_imgbig_5 = :s1_imgbig_5,
            s1_imgmin_1 = :s1_imgmin_1,
            s1_imgmin_2 = :s1_imgmin_2,
            s1_imgmin_3 = :s1_imgmin_3,
            s1_imgmin_4 = :s1_imgmin_4,
            s1_imgmin_5 = :s1_imgmin_5
            WHERE s1_id = :s1_id";

            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':s1_id', $id, PDO::PARAM_INT);
            $result->bindParam(':s1_name', $options['name'], PDO::PARAM_STR);
            $result->bindParam(':s1_code', $options['code'], PDO::PARAM_STR);
            $result->bindParam(':s1_price', $options['price'], PDO::PARAM_STR);
            $result->bindParam(':s1_category_id', $options['category_id'], PDO::PARAM_INT);
            $result->bindParam(':s1_category_name', $options['category_name'], PDO::PARAM_INT);
            $result->bindParam(':s1_code_prev', $options['code_prev'], PDO::PARAM_INT);
            $result->bindParam(':s1_brand', $options['brand'], PDO::PARAM_STR);
            $result->bindParam(':s1_availability', $options['availability'], PDO::PARAM_INT);
            $result->bindParam(':s1_description_1', $options['description_1'], PDO::PARAM_STR);
            $result->bindParam(':s1_description_2', $options['description_2'], PDO::PARAM_STR);
            $result->bindParam(':s1_is_new', $options['is_new'], PDO::PARAM_INT);
            $result->bindParam(':s1_is_recommended', $options['is_recommended'], PDO::PARAM_INT);
            $result->bindParam(':s1_status', $options['status'], PDO::PARAM_INT);
            $result->bindParam(':s1_imgbig_1', $options['imgbig_1'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgbig_2', $options['imgbig_2'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgbig_3', $options['imgbig_3'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgbig_4', $options['imgbig_4'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgbig_5', $options['imgbig_5'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_1', $options['imgmin_1'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_2', $options['imgmin_2'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_3', $options['imgmin_3'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_4', $options['imgmin_4'], PDO::PARAM_STR);
            $result->bindParam(':s1_imgmin_5', $options['imgmin_5'], PDO::PARAM_STR);
            return $result->execute();
}
public static function updateDetailsContentByIdSection($content_id, $options)
{
        $db = Db::getConnection();
        $sql = "UPDATE s1_details_content
            SET
                s1_main_des = :main_des,
                s1_des_1 = :des_1,
                s1_des_2 = :des_2,
                s1_des_3 = :des_3,
                s1_des_4 = :des_4,
                s1_des_5 = :des_5,
                s1_img_1 = :img_1,
                s1_img_2 = :img_2,
                s1_img_3 = :img_3,
                s1_img_4 = :img_4,
                s1_img_5 = :img_5
                WHERE s1_content_id = :content_id";
                $result = $db->prepare($sql);
                $result->bindParam(':content_id', $content_id, PDO::PARAM_INT);
                $result->bindParam(':main_des', $options['main_des'], PDO::PARAM_STR);
                $result->bindParam(':des_1', $options['des_1'], PDO::PARAM_STR);
                $result->bindParam(':des_2', $options['des_2'], PDO::PARAM_STR);
                $result->bindParam(':des_3', $options['des_3'], PDO::PARAM_STR);
                $result->bindParam(':des_4', $options['des_4'], PDO::PARAM_STR);
                $result->bindParam(':des_5', $options['des_5'], PDO::PARAM_STR);
                $result->bindParam(':img_1', $options['img_1'], PDO::PARAM_STR);
                $result->bindParam(':img_2', $options['img_2'], PDO::PARAM_STR);
                $result->bindParam(':img_3', $options['img_3'], PDO::PARAM_STR);
                $result->bindParam(':img_4', $options['img_4'], PDO::PARAM_STR);
                $result->bindParam(':img_5', $options['img_5'], PDO::PARAM_STR);
                return $result->execute();
}
public static function updateProductDetailsSection($id, $options)
{
    $db = Db::getConnection();
    $sql = "UPDATE s1_details
        SET
            s1_param_1 = :param_1,
            s1_param_2 = :param_2,
            s1_param_3 = :param_3,
            s1_param_4 = :param_4,
            s1_param_5 = :param_5,
            s1_param_6 = :param_6,
            s1_param_7 = :param_7,
            s1_param_8 = :param_8,
            s1_param_9 = :param_9,
            s1_param_10 = :param_10,
            s1_value_1 = :value_1,
            s1_value_2 = :value_2,
            s1_value_3 = :value_3,
            s1_value_4 = :value_4,
            s1_value_5 = :value_5,
            s1_value_6 = :value_6,
            s1_value_7 = :value_7,
            s1_value_8 = :value_8,
            s1_value_9 = :value_9,
            s1_value_10= :value_10
            WHERE s1_id_product = :id_product";

            $result = $db->prepare($sql);
            $result->bindParam(':id_product', $id, PDO::PARAM_INT);
            $result->bindParam(':param_1', $options['param_1'], PDO::PARAM_STR);
            $result->bindParam(':param_2', $options['param_2'], PDO::PARAM_STR);
            $result->bindParam(':param_3', $options['param_3'], PDO::PARAM_STR);
            $result->bindParam(':param_4', $options['param_4'], PDO::PARAM_STR);
            $result->bindParam(':param_5', $options['param_5'], PDO::PARAM_STR);
            $result->bindParam(':param_6', $options['param_6'], PDO::PARAM_STR);
            $result->bindParam(':param_7', $options['param_7'], PDO::PARAM_STR);
            $result->bindParam(':param_8', $options['param_8'], PDO::PARAM_STR);
            $result->bindParam(':param_9', $options['param_9'], PDO::PARAM_STR);
            $result->bindParam(':param_10', $options['param_10'], PDO::PARAM_STR);
            $result->bindParam(':value_1', $options['value_1'], PDO::PARAM_STR);
            $result->bindParam(':value_2', $options['value_2'], PDO::PARAM_STR);
            $result->bindParam(':value_3', $options['value_3'], PDO::PARAM_STR);
            $result->bindParam(':value_4', $options['value_4'], PDO::PARAM_STR);
            $result->bindParam(':value_5', $options['value_5'], PDO::PARAM_STR);
            $result->bindParam(':value_6', $options['value_6'], PDO::PARAM_STR);
            $result->bindParam(':value_7', $options['value_7'], PDO::PARAM_STR);
            $result->bindParam(':value_8', $options['value_8'], PDO::PARAM_STR);
            $result->bindParam(':value_9', $options['value_9'], PDO::PARAM_STR);
            $result->bindParam(':value_10', $options['value_10'], PDO::PARAM_STR);
            return $result->execute();

}

}
 ?>
