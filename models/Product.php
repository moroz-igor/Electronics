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
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
        {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM product '
                . 'WHERE status = "1" ORDER BY id  '
                . 'LIMIT :count';

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
    public static function getProductByIdFromTable($id, $idName, $table)
        {
            $id = intval($id);
            if ($id)
            {
                $db = Db::getConnection();
                $result = $db->query('SELECT * FROM '.$table.' WHERE '.$idName.' = ' . $id);
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
        //  Метод получения товаров Секции Базы Данных "Section(Section1) префикс[s1_]"
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
                        $sql = 'SELECT * FROM `product` WHERE `name` LIKE "%'.$search_words.'%" AND status=1 '
                                                            .'OR `brand` LIKE "%'.$search_words.'%" AND status=1 '
                                                            .'LIMIT 50';
                    break;
                    case 1 :
                        $sql = 'SELECT * FROM `s1_product` WHERE `s1_name` LIKE "%'.$search_words.'%" AND s1_status=1 '
                                                                .'OR `s1_brand` LIKE "%'.$search_words.'%" AND s1_status=1 '
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
        // Получение списка продуктов для ппанели админимтратора
        // Возвращает список товаров
    public static function getProductsList()
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Получение и возврат результатов
            $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
            $productsList = array();
            $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['code'] = $row['code'];
                $productsList[$i]['price'] = $row['price'];
                $i++;
            }
            return $productsList;
        }
        /*
        * Удаляет товар с указанным id
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
    public static function deleteProductByIdFromTable($id, $id_name, $table)
        {
            $db = Db::getConnection();

                // Текст запроса к БД
            $sql =  'DELETE FROM '.$table.' WHERE '.$id_name.' = :id';

                // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            return $result->execute();


        }
        // Редактирует товар с заданным id
    public static function updateProductById($id, $options)
        {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product
            SET
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                category_name = :category_name,
                code_prev = :code_prev,
                brand = :brand,
                availability = :availability,
                description_1 = :description_1,
                description_2 = :description_2,
                is_new = :is_new,
                is_recommended = :is_recommended,
                status = :status,
                imgbig_1 = :imgbig_1,
                imgbig_2 = :imgbig_2,
                imgbig_3 = :imgbig_3,
                imgbig_4 = :imgbig_4,
                imgbig_5 = :imgbig_5,
                imgmin_1 = :imgmin_1,
                imgmin_2 = :imgmin_2,
                imgmin_3 = :imgmin_3,
                imgmin_4 = :imgmin_4,
                imgmin_5 = :imgmin_5
                WHERE id = :id";

                // Получение и возврат результатов. Используется подготовленный запрос
                $result = $db->prepare($sql);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
                $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
                $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
                $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
                $result->bindParam(':category_name', $options['category_name'], PDO::PARAM_INT);
                $result->bindParam(':code_prev', $options['code_prev'], PDO::PARAM_INT);
                $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
                $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
                $result->bindParam(':description_1', $options['description_1'], PDO::PARAM_STR);
                $result->bindParam(':description_2', $options['description_2'], PDO::PARAM_STR);
                $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
                $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
                $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
                $result->bindParam(':imgbig_1', $options['imgbig_1'], PDO::PARAM_STR);
                $result->bindParam(':imgbig_2', $options['imgbig_2'], PDO::PARAM_STR);
                $result->bindParam(':imgbig_3', $options['imgbig_3'], PDO::PARAM_STR);
                $result->bindParam(':imgbig_4', $options['imgbig_4'], PDO::PARAM_STR);
                $result->bindParam(':imgbig_5', $options['imgbig_5'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_1', $options['imgmin_1'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_2', $options['imgmin_2'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_3', $options['imgmin_3'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_4', $options['imgmin_4'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_5', $options['imgmin_5'], PDO::PARAM_STR);
                return $result->execute();
        }
    public static function updateDetailsContentById($content_id, $options)
        {
            $db = Db::getConnection();
            $sql = "UPDATE details_content
                SET
                    main_des = :main_des,
                    des_1 = :des_1,
                    des_2 = :des_2,
                    des_3 = :des_3,
                    des_4 = :des_4,
                    des_5 = :des_5,
                    img_1 = :img_1,
                    img_2 = :img_2,
                    img_3 = :img_3,
                    img_4 = :img_4,
                    img_5 = :img_5
                    WHERE content_id = :content_id";
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
    public static function updateProductDetails($id, $options){
        $db = Db::getConnection();
        $sql = "UPDATE details
            SET
                param_1 = :param_1,
                param_2 = :param_2,
                param_3 = :param_3,
                param_4 = :param_4,
                param_5 = :param_5,
                param_6 = :param_6,
                param_7 = :param_7,
                param_8 = :param_8,
                param_9 = :param_9,
                param_10 = :param_10,
                value_1 = :value_1,
                value_2 = :value_2,
                value_3 = :value_3,
                value_4 = :value_4,
                value_5 = :value_5,
                value_6 = :value_6,
                value_7 = :value_7,
                value_8 = :value_8,
                value_9 = :value_9,
                value_10= :value_10
                WHERE id_product = :id_product";

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
    public static function createProduct($options)
        {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO product '
                . '(name, category_name, code, code_prev, price, category_id, brand, availability,'
                . 'description_1, description_2, is_new, is_recommended, status,
                      imgbig_1,
                      imgbig_2,
                      imgbig_3,
                      imgbig_4,
                      imgbig_5,
                      imgmin_1,
                      imgmin_2,
                      imgmin_3,
                      imgmin_4,
                      imgmin_5
                      )'
                . 'VALUES '
                . '(:name, :category_name, :code, :code_prev, :price, :category_id, :brand, :availability,'
                . ':description_1, :description_2, :is_new, :is_recommended, :status,
                        :imgbig_1,
                        :imgbig_2,
                        :imgbig_3,
                        :imgbig_4,
                        :imgbig_5,
                        :imgmin_1,
                        :imgmin_2,
                        :imgmin_3,
                        :imgmin_4,
                        :imgmin_5
                        )';
                // Получение и возврат результатов. Используется подготовленный запрос
                $result = $db->prepare($sql);
                $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
                $result->bindParam(':category_name', $options['category_name'], PDO::PARAM_STR);
                $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
                $result->bindParam(':code_prev', $options['code_prev'], PDO::PARAM_STR);
                $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
                $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
                $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
                $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
                $result->bindParam(':description_1', $options['description_1'], PDO::PARAM_STR);
                $result->bindParam(':description_2', $options['description_2'], PDO::PARAM_STR);
                $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
                $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
                $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
                $result->bindParam(':imgbig_1', $options['imgbig_1'], PDO::PARAM_STR);
                $result->bindParam(':imgbig_2', $options['imgbig_2'], PDO::PARAM_STR);
                $result->bindParam(':imgbig_3', $options['imgbig_3'], PDO::PARAM_STR);
                $result->bindParam(':imgbig_4', $options['imgbig_4'], PDO::PARAM_STR);
                $result->bindParam(':imgbig_5', $options['imgbig_5'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_1', $options['imgmin_1'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_2', $options['imgmin_2'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_3', $options['imgmin_3'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_4', $options['imgmin_4'], PDO::PARAM_STR);
                $result->bindParam(':imgmin_5', $options['imgmin_5'], PDO::PARAM_STR);
                if ($result->execute()) {
                    // Если запрос выполенен успешно, возвращаем id добавленной записи
                    return $db->lastInsertId();
                }
            // Иначе возвращаем 0
            return 0;
        }
    public static function createProductDetails($options)
        {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO details '
                . '(param_1, param_2, param_3, param_4, param_5, param_6, param_7, param_8, param_9, param_10,
                    value_1, value_2, value_3, value_4, value_5, value_6, value_7, value_8, value_9, value_10)'
                . 'VALUES '
                . '( :param_1, :param_2, :param_3, :param_4, :param_5, :param_6, :param_7, :param_8, :param_9, :param_10,
                    :value_1, :value_2, :value_3, :value_4, :value_5, :value_6, :value_7, :value_8, :value_9, :value_10)';
                // Получение и возврат результатов. Используется подготовленный запрос
                $result = $db->prepare($sql);
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

                if ($result->execute()) {
                    // Если запрос выполенен успешно, возвращаем id добавленной записи
                    return $db->lastInsertId();
                }
                // Иначе возвращаем 0
                return 0;
        }
        // Создает подробное описание товара
    public static function createProductDetailsDescriptions($options)
            {
                // Соединение с БД
                $db = Db::getConnection();
                // Текст запроса к БД
                $sql = 'INSERT INTO details_content '
                        . '(main_des, des_1, des_2, des_3, des_4, des_5, img_1, img_2, img_3, img_4, img_5
                             )'
                        . 'VALUES '
                        . '(:main_des, :des_1, :des_2, :des_3, :des_4, :des_5, :img_1, :img_2, :img_3, :img_4, :img_5
                            )';
                        // Получение и возврат результатов. Используется подготовленный запрос
                        $result = $db->prepare($sql);
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
                        if ($result->execute()) {
                            // Если запрос выполенен успешно, возвращаем id добавленной записи
                            return $db->lastInsertId();
                        }
                    // Иначе возвращаем 0
                    return 0;
        }

        // Возвращает список товаров с указанными индентификторами
    public static function getProdustsByIds($idsArray)
        {
            // Соединение с БД
            $db = Db::getConnection();

            // Превращаем массив в строку для формирования условия в запросе
            $idsString = implode(',', $idsArray);
            //echo $idsString;

            // Текст запроса к БД
            $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

            $result = $db->query($sql);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);

            // Получение и возврат результатов первой секции
            $i = 0;
            $products = array();
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['imgbig_1'] = $row['imgbig_1'];
                $products[$i]['code'] = $row['code'];
                $products[$i]['code_prev'] = $row['code_prev'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $i++;
            }
            return $products;
        }
        // Возвращает путь к изображению
    public static function getImage($id, $name)
        {
            // Название изображения-пустышки
            $noImage = 'no-image.jpg';

            // Путь к папке с товарами
            $path = '/upload/images/products/'.$id.'_product/';

            // Путь к изображению товара
            $pathToProductImage = $path . $id . $name. '.jpg';

            if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
                // Если изображение для товара существует
                // Возвращаем путь изображения товара
                return $pathToProductImage;
            }

            // Возвращаем путь изображения-пустышки
            //return $path . $noImage;
            return NULL;
        }

    public static function lastProductId($table, $id){
        // Соединение с БД
        $db = Db::getConnection();
        $sql = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";

        $result = $db->prepare($sql);
        $result->bindParam(':'.$id, $id, PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        // Возвращаем значение id - последний в таблице
        $row = $result->fetch();
        return $row[$id];
    }

}
 ?>
