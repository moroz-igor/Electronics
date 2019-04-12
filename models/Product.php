<?php
/**
 * Класс Product - модель для работы с товарами
 */
class Product
{
    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 3;

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
    }

    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $page = intval($page);

        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product '
                        . 'WHERE status = 1 AND category_id = :category_id '
                        . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';


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
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['imgbig_1'] = $row['imgbig_1'];
            $products[$i]['imgbig_2'] = $row['imgbig_2'];
            $products[$i]['imgbig_3'] = $row['imgbig_3'];
            $products[$i]['imgbig_4'] = $row['imgbig_4'];
            $products[$i]['imgbig_5'] = $row['imgbig_5'];
            $products[$i]['imgmin_1'] = $row['imgmin_1'];
            $products[$i]['imgmin_2'] = $row['imgmin_2'];
            $products[$i]['imgmin_3'] = $row['imgmin_3'];
            $products[$i]['imgmin_4'] = $row['imgmin_4'];
            $products[$i]['imgmin_5'] = $row['imgmin_5'];
            $products[$i]['code_prev'] = $row['code_prev'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['brand'] = $row['brand'];
            $products[$i]['category_name'] = $row['category_name'];
            $products[$i]['description_1'] = $row['description_1'];
            $products[$i]['description_2'] = $row['description_2'];
            $products[$i]['price'] = $row['price'];
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

              if ($id) {
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
          /**
          * Возвращаем количество товаров в указанной категории
          */
          public static function getTotalProductsInCategory($categoryId)
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
          }


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
      public static function getProdustsByIds($idsArray)
      {
          // Соединение с БД
          $db = Db::getConnection();

          // Превращаем массив в строку для формирования условия в запросе
          $idsString = implode(',', $idsArray);

          // Текст запроса к БД
          $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

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


}
 ?>
