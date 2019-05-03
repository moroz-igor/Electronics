<?php require_once(ROOT . '/components/Pagination.php'); ?>
<?php
/**
 * Класс Product - модель для работы с товарами
 */
class Product
{
        // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 10;
    /**
    * Возвращаем количество товаров в указанной Секции
    */
public static function getTotalProductsInCatalog($section)
   {
         // Соединение с БД
         $db = Db::getConnection();
         // Текст запроса к БД
         switch($section)
         {
            case "catalog" :
            $sql = 'SELECT count(id) AS count FROM product WHERE status="1" '; break;
            case "section" :
            $sql = 'SELECT count(s1_id) AS count FROM s1_product WHERE s1_status="1" '; break;
         }
         // Используется подготовленный запрос
         $result = $db->prepare($sql);
         // Выполнение коменды
         $result->execute();
         // Возвращаем значение count - количество
         $row = $result->fetch();
         return $row['count'];
     }

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
        // Колличестово товаров сортированных по категории "Brand"
        public static function getTotalProductsInBrand($section, $category, $brand)
        {
            // Соединение с БД
            $db = Db::getConnection();
            $category_id = $category;
                $brand = brandGet($brand);
                $category = intval($category);
                $section = intval($section);
            switch($section)
            {
                case 0 :
                if($category_id == 0)
                {
                    $sql = 'SELECT count(id) AS count FROM product WHERE status="1" AND brand = :brand  ';

                    $result = $db->prepare($sql);
                    $result->bindParam(':brand', $brand, PDO::FETCH_ASSOC);
                }
                if($category_id > 0)
                {
                    $sql = 'SELECT count(id) AS count FROM product '
                    . 'WHERE status = 1 AND brand = :brand AND category_id = :category_id ';
                    $result = $db->prepare($sql);
                    $result->bindParam(':brand', $brand, PDO::FETCH_ASSOC);
                    $result->bindParam(':category_id', $category_id, PDO::PARAM_INT);
                }
                break;
                case 1 :
                if($category_id == 0)
                {
                    $sql = 'SELECT count(s1_id) AS count FROM s1_product WHERE s1_status="1" AND s1_brand = :s1_brand  ';

                    $result = $db->prepare($sql);
                    $result->bindParam(':s1_brand', $brand, PDO::FETCH_ASSOC);
                }
                if($category_id > 0)
                {
                    $sql = 'SELECT count(s1_id) AS count FROM s1_product '
                    . 'WHERE s1_status = 1 AND s1_brand = :s1_brand AND s1_category_id = :s1_category_id ';

                   $result = $db->prepare($sql);
                    $result->bindParam(':s1_brand', $brand, PDO::FETCH_ASSOC);
                    $result->bindParam(':s1_category_id', $category_id, PDO::PARAM_INT);
                }
                break;
            }
            // Выполнение коменды
            $result->execute();
            // Возвращаем значение count - количество
            $row = $result->fetch();
            return $row['count'];
        }
        // Поиск товаров по названию в секции
        public static function getProductsListByName($section)
        {
            $pr = '';
            switch($section)
            {
                case 0 : $pr = ''; break;
                case 1 : $pr = 's1_'; break;
            }
            if( ($_GET["button_search"]) && (!empty($_GET["search_words"])) )
            {
                $search_words = $_GET["search_words"];
                    // удаляем символы GET запроса после знака '?'
                    $section = brandGet($section);
                $db = Db::getConnection();
                    // Текст запроса к БД
                    switch($section)
                    {
                    case 0 :
                        $sql = 'SELECT * FROM `product` WHERE `name` LIKE "%'.$search_words.'%" '
                                                            .'OR `brand` LIKE "%'.$search_words.'%" '
                                                            .'LIMIT 50';
                    break;
                    case 1 :
                        $sql = 'SELECT * FROM `s1_product` WHERE `s1_name` LIKE "%'.$search_words.'%" '
                                                                .'OR `s1_brand` LIKE "%'.$search_words.'%" '
                                                                .'LIMIT 50';
                    break;
                    }
                    $result = $db->prepare($sql);
                    $result->bindParam(':search_words', $search_words, PDO::PARAM_INT);
                    $result->execute();
                    $i = 0;
                    $products = array();
                        while ($row = $result->fetch()) {
                            $products[$i][$pr.'id'] = $row[$pr.'id'];
                            $products[$i][$pr.'name'] = $row[$pr.'name'];
                            $products[$i][$pr.'imgmin_1'] = $row[$pr.'imgmin_1'];
                            $products[$i][$pr.'category_name'] = $row[$pr.'category_name'];
                            $products[$i][$pr.'category_id'] = $row[$pr.'category_id'];
                            $products[$i][$pr.'code_prev'] = $row[$pr.'code_prev'];
                            $products[$i][$pr.'code'] = $row[$pr.'code'];
                            $products[$i][$pr.'price'] = $row[$pr.'price'];
                            $i++;
                        }
            if(count($products) == 0)
                    {
                    $search_hint = array();
                    $search_hint[0] = false;
                    $search_hint[1] = '<p class="_registration-false">Поиск не дал результаов!</p>'
                        .'<p>Подсказка: </p>'
                        .'<p>Попробуйте искать по названию товара плюс бренд например " ноутбук HP "</p>'
                        .'<p>Попробуйте искать по бренду например " INTEL"</p>'
                        .'<p>Попробуйте поискать в другом разделе, поиск по сайту разбит на
                            разделы, поэтому нет смысла искать например смартфон в разделе " Компьютеры".
                            Для этого перейдите в желаемый раздел из главного меню или левого сайтбара и
                            повторите поисковый запрос.</p>'
                        .'<p>Если оригинальное название бренда товара на английском языке например "HP"
                            используйте для ввода названия бренда английскую раскладку клавиатуры </p>'
                        .'<p>Не используйте в запросе название во множественном числе! </p>'
                        .'<p>Если ваш запрос состоит из нескольких слов не используйте двойные пробелы между        словами!</p>';
                        return $search_hint;
                    }
            }
            else{
                    $search_hint = array();
                    $search_hint[0] = false;
                    $search_hint[1] = '<p class="_registration-false">Не задан поисковый запрос!</p>';
                    return $search_hint;
            }
        return $products;
        }
}
 ?>
