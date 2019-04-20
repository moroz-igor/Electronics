<?php
/**
 * Класс Product - модель для работы с товарами В секции Section
 */
class Section
{
    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 10;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
        {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM s1_product '
                . 'WHERE s1_status = "1" ORDER BY s1_id  '
                . 'LIMIT :count';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

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
    public static function getProductsListByCategory($categoryId, $page = 1)
        {
        $limit = Section::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM s1_product '
                . 'WHERE s1_status = 1 AND s1_category_id = :category_id '
                . 'ORDER BY s1_id ASC LIMIT :limit OFFSET :offset';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['s1_id'] = $row['s1_id'];
            $products[$i]['s1_name'] = $row['s1_name'];
            $products[$i]['s1_imgbig_1'] = $row['s1_imgbig_1'];
            $products[$i]['s1_imgbig_2'] = $row['s1_imgbig_2'];
            $products[$i]['s1_imgbig_3'] = $row['s1_imgbig_3'];
            $products[$i]['s1_imgbig_4'] = $row['s1_imgbig_4'];
            $products[$i]['s1_imgbig_5'] = $row['s1_imgbig_5'];
            $products[$i]['s1_imgmin_1'] = $row['s1_imgmin_1'];
            $products[$i]['s1_imgmin_2'] = $row['s1_imgmin_2'];
            $products[$i]['s1_imgmin_3'] = $row['s1_imgmin_3'];
            $products[$i]['s1_imgmin_4'] = $row['s1_imgmin_4'];
            $products[$i]['s1_imgmin_5'] = $row['s1_imgmin_5'];
            $products[$i]['s1_code_prev'] = $row['s1_code_prev'];
            $products[$i]['s1_code'] = $row['s1_code'];
            $products[$i]['s1_brand'] = $row['s1_brand'];
            $products[$i]['s1_category_id'] = $row['s1_category_id'];
            $products[$i]['s1_category_name'] = $row['s1_category_name'];
            $products[$i]['s1_description_1'] = $row['s1_description_1'];
            $products[$i]['s1_description_2'] = $row['s1_description_2'];
            $products[$i]['s1_price'] = $row['s1_price'];
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

}
 ?>
