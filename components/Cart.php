<?php
/* Класс для работы с корзиной заказов*/
    class Cart
    {
        /**
         * Добавление товара в корзину (сессию)
         * @param int $id <p>id товара</p>
         * @return integer <p>Количество товаров в корзине</p>
         */
        public static function addProduct($id)
        {
            // Приводим $id к типу integer
            $id = intval($id);

            // Пустой массив для товаров в корзине
            $productsInCart = array();

            // Если в корзине уже есть товары (они хранятся в сессии)
            if (isset($_SESSION['products'])) {
                // То заполним наш массив товарами
                $productsInCart = $_SESSION['products'];
            }

            // Проверяем есть ли уже такой товар в корзине
            if (array_key_exists($id, $productsInCart)) {
                // Если такой товар есть в корзине, но был добавлен еще раз, увеличим количество на 1
                $productsInCart[$id] ++;
            } else {
                // Если нет, добавляем id нового товара в корзину с количеством 1
                $productsInCart[$id] = 1;
            }

            // Записываем массив с товарами в сессию
            $_SESSION['products'] = $productsInCart;

            // Возвращаем количество товаров в корзине
            return self::countItems();
        }

        /**
         * Подсчет количество товаров в корзине (в сессии)
         * @return int <p>Количество товаров в корзине</p>
         */
        public static function countItems()
        {
            // Проверка наличия товаров в корзине
            if (isset($_SESSION['products'])) {
                // Если массив с товарами есть
                // Подсчитаем и вернем их количество
                $count = 0;
                foreach ($_SESSION['products'] as $id => $quantity) {
                    $count = $count + $quantity;
                }
                return $count;
            } else {
                // Если товаров нет, вернем 0
                return 0;
            }
        }
        /**
        * Возвращает массив с идентификаторами и количеством товаров в корзине<br/>
        * Если товаров нет, возвращает false;
        * @return mixed: boolean or array
        */
        public static function getProducts()
        {
            if (isset($_SESSION['products'])) {
                return $_SESSION['products'];
            }
            return false;
        }
        /**
         * Получаем общую стоимость переданных товаров
         * @param array $products <p>Массив с информацией о товарах</p>
         * @return integer <p>Общая стоимость</p>
         */
        public static function getTotalPrice($products, $s1_products)
        {
            // Получаем массив с идентификаторами и количеством товаров в корзине
            $productsInCart = self::getProducts();
            // Подсчитываем общую стоимость
            $total = 0;
            $s1_total = 0;
            if ($productsInCart) {
                // Если в корзине не пусто
                // Проходим по переданному в метод массиву товаров
                foreach ($products as $item) {
                    // Находим общую стоимость: цена товара * количество товара секции 0
                    $total += $item['price'] * $productsInCart[$item['id']];
                }
                foreach ($s1_products as $item) {
                    // Находим общую стоимость: цена товара * количество товара секции 1
                    $s1_total += $item['s1_price'] * $productsInCart[$item['s1_id']];
                }
            }
            //находим суммарную стоимость
            $total += $s1_total;

            return $total;
        }
        /**
        * Очищает корзину
        */
        public static function clear()
        {
            if (isset($_SESSION['products'])) {
                unset($_SESSION['products']);
            }
        }
        /**
        * Удаляет товар с указанным id из корзины
        * @param integer $id <p>id товара</p>
        */
        public static function deleteProduct($id)
        {
            // Получаем массив с идентификаторами и количеством товаров в корзине
            $productsInCart = self::getProducts();

            // Удаляем из массива элемент с указанным id
            unset($productsInCart[$id]);

            // Записываем массив товаров с удаленным элементом в сессию
            $_SESSION['products'] = $productsInCart;
        }
        // Корректировка колличества товаров из корзины
        public static function changeCartSum($id){
            //  getting the id of change product
            $id_product = $_POST['id_cart'];
            // getting the sum which change
            $new_sum = $_POST['sum'];
            $price = $_POST['price'];
                $elmentNewSum = true;
            // Проверяем являются ли все элементы пользовательской строки числами
                    for ($i=0; $i < strlen($new_sum); $i++) {
                        $elmentNewSum = is_numeric($new_sum[$i]);
                                if(!$elmentNewSum){
                                    echo '<p style="color:red;">Ошибка ввода!</p>';
                                    break;
                                }
                        }
            // changing the old value to new
                if($new_sum > 0 && $elmentNewSum){
                        $_SESSION['products'][$id_product] = $new_sum;
                            settype($price, "double");
                                $total_number = $new_sum*$price;
                                    echo $total_number;
                }
                if($new_sum==0)
                      Cart::deleteProduct($id_product);
        }








    }
 ?>
