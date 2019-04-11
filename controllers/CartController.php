<?php

/**
 * Контроллер ProductController
 * Товар
 */
class CartController
{
        /**
        * Action для добавления товара в корзину синхронным запросом<br/>
        * (для примера, не используется)
        * @param integer $id <p>id товара</p>
        */
        public function actionAdd($id)
        {
            // Добавляем товар в корзину
            Cart::addProduct($id);

            // Возвращаем пользователя на страницу с которой он пришел
            $referrer = $_SERVER['HTTP_REFERER'];
            header("Location: $referrer");
        }
        /**
        * Action для добавления товара в корзину при помощи асинхронного запроса (ajax)
        * @param integer $id <p>id товара</p>
        */
        public function actionAddAjax($id)
        {
            // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
            echo Cart::addProduct($id);
            return true;
        }
        public function actionIndex()
        {
            // Получим идентификаторы и количество товаров в корзине
            $productsInCart = Cart::getProducts();

            if ($productsInCart) {
                // Если в корзине есть товары, получаем полную информацию о товарах для списка
                // Получаем массив только с идентификаторами товаров
                $productsIds = array_keys($productsInCart);

                // Получаем массив с полной информацией о необходимых товарах
                $products = Product::getProdustsByIds($productsIds);

                // Получаем общую стоимость товаров
                $totalPrice = Cart::getTotalPrice($products);
            }
            // Подключаем вид
            require_once(ROOT . '/views/cart/index.php');
            return true;
        }

}
