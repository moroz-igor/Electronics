<?php
/**
 * Класс Product - модель для работы с товарами
 */
class Product
{
        // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 10;
    /*
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
        {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product '
                . 'WHERE status = "1" ORDER BY id  '
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
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['imgbig_1'] = $row['imgbig_1'];
            $productsList[$i]['imgbig_2'] = $row['imgbig_2'];
            $productsList[$i]['imgbig_3'] = $row['imgbig_3'];
            $productsList[$i]['imgbig_4'] = $row['imgbig_4'];
            $productsList[$i]['imgbig_5'] = $row['imgbig_5'];
            $productsList[$i]['imgmin_1'] = $row['imgmin_1'];
            $productsList[$i]['imgmin_2'] = $row['imgmin_2'];
            $productsList[$i]['imgmin_3'] = $row['imgmin_3'];
            $productsList[$i]['imgmin_4'] = $row['imgmin_4'];
            $productsList[$i]['imgmin_5'] = $row['imgmin_5'];
            $productsList[$i]['code_prev'] = $row['code_prev'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['brand'] = $row['brand'];
            $productsList[$i]['category_id'] = $row['category_id'];
            $productsList[$i]['category_name'] = $row['category_name'];
            $productsList[$i]['description_1'] = $row['description_1'];
            $productsList[$i]['description_2'] = $row['description_2'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }*/
    public static function getProductsListByCategory($categoryId)
        {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT category_id FROM product '
                        . 'WHERE status = 1 AND category_id = :category_id '
                         .'LIMIT 1';
                            // Используется подготовленный запрос
                            $result = $db->prepare($sql);
                            $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['category_id'] = $row['category_id'];
            $i++;
        }
        return $products;
    }
    public static function getProductById($id)
       {
           $id = intval($id);

           if ($id) {
               $db = Db::getConnection();

               $result = $db->query('SELECT * FROM product WHERE id=' . $id);
               $result->setFetchMode(PDO::FETCH_ASSOC);

               return $result->fetch();
           }
       }
    public static function getDetailsById($id)
        {
            $id = intval($id);
            if ($id)
            {
                $db = Db::getConnection();

                $result = $db->query('SELECT * FROM details WHERE id_product=' . $id);
                $result->setFetchMode(PDO::FETCH_ASSOC);

                return $result->fetch();
            }
        }
    public static function getDetailsContentById($id)
        {
              $id = intval($id);

              if ($id) {
                  $db = Db::getConnection();

                  $result = $db->query('SELECT * FROM details_content WHERE content_id=' . $id);
                  $result->setFetchMode(PDO::FETCH_ASSOC);

                  return $result->fetch();
              }
          }
    public static function getPriceOfProduct($id)
        {
              $id = intval($id);
              // Соединение с БД
              $db = Db::getConnection();
              // Тексты запроса к БД
              if($id < 2000) // запрос к нулевой секции(catalog)
              {
                $sql = 'SELECT  price FROM product WHERE  id = :id';
                $result = $db->prepare($sql);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
              }

              if($id >= 2000 && $id < 4000) // запрос к первой секции(section)
              {
                $sql = 'SELECT  s1_price FROM s1_product WHERE  s1_id = :s1_id';
                $result = $db->prepare($sql);
                $result->bindParam(':s1_id', $id, PDO::PARAM_INT);

              }
              // Выполнение коменды
              $result->execute();
              // Возвращаем price
              $row = $result->fetch();
              return $row;
          }
         /**
         * Возвращаем количество товаров в указанной категории
         */
    /*public static function getTotalProductsInCategory($categoryId)
        {
              // Соединение с БД
              $db = Db::getConnection();

              // Текст запроса к БД
              $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND category_id = :category_id';

              // Используется подготовленный запрос
              $result = $db->prepare($sql);
              $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

              // Выполнение коменды
              $result->execute();

              // Возвращаем значение count - количество
              $row = $result->fetch();
              return $row['count'];
          }*/
        /* Описание выода деталей продукта категории Section*/
    public static function getSectionProductById($id)
        {
               $id = intval($id);

               if ($id) {
                   $db = Db::getConnection();

                   $result = $db->query('SELECT * FROM s1_product WHERE s1_id=' . $id);
                   $result->setFetchMode(PDO::FETCH_ASSOC);

                   return $result->fetch();
               }
           }
    public static function getSectionDetailsById($id)
        {
                  $id = intval($id);

                  if ($id) {
                      $db = Db::getConnection();

                      $result = $db->query('SELECT * FROM s1_details WHERE s1_id_product=' . $id);
                      $result->setFetchMode(PDO::FETCH_ASSOC);

                      return $result->fetch();
                  }
              }
    public static function getSectionDetailsContentById($id)
        {
                  $id = intval($id);

                  if ($id) {
                      $db = Db::getConnection();

                      $result = $db->query('SELECT * FROM s1_details_content WHERE s1_content_id=' . $id);
                      $result->setFetchMode(PDO::FETCH_ASSOC);

                      return $result->fetch();
                  }
              }

       /**
       * Возвращает список товаров с указанными индентификторами
       * @param array $idsArray <p>Массив с идентификаторами</p>
       * @return array <p>Массив со списком товаров</p>
       */
       /* Метод получения товаров Секции Базы Данных "Section0(Catalog)" */
    public static function getProdustsByIds($idsArray)
        {
          // Соединение с БД
          $db = Db::getConnection();

          // Превращаем массив в строку для формирования условия в запросе
          $idsString = implode(',', $idsArray);

          // Текст запроса к БД
          $sql = "SELECT * FROM product WHERE status = '1'AND id IN ($idsString) ";

          $result = $db->query($sql);

          // Указываем, что хотим получить данные в виде массива
          $result->setFetchMode(PDO::FETCH_ASSOC);

          // Получение и возврат результатов
          $i = 0;
          $products = array();
          while ($row = $result->fetch()) {
              $products[$i]['imgbig_1'] = $row['imgbig_1'];
              $products[$i]['id'] = $row['id'];
              $products[$i]['code'] = $row['code'];
              $products[$i]['code_prev'] = $row['code_prev'];
              $products[$i]['name'] = $row['name'];
              $products[$i]['price'] = $row['price'];
              $i++;
          }
          return $products;
      }
            /*  Метод получения товаров Секции Базы Данных "Section(Section1) префикс[s1_]" */
    public static function getProdustsByIdsSectionOne($idsArray)
        {
          // Соединение с БД
          $db = Db::getConnection();

          // Превращаем массив в строку для формирования условия в запросе
          $idsString = implode(',', $idsArray);

          // Текст запроса к БД
          $sql = "SELECT * FROM s1_product WHERE s1_status = '1'AND s1_id IN ($idsString) ";

          $result = $db->query($sql);

          // Указываем, что хотим получить данные в виде массива
          $result->setFetchMode(PDO::FETCH_ASSOC);

          // Получение и возврат результатов
          $i = 0;
          $s1_products = array();
          while ($row = $result->fetch()) {
              $s1_products[$i]['s1_imgbig_1'] = $row['s1_imgbig_1'];
              $s1_products[$i]['s1_id'] = $row['s1_id'];
              $s1_products[$i]['s1_code'] = $row['s1_code'];
              $s1_products[$i]['s1_code_prev'] = $row['s1_code_prev'];
              $s1_products[$i]['s1_name'] = $row['s1_name'];
              $s1_products[$i]['s1_price'] = $row['s1_price'];
              $i++;
          }
          return $s1_products;

      }
        /**
        * Удаляет товар с указанным id
        * @param integer $id <p>id товара</p>
        * @return boolean <p>Результат выполнения метода</p>
        */
    public static function deleteProductById($id)
        {
          // Соединение с БД
          $db = Db::getConnection();

          // Текст запроса к БД
          $sql = 'DELETE FROM product WHERE id = :id';

          // Получение и возврат результатов. Используется подготовленный запрос
          $result = $db->prepare($sql);
          $result->bindParam(':id', $id, PDO::PARAM_INT);
          return $result->execute();
      }
    public static function getBrandProductsListBySection($section, $category_id, $brand)
        {
        $count = self::SHOW_BY_DEFAULT;
        $category_id = intval($category_id);
        $section = intval($section);
                $db = Db::getConnection();
                if($section == 0 && $category_id == 0)
                {
                    $sql = 'SELECT * FROM product '
                    . 'WHERE status = 1 AND brand = :brand '
                    . 'LIMIT :count';
                    $result = $db->prepare($sql);
                    $result->bindParam(':count', $count, PDO::PARAM_INT);
                    $result->bindParam(':brand', $brand, PDO::FETCH_ASSOC);
                }
                if($section == 0 && $category_id > 0)
                {
                    $sql = 'SELECT * FROM product '
                    . 'WHERE status = 1 AND brand = :brand AND category_id = :category_id '
                    . 'LIMIT :count';
                    $result = $db->prepare($sql);
                    $result->bindParam(':count', $count, PDO::PARAM_INT);
                    $result->bindParam(':brand', $brand, PDO::FETCH_ASSOC);
                    $result->bindParam(':category_id', $category_id, PDO::PARAM_INT);
                }
            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);

            // Выполнение коменды
            $result->execute();

            // Получение и возврат результатов
            $i = 0;
            $productsList = array();
            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['imgbig_1'] = $row['imgbig_1'];
                $productsList[$i]['imgbig_2'] = $row['imgbig_2'];
                $productsList[$i]['imgbig_3'] = $row['imgbig_3'];
                $productsList[$i]['imgbig_4'] = $row['imgbig_4'];
                $productsList[$i]['imgbig_5'] = $row['imgbig_5'];
                $productsList[$i]['imgmin_1'] = $row['imgmin_1'];
                $productsList[$i]['imgmin_2'] = $row['imgmin_2'];
                $productsList[$i]['imgmin_3'] = $row['imgmin_3'];
                $productsList[$i]['imgmin_4'] = $row['imgmin_4'];
                $productsList[$i]['imgmin_5'] = $row['imgmin_5'];
                $productsList[$i]['code_prev'] = $row['code_prev'];
                $productsList[$i]['code'] = $row['code'];
                $productsList[$i]['brand'] = $row['brand'];
                $productsList[$i]['category_id'] = $row['category_id'];
                $productsList[$i]['category_name'] = $row['category_name'];
                $productsList[$i]['description_1'] = $row['description_1'];
                $productsList[$i]['description_2'] = $row['description_2'];
                $productsList[$i]['price'] = $row['price'];
                $i++;
            }
            return $productsList;
        }

}
 ?>
